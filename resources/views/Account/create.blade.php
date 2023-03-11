@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add Accounted</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.account.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="account_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="account_phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="account_email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Educational Qualification</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="educational_qualification">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label"> Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputPassword2" autocomplete="off" name="account_image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label"> Designation </label>
                        <select name="account_designation" class="form-control">
                            <option value="Cashier">Craft Cashier</option>
                            <option value="CraftInstructor">Craft Instructor</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Accounted</button>
            </form>
        </div>
    </div>
</div> 
@endsection
