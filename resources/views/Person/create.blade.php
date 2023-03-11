@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add Person</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Person Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="persone_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Persone Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputPassword2" autocomplete="off" name="persone_image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Teacher Title</label>
                        <select name="persone_title" class="form-control">
                            <option value="মাননীয়_মন্ত্রী">মাননীয় মন্ত্রী</option>
                            <option value="মাননীয়_উপমন্ত্রী">মাননীয় উপমন্ত্রী</option> 
                            <option value="সচিব">সচিব</option> 
                            <option value="মহাপরিচালক">মহাপরিচালক</option> 
                            <option value="অধ্যক্ষ">অধ্যক্ষ</option> 
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Person</button>
            </form>
        </div>
    </div>
</div> 
@endsection
