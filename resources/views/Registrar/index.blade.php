@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registrar List</h4>
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
                            <th>Registrar Name</th>
                            <th>Registrar Degicnation</th>
                            <th>Registrar Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_registrars as  $registrar )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $registrar->registrar_name }}</td>
                            <td>{{ $registrar->registrar_designation }}</td>
                            <td><img src="{{ asset('uploads/registrar_image') }}/{{  $registrar->registrar_image }}" alt=""></td>
                            <td>
                                <a class="btn btn-success " href="{{ route('admin.registrar.restore',['id'=>$registrar->id]) }}">restore</a>
                                <a class="btn btn-danger delete" href=" {{route('admin.registrar.delete',['id'=>$registrar->id]) }}">Delete</a></td> 
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
                                <th>Registrar Name</th>
                                <th>Registrar Degicnation</th>
                                <th>Registrar Image</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registrars as  $registrar )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $registrar->registrar_name }}</td>
                                <td>{{ $registrar->registrar_designation }}</td>
                                <td><img src="{{ asset('uploads/registrar_image') }}/{{ $registrar->registrar_image }}" alt="{{ $registrar->registrar_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($registrar->created_at)->format('F d, Y')}}</td>
                                <td><a class="btn btn-info " href="{{ route('admin.registrar.show',['registrar'=>$registrar->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.registrar.edit',['registrar'=>$registrar->id]) }}">edit</a>
                                    <form action="{{ route('admin.registrar.destroy',['registrar'=>$registrar->id]) }}" method="POST" >
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
