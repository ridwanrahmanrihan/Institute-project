@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Job Seeker List</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as  $job )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->jober_name }}</td>
                                <td>{{ $job->jober_company }}</td>
                                <td>{{ $job->jobRelation->first()->department_name }}</td>
                                <td>{{ $job->jober_designation }}</td>
                                <td><img src="{{ asset('uploads/jober_image') }}/{{ $job->jober_image }}" alt="{{ $job->jober_image }}"></td>
                                <td><a class="btn btn-info " href="{{ route('admin.job.show',['job'=>$job->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.job.edit',['job'=>$job->id]) }}">edit</a>
                                    <form action="{{ route('admin.job.destroy',['job'=>$job->id]) }}" method="POST" >
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
