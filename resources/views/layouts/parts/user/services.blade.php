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
                    <a href="{{ route('userpanel.services', [
                        'subCategory'=>$subCategory->id,
                        'mainCategory'=>$mainCategory->id
                        ]) }}" class="">
                        {{ $subCategory->name }}
                    </a>

                    <ul class="">
                        @foreach (\App\Models\Page::where('main_category_id', $mainCategory->id)
                        ->where('sub_category_id', $subCategory->id)->get() as $page)
                        <li class="">
                            <a href="{{ route('userpanel.service-page', $page->slug) }}" class="">
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