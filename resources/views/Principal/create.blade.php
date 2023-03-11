 @extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Principal Message </h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.principal.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Principal Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="principal_name" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Principal Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputUsername2"  name="principal_image" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="summernote" class="col-sm-3 col-form-label">Principal Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"   name="principal_message" rows="20" id="summernote"> </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Principal Title</label>
                        <select name="principal_title" class="form-control">
                            <option value="Principal">Principal</option>
                        </select>
                    </div>
                    
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Institute Name </label>
                        <select name="institute_name" class="form-control">
                            <option value="Munshiganj Polytechnic Institute">Munshiganj Polytechnic Institute</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit Principal Message</button>
            </form>
        </div>
    </div>
</div> 
@endsection



