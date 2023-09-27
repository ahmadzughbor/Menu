<?php

namespace App\Http\Controllers;

use App\Models\settings;
use Illuminate\Http\Request;

class settingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $settings = settings::first();

        return view('admin.settings', compact('settings'));
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

        $settings = settings::first();
        $file = $request->file('app_logo'); // Replace 'file' with your input name
        $background_image = $request->file('background_image');
        if($file){

            $fileName = time() . '.' . $file->getClientOriginalExtension();
            
            $file->storeAs('public/images', $fileName);
        }else{
            $fileName = $settings->app_logo;
        }
        if($background_image){

            $backgroundName = time() . '.' . $background_image->getClientOriginalExtension();
            
            $background_image->storeAs('public/images', $backgroundName);
        }else{
            $backgroundName = $settings->app_logo;
        }
        $data =[];
        $data['Address'] = [
            "ar" => $request->Address ?? null,
            "en" => $request->Address_en ?? null,
            "hb" => $request->Address_hb ?? null,
        ];
        $data['Mobile'] = $request->Mobile ?? null;
        $data['whatsapp_num'] = $request->whatsapp_num ?? null;
        $data['facebook'] = $request->facebook ?? null;
        $data['instagram'] = $request->instagram ?? null;
        $data['app_logo'] = $fileName ?? null;
        $data['background_image'] = $backgroundName ?? null;

        // dd($data['app_logo'] );
        if ($settings) {
            $settings->update( $data);
        } else {
            $request->validate([
                'app_logo' =>'image|mimes:svg',
                'background_image' =>'image',
                'Address' =>'required| string',
                'Address_en' => 'required| string',
                'Address_hb'  => 'required| string',
                'Mobile'  => 'required|numeric',
                'whatsapp_num'  => 'required |numeric',
                'facebook' => 'required | string',
                'instagram' => 'required | string',
            ]);
            settings::create( $data);
        }
        // dd($request->snapchatLink);
        return $settings;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
