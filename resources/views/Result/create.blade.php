@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Result</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.result.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="title" class="col-sm-3 col-form-label">Result Title </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title"  name="result_title" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="year" class="col-sm-3 col-form-label">Academic Year</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="year"  name="academic_year" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="summernote" class="col-sm-3 col-form-label">Result Image</label>
                    <div class="col-sm-9">
                        <input type="file" name="result_image"  class="form-control" id="summernote" >
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                        <select name="department" class="form-control">
                            <option value="0">Select  Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Shift</label>
                        <select name="result_shift" class="form-control">
                            <option value="">Select Shift</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>  
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Semester</label>
                        <select name="result_seemester" class="form-control">
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
                
                <button type="submit" class="btn btn-primary mr-2">Create Result</button>
            </form>
        </div>
    </div>
</div> 
@endsection
