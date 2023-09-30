<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class frontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = product::with('uploads')->get();
        $settings = settings::first(); 
        return  view('frontend.menu',compact('items' ,'settings'));
    }
    public function dashborad()
    {
        $items = product::with('uploads')->get();
        $settings = settings::first(); 
        return  view('layouts.frontEnd.index',compact('items' ,'settings'));
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
        //
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
