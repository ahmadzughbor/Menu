<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $data = product::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('description', function ($row) {
                    return $row->description;
                })
                ->addColumn('cover', function ($row) {
                    $html =  "<img src=" . asset('storage/images/' . $row->cover) . " width='40' height='40' alt='aa'>";
                    return $html;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-productid="' . $row->id . '" data-url = "' . route('product.update', $row->id) . '" class="editproduct"><?xml version="1.0" ?><svg class="feather feather-edit-3" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></a>
                           <a href="javascript:void(0)"  data-productid="' . $row->id . '" class="deleteproduct "><?xml version="1.0" ?><svg class="feather feather-trash-2" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg></a> ';

                    return $btn;
                })
                ->rawColumns(['action', 'cover'])->toJson();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'title_en' => 'required',
            'title_hb' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'description_hb' => 'required',
            'cover' => 'required|image',

        ]);
        $data = [];
        if ($request->file('cover')) {
            $file = $request->file('cover'); // Replace 'image' with your input name
            $coverName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $coverName);
        }
        $data['title'] = [
            "ar" => $request->title,
            "en" => $request->title_en,
            "hb" => $request->title_hb,
        ];
        $data['description'] = [
            "ar" => $request->description,
            "en" => $request->description_en,
            "hb" => $request->description_hb,
        ];
        $data['cover'] =  $coverName;
        // DB::transaction(function () use($data ,$request){


            $product = product::create($data);

            if ($request->file('photos')) {
                $photos = $request->file('photos');
                foreach ($photos as $photo) {
                    // $file = $photo; // Replace 'image' with your input name
                    $photosName =  Str::uuid() . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('public/images', $photosName);

                    uploads::create([
                        'product_id' => $product->id,
                        'path' => $photosName
                    ]);
                }
            }

            return response()->json($product ,200);
        // });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $item = product::where('id', $id)->first();

        return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'title_en' => 'required',
            'title_hb' => 'required',
            'description' => 'required',
            'description_en' => 'required',
            'description_hb' => 'required',

        ]);

        $product = product::where('id', $id)->with('uploads')->first();
        $file = $request->file('cover'); // Replace 'file' with your input name
        if ($file) {

            $coverName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $coverName);

        } else {

            $coverName = $product->cover;
        }

        $data = [];
        
        $data['title'] = [
            "ar" => $request->title,
            "en" => $request->title_en,
            "hb" => $request->title_hb,
        ];
        $data['description'] = [
            "ar" => $request->description,
            "en" => $request->description_en,
            "hb" => $request->description_hb,
        ];
        $data['cover'] =  $coverName;

        $product->update($data);

        if ($request->file('photos')) {
            $product->uploads()->delete();

            $photos = $request->file('photos');
            $index = 1;
            foreach ($photos as $photo) {
                $photoName =  Str::uuid() . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/images', $photoName);

                $item = uploads::create([
                    'product_id' => $product->id,
                    'path' => $photoName
                ]);
                $index++;
            }
        }
        return response()->json($product ,200);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = product::with('uploads')->find($id);
        $item->uploads()->delete();
        $item->delete();

        return response()->json(['success' => 'product deleted successfully.']);
    }
}
