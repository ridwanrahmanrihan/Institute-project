@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Student Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.student.update', ['student'=> $student->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Student Phone Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="student_phone_number" value="{{ $student->student_phone_number }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Student Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="student_email" value="{{ $student->student_email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                        <select name="department" id="department"> 
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @selected($student->studenRelation->first()->department_name === $department->id)>{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Student Shift</label>
                        <select name="student_shift" class="form-control">
                            <option value="1st"  @selected($student->student_shift=== '1st')>1st</option>
                            <option value="2nd" @selected($student->student_shift=== '2nd')>2nd</option> 
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Student Semester</label>
                        <select name="student_seemester" class="form-control">
                            <option value="1st"  @selected($student->student_seemester=== '1st')>1st</option>
                            <option value="2nd" @selected($student->student_seemester=== '2nd')>2nd</option> 
                            <option value="3rd" @selected($student->student_seemester=== '3rd')>3rd</option> 
                            <option value="4th" @selected($student->student_seemester=== '4th')>4th</option> 
                            <option value="5th" @selected($student->student_seemester=== '5th')>5th</option> 
                            <option value="6th" @selected($student->student_seemester=== '6th')>6th</option> 
                            <option value="7th" @selected($student->student_seemester=== '7th')>7th</option> 
                            <option value="8th" @selected($student->student_seemester=== '8th')>8th</option> 
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Student Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
