@extends('layouts.app')
@section('content')
    @include('layouts.header')

<div class="ftco-blocks-cover-1">
    <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url({{asset('lib/images/hero_2.jpg')}})">
      <div class="container">
        <div class="row align-items-center ">

          <div class="col-md-5 mt-5 pt-5">
            <span class="text-cursive h5 text-red">Programs</span>
            <h1 class="mb-3 font-weight-bold text-teal">Our Programs</h1>
            <p><a href="{{route('welcome')}}" class="text-white">Home</a> <span class="mx-3">/</span> <strong>Programs</strong></p>
          </div>
          
        </div>
      </div>
    </div>
  </div>

  @include('layouts.components.profile')

  @include('layouts.footer')
@endsection
