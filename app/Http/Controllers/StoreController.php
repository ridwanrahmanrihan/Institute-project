<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Store.index', [
            "stores" => Store::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            "*" => "required",
            "store_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('store_image')->getClientOriginalExtension();
        $img = Image::make($request->file('store_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/store_image/'.$file_name),90);
        Store::insert([
            "store_name" => $request->store_name,
            "store_phone_number" => $request->store_phone_number,
            "store_email" => $request->store_email,
            "educational_qualification" => $request->educational_qualification,
            "store_designation" => $request->store_designation,
            "store_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view("Store.show", compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return  view('Store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            "*" => "required",
            "store_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('store_image')) {
            unlink(base_path('/public/uploads/store_image/'.$store->store_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('store_image')->getClientOriginalExtension();
            $img = Image::make($request->file('store_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/store_image/'.$file_name),90);
            $store->update([
                "store_name" => $request->store_name,
            "store_phone_number" => $request->store_phone_number,
            "store_email" => $request->store_email,
            "educational_qualification" => $request->educational_qualification,
            "store_designation" => $request->store_designation,
            "store_image" => $file_name,
            ]);
         }
         $store -> update([
            "store_name" => $request->store_name,
            "store_phone_number" => $request->store_phone_number,
            "store_email" => $request->store_email,
            "educational_qualification" => $request->educational_qualification,
            "store_designation" => $request->store_designation,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        unlink(base_path('public/uploads/store_image/' . $store->store_image));
        $store -> forceDelete();
        return back();
    }
}
