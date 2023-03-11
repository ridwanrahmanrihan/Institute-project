@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add Student</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.student.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="student_name" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Roll</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputUsername2"  name="student_roll" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registetion No</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputUsername2"  name="student_registretion" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Student Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="student_phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"Student>Student Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="student_email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">About Student</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"   name="student_about" rows="20"> </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Student Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputPassword2" autocomplete="off" name="student_image">
                    </div>
                </div>
                  <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                        <select name="department" class="form-control">
                            <option value="">Select  Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Shift</label>
                        <select name="student_shift" class="form-control">
                            <option value="">Select Shift</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>  
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Semester</label>
                        <select name="student_seemester" class="form-control">
                            <option value="">Select Semester</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option> 
                            <option value="3rd">3rd</option> 
                            <option value="4th">4th</option> 
                            <option value="5th">5th</option> 
                            <option value="6th">6th</option> 
                            <option value="7th">7th</option> 
                            <option value="8th">8th</option> 
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Student</button>
            </form>
        </div>
    </div>
</div> 
@endsection
