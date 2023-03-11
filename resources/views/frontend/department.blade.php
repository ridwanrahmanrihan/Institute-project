@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <div class="notice_bord">
        <h3>Department</h3>
        
        <div class="all_notice">
          @foreach ($departments as $department)
        <h4><span>{{ $department->department_name }}</span></h4>
          
          <img src="{{ asset('uploads/department_image') }}/{{ $department->department_image }}" alt="department_image">
          <p>{{ $department->department_about }}</p>
          @endforeach
      </div>
      {{ $departments->links("pagination::bootstrap-5") }}
    </div>
</div>
@endsectiongit 