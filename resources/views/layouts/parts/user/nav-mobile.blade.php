<nav class="main-nav" role="navigation" style="background: #3092c0;
     border-bottom: 6px solid #FF8000;
     border-radius: 0;
      position: sticky;
       top: 0;
       z-index: 999;
       ">
    <!-- hide-in-mobile -->
    <div class="container">

        <!-- Mobile menu toggle button (hamburger/x icon) -->
        <input id="main-menu-state" type="checkbox" />
        <label class="main-menu-btn" for="main-menu-state">
            <span class="main-menu-btn-icon"></span> Toggle main menu visibility
        </label>
        <ul id="main-menu" class="sm sm-blue " style="z-index: 1">
            @include('layouts.parts.user.services')
            @include('layouts.parts.user.questions')
            <li class="">
                <a href="$" class="">
                    Samples
                </a>
            </li>
            <li class="">
                <a href="$" class="">
                    Experts
                </a>
            </li>
        </ul>
    </div>
</nav>