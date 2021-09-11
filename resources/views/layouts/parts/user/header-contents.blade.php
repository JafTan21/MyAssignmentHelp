<header class="__bg-primary" id="header">
    <div class="user-offer __bg-secondary">
        <img src="{{ asset('images/icon/ombo_offer.webp') }}" alt="" height="25" width="110">
        <span class="bonus-text mx-2" style="font-style: italic; font-weight: 400; font-size: 18px;">$20 Bonus + 25%
            OFF</span>
        <span>
            <a href="#" class="text-success " style="font-style: italic">
                CLIMB OFFER
            </a>
        </span>
    </div>
    <div class="container __flex-around" style="padding: 24px 0;">
        <a href="{{ route('userpanel.home') }}" class="___class_+?5___">
            <img src="https://cdn1.myassignmenthelp.com/lazyload-assets/2021/logo.jpg" alt="" class="___class_+?6___"
                style="
                aspect-ratio: auto;
                height: 40px;">
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
                <a href="javascript:void(0)" class="___class_+?15___">
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
