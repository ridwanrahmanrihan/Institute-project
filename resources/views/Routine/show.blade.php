@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Routine</h6>
            <img src="{{ asset('uploads/routine_image') }}/{{ $routine->routine_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Routine Title</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $routine->routine_title }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $routine->routineRelation->first()->department_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Academic Year</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $routine->routine_year }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Shift</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $routine->routine_shift }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Semester</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $routine->routine_seemester }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Routine Published</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($routine->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection
