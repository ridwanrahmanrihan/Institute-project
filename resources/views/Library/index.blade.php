@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Librarian List</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Librarian Name</th>
                                <th>Librarian Degicnation</th>
                                <th>Librarian Image</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($librarians as  $librarian )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $librarian->librarian_name }}</td>
                                <td>{{ $librarian->librarian_designation }}</td>
                                <td><img src="{{ asset('uploads/librarian_image') }}/{{ $librarian->librarian_image }}" alt="{{ $librarian->librarian_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($librarian->created_at)->format('F d, Y')}}</td>
                                <td>
                                    <a class="btn btn-danger " href="{{ route('admin.librarian.delete',['id'=>$librarian->id]) }}">delete</a>
                                   </td>
                                    
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
