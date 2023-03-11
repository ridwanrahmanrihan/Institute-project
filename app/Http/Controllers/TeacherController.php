<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Teacher.index',[
            "teachers" => Teacher::all(),
            "trash_teachers" => Teacher::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Teacher.create',[
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
            "teacher_name" => "required",
            "teacher_phone_number" => "required |unique:teachers,teacher_phone_number",
            "department" => "required",
            "teacher_title" => "required",
            "teacher_image" => "required | mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('teacher_image')->getClientOriginalExtension();
        $img = Image::make($request->file('teacher_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/teacher_image/'.$file_name),90);
        $id = Teacher::insertGetId([
            "teacher_name" => $request->teacher_name,
            "teacher_phone_number" => $request->teacher_phone_number,
            "teacher_image" => $file_name,
            "teacher_email" => $request->teacher_email,
            "teacher_about" => $request->teacher_about,
            "teacher_title" => $request->teacher_title,
            "department" => $request->department,
            "created_at" => now(),
        ]);
        $post = new teacher();
        $post->find($id)->departmentRelation()->attach($request->department);
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view("Teacher.show", compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $departments = Department::all();
        return view('Teacher.edit', compact('teacher', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
        "teacher_phone_number" => "required",
        "department" => "required",
        "teacher_title" => "required",
    ]);
    $teacher -> update([
        "teacher_phone_number" => $request->teacher_phone_number,
        "department" => $request->department,
        "teacher_title" => $request->teacher_title,
    ]);
    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back();
    }
    public function teacherrestore($id)
    {
        Teacher::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function teacherdelete($id)
    {
        $teacher = Teacher::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/teacher_image/' . $teacher->teacher_image));
        $teacher->studenRelation()->detach();
        $teacher->forceDelete();
        return back();
    }
}
