@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <div class="routine_bord">
        <h3 class="routine_name">Routine</h3>
        
        <div class="all_notice">
          @foreach ($routines as $routine)
          <ul>
              <li><h4 class="routine"><span>{{ $routine->routine_title }}</span></h4></li>
          </ul>
          <div class="routine_image">
            <img src="{{ asset('uploads/routine_image') }}/{{ $routine->routine_image }}" alt="routine_image" class="size" >
          </div>
          <span><h5 class="department_name" >Department Name:  {{ $routine->routineRelation->first()->department_name }}</h5></span>
          <span class="routine_semester" ><p> Semester: {{ $routine->routine_seemester }}</p></span>
          <p class="routine_shift"> Shift: {{ $routine->routine_shift }}</p>
          <p class="routine_semester"> Published: {{ \Carbon\Carbon::parse($routine->created_at)->format('F d, Y')}}</p>
          @endforeach
      </div>
      {{ $routines->links("pagination::bootstrap-5") }}
    </div>
</div>
@endsection