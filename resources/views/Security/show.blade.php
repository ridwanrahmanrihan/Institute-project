@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Security</h6>
            <img src="{{ asset('uploads/security_image') }}/{{ $security->security_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $security->security_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Roll</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $security->security_phone_number }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Email</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $security->security_email }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $security->educational_qualification }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Degicnation</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $security->security_designation }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Joined</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($security->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection