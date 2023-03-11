@extends('frontend.layouts.app')
@section('content')
<div class=" center">
  <h2 name="of" >Message Of Princepal</h2>
    <div class="card border-0 shadow-sm mb-2">
      <div class="princepal">
        <img class="princepal" src="{{ asset('uploads/principal_image') }}/{{ $message->first()->principal_image }}" alt="">
      </div>
      <div class="card-body bg-light text-center p-4">
        <h2 class="">{{ $message->first()->principal_name }}</h2>
        <div class="d-flex justify-content-center mb-3">
          <h4>Princepal</h4>
        </div>
        <p>
          {{ $message->first()->principal_message}}
        </p>
      </div>
    </div>
  </div>
@endsection
