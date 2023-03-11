@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Routine Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.routine.update', ['routine'=> $routine->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Routine Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="routine_title" value="{{ $routine->routine_title }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Academic Year</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="routine_year" value="{{ $routine->routine_year }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                        <select name="department" id="department"> 
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @selected($routine->routineRelation->first()->department_name === $department->id)>{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Routine Shift</label>
                        <select name="routine_shift" class="form-control">
                            <option value="1st"  @selected($routine->routine_shift=== '1st')>1st</option>
                            <option value="2nd" @selected($routine->routine_shift=== '2nd')>2nd</option> 
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Routine Semester</label>
                        <select name="routine_seemester" class="form-control">
                            <option value="1st"  @selected($routine->routine_seemester=== '1st')>1st</option>
                            <option value="2nd" @selected($routine->routine_seemester=== '2nd')>2nd</option> 
                            <option value="3rd" @selected($routine->routine_seemester=== '3rd')>3rd</option> 
                            <option value="4th" @selected($routine->routine_seemester=== '4th')>4th</option> 
                            <option value="5th" @selected($routine->routine_seemester=== '5th')>5th</option> 
                            <option value="6th" @selected($routine->routine_seemester=== '6th')>6th</option> 
                            <option value="7th" @selected($routine->routine_seemester=== '7th')>7th</option> 
                            <option value="8th" @selected($routine->routine_seemester=== '8th')>8th</option> 
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Routine Image</label>
                        <img src="{{ asset('uploads/routine_image') }}/{{ $routine->routine_image }}" alt="{{ $routine->routine_image }}" class="card-img-top" style="width: 
                        350px">
                        </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-3 col-form-label"> Change Routine Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="routine_image"  class="form-control" id="summernote" >
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Student Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
