@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Contract List</h4>
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
                            <th>Name</th>
                            <th>Contract Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_contracts as  $trash_contract )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trash_contract->contract_name }}</td>
                            <td><img src="{{ asset('uploads/contract_image') }}/{{ $trash_contract->contract_image }}" alt="{{ $trash_contract->contract_image }}"></td>
                            <td>
                                <a class="btn btn-success " href="{{ route('admin.contract.restore',['id'=>$trash_contract->id]) }}">restore</a>
                                <a class="btn btn-danger delete" href=" {{route('admin.contract.delete',['id'=>$trash_contract->id]) }}">Delete</a></td> 
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
                                <th>Name</th>
                                <th>Contract Image</th>
                                <th>Contract Create</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contracts as  $contract )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contract->contract_name }}</td>
                                <td><img src="{{ asset('uploads/contract_image') }}/{{ $contract->contract_image }}" alt="{{ $contract->contract_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($contract->created_at)->format('F d, Y')}}</td>
                                    <th><form action="{{ route('admin.contract.destroy',['contract'=>$contract->id]) }}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger delete">Delete</button></form></th>
                                    
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
@endsection
