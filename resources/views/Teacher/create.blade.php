@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add Teacher</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.teacher.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Teacher Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="teacher_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="teacher_phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="teacher_email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">About Teacher</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"   name="teacher_about" rows="20"> </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Teacher Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputPassword2" autocomplete="off" name="teacher_image">
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
                    <label for="status" class="col-sm-3 col-form-label">Teacher Title</label>
                        <select name="teacher_title" class="form-control">
                            <option value="CI">CI</option>
                            <option value="instractor">instractor</option> 
                            <option value="juniorinstractor">Junior instractor</option> 
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Teacher</button>
            </form>
        </div>
    </div>
</div> 
@endsection
