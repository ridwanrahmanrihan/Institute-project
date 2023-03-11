@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Contract</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.contract.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Contract Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="contract_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="summernote" class="col-sm-3 col-form-label">Contract Images</label>
                    <div class="col-sm-9">
                        <input type="file" name="contract_image"  class="form-control" id="summernote" >
                    </div>
                </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Contract</button>
            </form>
        </div>
    </div>
</div> 
@endsection
