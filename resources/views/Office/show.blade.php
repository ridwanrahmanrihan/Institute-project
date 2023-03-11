@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Officer</h6>
            <img src="{{ asset('uploads/officer_image') }}/{{ $office->officer_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Officer Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $office->officer_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Officer Roll</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $office->officer_phone_number }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Officer Registration No</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $office->officer_email }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Officer Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $office->educational_qualification }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Officer Email</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $office->officer_designation }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Officer Joined</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($office->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection