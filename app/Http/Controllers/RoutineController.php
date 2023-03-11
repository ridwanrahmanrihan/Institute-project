<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Result;
use App\Models\Routine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Routine.index',[
            "routines" => Routine::all(),
            "trash_routines" => Routine::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Routine.create',[
            "departments" => Department::all(),
        ]);
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
            "*" => "required",
            "department" => "required",
             "routine_image" => "mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('routine_image')->getClientOriginalExtension();
        $img = Image::make($request->file('routine_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/routine_image/'.$file_name),90);
        $id = Routine::insertGetId([
            "routine_title" => $request->routine_title,
            "routine_year" => $request->routine_year,
            "department" => $request->department,
            "routine_shift" => $request->routine_shift,
            "routine_seemester" => $request->routine_seemester,
            "routine_image" => $file_name,
            "created_at" => now(),
        ]);
        $result = new routine();
        $result->find($id)->routineRelation()->attach($request->department);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function show(Routine $routine)
    {
        return view('Routine.show', compact('routine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function edit(Routine $routine)
    {
        $departments = Department::all();
        return view('Routine.edit', compact('routine', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routine $routine)
    {
        $request->validate([
            "routine_title" => "required",
            "routine_year" => "required",
            "routine_image" => " mimes:jpg,png,jpeg",
            "department" => "required",
            "routine_shift" => "required",
            "routine_seemester" => "required",
        ]);
        if ($request->hasFile('routine_image')) {
            unlink(base_path('/public/uploads/routine_image/'.$routine->routine_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('routine_image')->getClientOriginalExtension();
            $img = Image::make($request->file('routine_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/routine_image/'.$file_name),90);
            $routine->update([
            "routine_title" => $request->routine_title,
            "routine_year" => $request->routine_year,
            "department" => $request->department,
            "routine_shift" => $request->routine_shift,
            "routine_seemester" => $request->routine_seemester,
            "routine_image" => $file_name,
            ]);
        }
        $routine -> update([
            "routine_title" => $request->routine_title,
            "routine_year" => $request->routine_year,
            "department" => $request->department,
            "routine_shift" => $request->routine_shift,
            "routine_seemester" => $request->routine_seemester,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routine $routine)
    {
        $routine->delete();
        return  back();
    }
    public function routinerestore($id)
    {
        Routine::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function routinedelete($id)
    {
        
        $routine = Routine::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/routine_image/' . $routine->routine_image));
        $routine->routineRelation()->detach();
        $routine->forceDelete();
        return back();
    }
}
