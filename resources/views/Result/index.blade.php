@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Result List</h4>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
    Trash
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <th>Result Title</th>
                            <th>Academic Year</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_results as  $trash_result )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trash_result->result_title }}</td>
                            <td>{{ $trash_result->academic_year }}</td>
                            <td>{{ $trash_result->resultRelation->first()->department_name }}</td>
                            <td>
                                <a class="btn btn-success " href="{{ route('admin.result.restore',['id'=>$trash_result->id]) }}">restore</a>
                                <a class="btn btn-danger delete" href=" {{route('admin.result.delete',['id'=>$trash_result->id]) }}">Delete</a></td> 
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
                            <th>Result Title</th>
                            <th>Academic Year</th>
                            <th>Department</th>
                            <th>Shift</th>
                            <th>Semester</th>
                            <th>Result Image</th>
                            <th>Publish Date</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as  $result )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->result_title }}</td>
                                <td>{{ $result->academic_year }}</td>
                                <td>{{ $result->resultRelation->first()->department_name }}</td>
                                <td>{{ $result->result_shift }}</td>
                                <td>{{ $result->result_seemester }}</td>
                                <td><img src="{{ asset('uploads/result_image') }}/{{ $result->result_image }}" alt="{{ $result->result_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($result->created_at)->format('F d, Y')}}</td>
                                    <th><a class="btn btn-info " href="{{ route('admin.result.show',['result'=>$result->id]) }}">show</a><form action="{{ route('admin.result.destroy',['result'=>$result->id]) }}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger delete">Delete</button></form></th>
                                    
                            </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                    {{-- <div class="mt-5">{{ $contracts->links() }}</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
