@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Student</h6>
            <img src="{{ asset('uploads/student_image') }}/{{ $student->student_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $student->student_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Roll</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $student->student_roll }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Registration No</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $student->student_registretion }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $student->student_phone_number }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Email</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $student->student_email }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Department</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $student->studenRelation->first()->department_name }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Student Shift</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $student->student_shift }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Student Semester</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $student->student_seemester }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Student About</label>
                        <textarea class="form-control"   name="description" rows="20" readonly >{{ $student->student_about }}</textarea>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Student Joined</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($student->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection