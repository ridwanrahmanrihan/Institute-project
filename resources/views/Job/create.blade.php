@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add Job Seeker</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.job.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="1" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="1"  name="jober_name" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Roll</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="jober_roll" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="jober_phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="0" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="0" autocomplete="off"  name="jober_email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="4" class="col-sm-3 col-form-label">Passing Year </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="4" autocomplete="off"  name="passing_year">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="5" class="col-sm-3 col-form-label">District</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="5" autocomplete="off"  name="jober_district">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="6" class="col-sm-3 col-form-label">Company Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="6" autocomplete="off"  name="jober_company">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                    <div class="col-sm-9">
                        <select name="jober_department" class="form-control">
                            <option value="">Select  Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div></div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label"> Designation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputPassword2" autocomplete="off" name="jober_designation">
                    </div>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label"> Status </label>
                    <div class="col-sm-9">
                        <select name="jober_status" id="status">
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>
                    </div>
                <div class="form-group row">
                    <label for="9" class="col-sm-3 col-form-label"> Address </label>
                    <div class="col-sm-9">
                        <textarea name="jober_address" id="9" class="form-control" rows="20"></textarea>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label"> Image</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="exampleInputPassword2" autocomplete="off" name="jober_image">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Job Seeker</button>
            </form>
        </div>
    </div>
</div> 
@endsection
