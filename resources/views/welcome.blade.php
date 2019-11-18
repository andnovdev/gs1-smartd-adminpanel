{{-- extend layouts --}}
@extends('layouts.app')
{{-- use section --}}
@section('content')
    {{-- include header --}}
    @include('layouts.header')
    {{-- welcome section --}}
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url({{asset('lib/images/hero_2.jpg')}})">
            <div class="container">
                <div class="row align-items-center ">
                    <div class="col-md-5 mt-5 pt-5">
                        <span class="text-cursive h5 text-red">{{config('general.greeting', 'Welcome to our website')}}</span>
                        <h1 class="mb-3 font-weight-bold text-teal">{{config('general.highlight', 'Bring Village to Digital')}}</h1>
                        <p>{{config('general.tagline', 'Be Smart from zero')}}</p>
                        <p class="mt-5"><a href="#getstarted" class="btn btn-primary py-4 btn-custom-1">Get Started</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end welcome section | feature description --}}
    <div class="site-section" id="getstarted">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="block-2 red">
                        <span class="wrap-icon">
                            <span class="icon-home"></span>
                        </span>
                        <h2>Village</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nesciunt, mollitia, hic enim id culpa.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block-2 bg-dark">
                        <span class="wrap-icon bg-dark">
                            <span class="icon-person"></span>
                        </span>
                        <h2>Human Service</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nesciunt, mollitia, hic enim id culpa.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="block-2 teal">
                        <span class="wrap-icon">
                            <span class="icon-cog"></span>
                        </span>
                        <h2>Administration</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nesciunt, mollitia, hic enim id culpa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.components.about')
    @include('layouts.components.feature')
    @include('layouts.components.profile')
    @include('layouts.components.action')
    @include('layouts.footer')
@endsection
