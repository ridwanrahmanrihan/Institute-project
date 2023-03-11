@extends('frontend.layouts.app')
@section('content')
<div class="container">
    <div class="notice_bord">
        <h3 class="">Notice Board</h3>
        
        <div class="all_notice">
          @foreach ($notices as $notice)
          <ul>
              <li><h4 class="notice"><span>{{ $notice->notice_name }}</span></h4></li>
          </ul>
          <img class="notice_image" name="notice" src="{{ asset('uploads/notice_image') }}/{{ $notice->notice_image }}" alt="notice_image">
          <p  class="notice_description" name="notice-name">{{ $notice->notice_description }}</p>
          @endforeach
      </div>
      {{ $notices->links("pagination::bootstrap-5") }}
    </div>
</div>
@endsection