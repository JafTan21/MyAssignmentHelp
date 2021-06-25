<header class="__bg-primary" id="header">
    <div class="container py-3 __flex-around">
        <a href="{{ route('userpanel.home') }}" class="">
            <img src="{{ asset('images/site_logo.png') }}" alt="" class="" height="80">
        </a>
        @auth
        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
            @csrf
        </form>
        <div style="font-size: 19px;">
            <div class="com-2">

                <button type="button" class="btn __bg-sm-blue text-white __border-style-0 dropdown-toggle __flex-center"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    {{ auth()->user()->name }}
                </button>

                <ul class="dropdown-menu">
                    <li>
                        <a href="#" onclick="$('#logout-form').submit();" class="dropdown-item btn btn-danger">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @else
        <div style="font-size: 19px;">
            <a href="{{ route('login') }}" class="text-white">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </a>
            <a href="javascript:void(0)" class="">
                /
            </a>
            <a href="{{ route('register') }}" class="text-white">
                <i class="far fa-user"></i>
                Register
            </a>
        </div>
        @endauth
    </div>
</header>
<nav class="main-nav" role="navigation" style="background: #3092c0;
     border-bottom: 6px solid #FF8000;
     border-radius: 0;
      position: sticky;
       top: 0;
       z-index: 999;
       ">

    <div class="container">

        <!-- Mobile menu toggle button (hamburger/x icon) -->
        <input id="main-menu-state" type="checkbox" />
        <label class="main-menu-btn" for="main-menu-state">
            <span class="main-menu-btn-icon"></span> Toggle main menu visibility
        </label>
        <ul id="main-menu" class="sm sm-blue " style="z-index: 1">
            @include('layouts.parts.user.services')
            @include('layouts.parts.user.questions')
        </ul>
    </div>

</nav>