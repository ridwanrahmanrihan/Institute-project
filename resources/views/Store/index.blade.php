@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Store List</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Degicnation</th>
                                <th>Image</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stores as  $store )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $store->store_name }}</td>
                                <td>{{ $store->store_designation }}</td>
                                <td><img src="{{ asset('uploads/store_image') }}/{{ $store->store_image }}" alt="{{ $store->store_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($store->created_at)->format('F d, Y')}}</td>
                                <td><a class="btn btn-info " href="{{ route('admin.store.show',['store'=>$store->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.store.edit',['store'=>$store->id]) }}">edit</a>
                                    <form action="{{ route('admin.store.destroy',['store'=>$store->id]) }}" method="POST" >
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
