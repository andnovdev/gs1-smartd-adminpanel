<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar site-navbar-target" role="banner">

    <div class="container mb-3">
        <div class="d-flex align-items-center">
            <div class="site-logo mr-auto">
                <a href="{{route('welcome')}}">{{ config('general.title', 'gs_smard_v1') }}<span class="text-primary">.</span></a>
            </div>
            <div class="site-quick-contact d-none d-lg-flex ml-auto ">
                <div class="d-flex site-info align-items-center mr-5">
                    <span class="block-icon mr-3"><span class="icon-map-marker text-yellow"></span></span>
                    <span> {{config('village.address', 'Check your setting.')}} <br> {{config('village.postal_code', 'Location')}}</span>
                </div>
                <div class="d-flex site-info align-items-center">
                    <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
                    <span>{{config('village.day', 'Check your setting.')}} {{config('village.time')}} <br> {{config('village.note', 'Working time')}}</span>
                </div>

            </div>
        </div>
    </div>
    {{-- start container --}}
    <div class="container">
        <div class="menu-wrap d-flex align-items-center">
            <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5">
            <span class="icon-menu h3 text-black"></span></a></span>
            {{-- navigation --}}
            <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto ">
                    <li><a href="{{route('welcome')}}" class="nav-link">Home</a></li>
                    <li><a href="{{route('feature')}}" class="nav-link">Feature</a></li>
                    <li><a href="{{route('program')}}" class="nav-link">Program</a></li>
                    <li><a href="{{route('about')}}" class="nav-link">About</a></li>
                </ul>
            </nav>
            {{-- // social network --}}
            <div class="top-social ml-auto">
                <a href="#"><span class="icon-facebook text-teal"></span></a>
                <a href="#"><span class="icon-twitter text-success"></span></a>
                <a href="#"><span class="icon-instagram text-yellow"></span></a>
            </div>
        </div>
    </div>
</header>
