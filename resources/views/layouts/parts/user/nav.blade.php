<nav id="main-nav" class="hide-in-mobile" style="background: #3092c0; border-bottom: 6px solid #FF8000;">
    <!-- Sample menu definition -->
    <div class="container">
        <ul id="main-menu" class="sm sm-blue" style="z-index: 1">
            <li>
                <a href="#">Services</a>
                <ul class="">
                    @foreach ($serviceCategories as $mainCategory)
                    <li class="">
                        <a href="#" class="">
                            {{ $mainCategory->name }}
                        </a>
                        @if ($mainCategory->serviceSubCategories->count()>0)
                        <ul class="">

                            @foreach ($mainCategory->serviceSubCategories as $subCategory)
                            <li class="">
                                <a href="#" class="">
                                    {{ $subCategory->name }}
                                </a>

                                <ul class="">
                                    @foreach (\App\Models\Page::where('main_category_id', $mainCategory->id)
                                    ->where('sub_category_id', $subCategory->id)->get() as $page)
                                    <li class="">
                                        <a href="s/{{ $page->slug }}" class="">
                                            {{ $page->title }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="http://www.smartmenus.org/about/">Answers</a>
                <ul>
                    <li><a href="http://www.smartmenus.org/about/vadikom/">The company</a>
                        <ul>
                            <li><a href="http://vadikom.com/about/">About Vadikom</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
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