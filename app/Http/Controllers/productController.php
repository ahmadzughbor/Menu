<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\uploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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

                    $btn = '<a href="javascript:void(0)" data-productid="' . $row->id . '" data-url = "' . route('product.update', $row->id) . '" class="editproduct btn btn-primary btn-sm">edit</a>
                           <a href="javascript:void(0)"  data-productid="' . $row->id . '" class="deleteproduct btn btn-primary btn-sm">delete</a> ';

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
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
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
        $data['cover'] =  $fileName;
        // DB::transaction(function () use($data ,$request){


            $product = product::create($data);

            if ($request->file('photos')) {
                $photos = $request->file('photos');
                foreach ($photos as $photo) {
                    $file = $photo; // Replace 'image' with your input name
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/images', $fileName);
                    uploads::create([
                        'product_id' => $product->id,
                        'path' => $fileName
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

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('public/images', $fileName);
        } else {
            $fileName = $product->cover;
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
        $data['cover'] =  $fileName;

        $product = $product->update($data);

        if ($request->file('photos')) {
            $product->uploads()->delete();

            $photos = $request->file('photos');
            foreach ($photos as $photo) {
                $file = $photo; // Replace 'image' with your input name
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images', $fileName);

                uploads::create([
                    'product_id' => $product->id,
                    'path' => $fileName
                ]);
            }
        }
        return response()->json($product ,200);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = product::find($id)->with('uploads');
        $item->uploads->delete();
        $item->delete();

        return response()->json(['success' => 'say deleted successfully.']);
    }
}
