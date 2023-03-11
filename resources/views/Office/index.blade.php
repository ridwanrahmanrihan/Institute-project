@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">officer List</h4>
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
                                <th>officer Name</th>
                                <th>officer Degicnation</th>
                                <th>officer Image</th>
                                <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_officers as  $officer )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $officer->officer_name }}</td>
                            <td>{{ $officer->officer_designation }}</td>
                            <td><img src="{{ asset('uploads/officer_image') }}/{{  $officer->officer_image }}" alt=""></td>
                            <td>
                                <a class="btn btn-success " href="{{ route('admin.office.restore',['id'=>$officer->id]) }}">restore</a>
                                <a class="btn btn-danger delete" href=" {{route('admin.office.delete',['id'=>$officer->id]) }}">Delete</a></td> 
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>officer Name</th>
                                <th>officer Degicnation</th>
                                <th>officer Image</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($officers as  $officer )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $officer->officer_name }}</td>
                                <td>{{ $officer->officer_designation }}</td>
                                <td><img src="{{ asset('uploads/officer_image') }}/{{ $officer->officer_image }}" alt="{{ $officer->officer_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($officer->created_at)->format('F d, Y')}}</td>
                                <td><a class="btn btn-info " href="{{ route('admin.office.show',['office'=>$officer->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.office.edit',['office'=>$officer->id]) }}">edit</a>
                                    <form action="{{ route('admin.office.destroy',['office'=>$officer->id]) }}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger delete">Delete</button></td></form>
                                    
                            </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                    {{-- <div class="mt-5">{{ $parent_categories->links() }}</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
