@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Job Seeker</h6>
            <img src="{{ asset('uploads/jober_image') }}/{{ $job->jober_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_phone_number }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_email }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Address</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_address }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Distric</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_district }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Passing Year </label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->passing_year }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jobRelation->first()->department_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Roll</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_roll }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Company Name</label></label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_company }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Status</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_status }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Designation</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $job->jober_designation }}</p>
                </div>
            </div>
        </div>
@endsection