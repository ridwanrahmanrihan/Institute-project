@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Accounted Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.account.update', ['account'=> $account->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="account_name" value="{{ $account->account_name }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="account_phone_number" value="{{ $account->account_phone_number }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Email </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="account_email" value="{{ $account->account_email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Qualification </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="educational_qualification" value="{{ $account->educational_qualification }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Designation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="account_designation" value="{{ $account->account_designation }}">
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label"> Image</label>
                        <img src="{{ asset('uploads/account_image') }}/{{ $account->account_image }}" alt="{{ $account->account_image }}" class="card-img-top" style="width: 
                        350px">
                        </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-3 col-form-label"> Change  Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="account_image"  class="form-control" id="summernote" >
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update  Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
