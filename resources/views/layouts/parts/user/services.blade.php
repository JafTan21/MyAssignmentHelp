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
                        @foreach ($pages->where('main_category_id', $mainCategory->id)
                        ->where('sub_category_id', $subCategory->id) as $page)
                        <li class="">
                            @if ($page->staticPageExists)
                            <a href="{{ '/service/'.$page->slug.'.html' }}" class="">
                                {{ $page->title }}
                            </a>
                            @else
                            <a href="{{ route('userpanel.service-page', $page->slug) }}" class="">
                                {{ $page->title }}
                            </a>
                            @endif
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