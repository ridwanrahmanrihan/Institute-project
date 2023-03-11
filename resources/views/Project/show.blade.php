@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Project Details</h6>
            <div class="card-body">
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Project Name </label>
                        <p type="text" class="form-control" id="exampleInputEmail2" >{{ $project->project_name }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Post Parent Category</label>
                        <p class="form-control"   name="description" >{{ $project->projectRelation->first()->department_name }}</p>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Post Description</label>
                    
                    @php
                     echo $project->project_details
                @endphp
                </div>
            </div>
        </div>
@endsection