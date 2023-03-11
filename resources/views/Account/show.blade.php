@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Accounted</h6>
            <img src="{{ asset('uploads/account_image') }}/{{ $account->account_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $account->account_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Roll</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $account->account_phone_number }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Registration No</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $account->account_email }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $account->educational_qualification }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Degicnation</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $account->account_designation }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Joined</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($account->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection