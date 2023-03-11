<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();

        return view('Person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Person.create');
    }

    /**
     * Store a newly created resource in storage.
     *`
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            "persone_name" => "required",
            "persone_title" => "required",
            "persone_image" => "required | mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('persone_image')->getClientOriginalExtension();
        $img = Image::make($request->file('persone_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/persone_image/'.$file_name),90);
        Person::insert([
            "persone_name" => $request->persone_name,
            "persone_image" => $file_name,
            "persone_title" => $request->persone_title,
            "created_at" => now(),
        ]);
        return back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('Person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([
            "*" => "required",
            "persone_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('persone_image')) {
            unlink(base_path('/public/uploads/persone_image/'.$person->persone_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('persone_image')->getClientOriginalExtension();
            $img = Image::make($request->file('persone_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/persone_image/'.$file_name),90);
            $person->update([
            "persone_name" => $request->persone_name,
            "persone_title" => $request->persone_title,
            "persone_image" => $file_name,
            ]);
         }
         $person -> update([
            "persone_name" => $request->persone_name,
            "persone_title" => $request->persone_title,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        unlink(base_path('public/uploads/persone_image/'.$person->first()->persone_image));
        $person->first()->forceDelete();
        return back();
    }
}
