@extends('layouts.app')
@section('content')  
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List</h4>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
                Trash
              </button>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                     <div class="modal-body">
                        <div class="table-responsive pt-3"> 
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Project Name</th>
                                        <th>Department</th>
                                        <th>Project Create</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trash_projects as  $trash_project )
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $trash_project->project_name}}</td>
                                        <td>{{ $trash_project->projectRelation->first()->department_name}}</td>
                                        <td>{{ \Carbon\Carbon::parse($trash_project->created_at)->format('F d, Y')}}</td>
                                        <td>
                                            <a class="btn btn-success " href="{{ route('admin.project.restore',['id'=>$trash_project->id]) }}">restore</a>
                                            <a class="btn btn-danger delete" href=" {{route('admin.project.delete',['id'=>$trash_project->id]) }}">Delete</a></td> 
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="table-responsive pt-3">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Project Name</th>
                            <th>Department</th>
                            <th>Project Create</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as  $project )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $project->project_name}}</td>
                            <td>{{ $project->projectRelation->first()->department_name}}</td>
                            <td>{{ \Carbon\Carbon::parse($project->created_at)->format('F d, Y')}}</td>
                            <td><a class="btn btn-info " href="{{ route('admin.project.show',['project'=>$project->id]) }}">show</a>
                            <form action=" {{route('admin.project.destroy',['project'=>$project->id]) }}" method="post">
                                @csrf
                                @method("DELETE")
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection