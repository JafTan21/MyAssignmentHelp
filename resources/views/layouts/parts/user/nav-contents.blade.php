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