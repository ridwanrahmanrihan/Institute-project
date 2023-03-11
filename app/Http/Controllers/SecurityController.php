<?php

namespace App\Http\Controllers;

use App\Models\Security;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Security.index', [
            "securitys" => Security::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Security.create");
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
            "security_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('security_image')->getClientOriginalExtension();
        $img = Image::make($request->file('security_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/security_image/'.$file_name),90);
        Security::insert([
            "security_name" => $request->security_name,
            "security_phone_number" => $request->security_phone_number,
            "security_email" => $request->security_email,
            "educational_qualification" => $request->educational_qualification,
            "security_designation" => $request->security_designation,
            "security_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show(Security $security)
    {
        return view('Security.show', compact('security'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function edit(Security $security)
    {
        return view('Security.edit', compact('security'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Security $security)
    {
        $request->validate([
            "*" => "required",
            "security_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('security_image')) {
            unlink(base_path('/public/uploads/security_image/'.$security->security_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('security_image')->getClientOriginalExtension();
            $img = Image::make($request->file('security_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/security_image/'.$file_name),90);
            $security->update([
                "security_name" => $request->security_name,
            "security_phone_number" => $request->security_phone_number,
            "security_email" => $request->security_email,
            "educational_qualification" => $request->educational_qualification,
            "security_designation" => $request->security_designation,
            "security_image" => $file_name,
            ]);
         }
         $security -> update([
            "security_name" => $request->security_name,
            "security_phone_number" => $request->security_phone_number,
            "security_email" => $request->security_email,
            "educational_qualification" => $request->educational_qualification,
            "security_designation" => $request->security_designation,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function destroy(Security $security)
    {
        unlink(base_path('public/uploads/security_image/' . $security->security_image));
        $security->forceDelete();
        return back();
    }
}
