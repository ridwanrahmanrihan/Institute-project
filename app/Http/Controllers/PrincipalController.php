<?php

namespace App\Http\Controllers;

use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Principal.index',[
            "messages" => Principal::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Principal.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            "principal_name" => "required",
            "principal_message" => "required",
            "principal_title" => "required",
            "institute_name" => "required",
            "principal_image" => "required |mimes:png,jpg,jpeg"
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('principal_image')->getClientOriginalExtension();
        $img = Image::make($request->file('principal_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/principal_image/'.$file_name),90);
        Principal::insert([
            "principal_name" => $request->principal_name,
            "principal_message" => $request->principal_message,
            "principal_title" => $request->principal_title,
            "institute_name" => $request->institute_name,
            "principal_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function show(Principal $principal)
    {
        return view('Principal.show', compact('principal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function edit(Principal $principal)
    {
        return view('Principal.edit', compact('principal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Principal $principal)
    {
        $request -> validate([
            "principal_name" => "required ",
            "principal_message" => "required",
            "principal_image" => "required |mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('principal_image')) {
            unlink(base_path('public/uploads/principal_image/'.$principal->principal_image));
            $file_name = auth()->id() .'_'. time() .'.'.$request->file('principal_image')->getClientOriginalExtension();
            $img = Image::make($request->file('principal_image')); 
            $img->resize(100,100)->save(base_path('/public/uploads/principal_image/'.$file_name),90);
            $principal->update([
                "principal_name" => $request->principal_name,
                "principal_image" => $file_name,
                "principal_message" => $request->principal_message,
            ]);
        }
        else {
            $principal->update([
            "principal_name" => $request->principal_name,
            "principal_message" => $request->principal_message,
        ]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Principal  $principal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Principal $principal)
    {
        $principal->forceDelete();
        unlink(base_path('public/uploads/principal_image/' . $principal->principal_image));
        return back();
    }
}
