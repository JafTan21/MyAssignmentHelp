<header class="__bg-primary">
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
    <div class="container-fluid __flex-center" style="padding: 8px 0;">
        <div class="col-3">
            <a href="{{ route('userpanel.home') }}" class="">
                <div class="site-logo __flex-center text-white">
                    WEBSITE LOGO
                </div>
            </a>
        </div>
        <div class="col-8 __flex-around justify-content-end ">
            <div class="col-6 hide-in-tab" style="margin-right: 24px">
                <div class="input-group bg-white" style="border-radius: 6px">
                    <input type="text" class="form-control bg-white __border-style-0" placeholder="Search...">
                    <button class="input-group-text bg-white __border-style-0">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="com-2 hide-in-mobile">
                <button class="btn btn-success">
                    Order now
                </button>
            </div>
            <div class="com-2 hide-in-mobile">
                <div class="btn-group">
                    <button type="button" class="btn __border-style-0 dropdown-toggle text-white"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        My orders
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
            </div>
            <div class="com-2 hide-in-mobile">
                <div class="btn-group">
                    <button type="button" class="btn __border-style-0 dropdown-toggle text-white"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe-asia"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.parts.nav')
    @include('layouts.parts.nav-mobile')

</header>