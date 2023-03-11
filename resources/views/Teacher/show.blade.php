@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Teacher</h6>
            <img src="{{ asset('uploads/teacher_image') }}/{{ $teacher->teacher_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Teacher Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $teacher->teacher_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $teacher->departmentRelation->first()->department_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Teacher Title</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $teacher->teacher_title }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teacher Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $teacher->teacher_phone_number }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teacher Email</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $teacher->teacher_email }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teacher Description</label>
                        <textarea class="form-control"   name="description" rows="20" readonly >{{ $teacher->teacher_about }}</textarea>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teacher Joined</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($teacher->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection