@extends('frontend.layouts.app')
@section('content')
 <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
  <div class="row align-items-center px-3">
    <div class="col-lg-6 text-center ">
      <h1 class="display-3 font-weight-bold text-white">
        Wolcome to Munshiganj polytechnic institute
      </h1>
      <p class="text-white mb-4">
        Munshiganj Polytechnic Institute started its journey on 22/07/2006. As the infrastructure work of the new building was not completed, it first started operations with 2 technology computers and electronics in Munshiganj Technical School and College.
      </p>
    </div>
    <div class="col-lg-6 text-center text-lg-right">
      <img class="img-fluid mt-5" src="{{ asset('frontend') }}/assets/img/2019-07-31.jpg" alt="header.png" />
    </div>
  </div>
</div>
    <div class="container-fluid pt-5">
        <div class="container">
          <div class="text-center pb-2">
            <p>
              <h2>Profile</h2>
            </p>
          </div>
          <div class="row">
            @foreach ($persons as $person)
            <div class="col-md-6 col-lg-3 text-center team mb-5">
                <div
                  class="position-relative overflow-hidden mb-4"
                  style="border-radius: 100%"
                >
                  <img class="img-fluid w-100" src="{{ asset('uploads/persone_image') }}/{{ $person->persone_image }}"alt="persone_image" />
                </div>
                <h4>{{ $person->persone_name }}</h4>
                <i>{{ $person->persone_title }}</i>
              </div>
            @endforeach
            
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="notice_section">
        <div class="container">
            <div class="notice_bord">
                <h3>All Notice Board</h3>
                
                <div class="all_notice">
                  @foreach ($notices as $notice)
                  <ul>
                      <li><h4  class="notice"><span>{{ $notice->notice_name }}</span></h4></li>
                  </ul>
                  <img class="notice_image" src="{{ asset('uploads/notice_image') }}/{{ $notice->notice_image }}" alt="notice_image">
                  <p class="notice_description">{{ $notice->notice_description }}</p>
                  @endforeach
              </div>
                 {{ $notices->links("pagination::bootstrap-5") }}
                <h3>Latest Notice</h3>
                <div class="all_notice">
                  <ul>
                    <li><h4  class="notice"><span>{{ $latest_notice->first()->notice_name }}</span></h4></li>
                </ul>
                <img class="notice_image" src="{{ asset('uploads/notice_image') }}/{{ $latest_notice->first()->notice_image }}" alt="notice_image">
                <p class="notice_description">{{ $latest_notice->first()->notice_description }}</p>
                    <button class="notice_btn"><a href="{{ route('notice') }}">All News</a></button>
                </div>
            </div>
        </div>
    </section>
@endsection