<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Student.index",[
            "students" => Student::all(),
            "trash_students" => Student::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student.create', [
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
            "student_name" => "required",
            "student_roll" => "required |unique:students,student_roll",
            "student_registretion" => "required |unique:students,student_registretion",
            "student_phone_number" => "required |unique:students,student_phone_number",
            "student_email" => "required |unique:students,student_email",
             "department" => "required",
             "student_shift" => "required",
             "student_seemester" => "required",
             "student_image" => "required | mimes:jpg,png,jpeg",
             "student_image" => "unique:students,student_image",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('student_image')->getClientOriginalExtension();
        $img = Image::make($request->file('student_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/student_image/'.$file_name),90);
        $id = Student::insertGetId([
            "student_name" => $request->student_name,
            "student_roll" => $request->student_roll,
            "student_registretion" => $request->student_registretion,
            "student_phone_number" => $request->student_phone_number,
            "student_email" => $request->student_email,
            "student_about" => $request->student_about,
            "department" => $request->department,
            "student_shift" => $request->student_shift,
            "student_seemester" => $request->student_seemester,
            "student_image" => $file_name,
            "created_at" => now(),
        ]);
        $student = new student();
        $student->find($id)->studenRelation()->attach($request->department);
        return back();
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('Student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $departments = Department::all();
        return view('Student.edit', compact('student', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request -> validate([
            "student_phone_number" => "required",
            "student_email" => "required ",
             "department" => "required",
             "student_shift" => "required",
             "student_seemester" => "required",
        ]);
            $student->update([
            "student_phone_number" => $request->student_phone_number,
            "student_email" =>  $request->student_email,
            "department" => $request->department,
            "student_shift" => $request->student_shift,
            "student_seemester" => $request->student_seemester,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return back();
    }
    public function studentrestore($id)
    {
        Student::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function studentdelete($id)
    {
        $teacher = Student::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/student_image/' . $teacher->student_image));
        $teacher->studenRelation()->detach();
        $teacher->forceDelete();
        return back();
    }
}
