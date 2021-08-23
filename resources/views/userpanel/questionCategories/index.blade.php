@extends('layouts.master')

@section('content')
<div class="container my-5 ">
    

<div style="display: flex; 
    justify-content: space-between;
    align-items: center;    
    flex-wrap: wrap;">
                @for ($i = ord('a'); $i <= ord('z'); $i++) @if($questionCategories->filter(
                    fn ($questionCategory, $key) => str_starts_with(strtolower($questionCategory->name),chr($i))
                    )->count() > 0)

                    <div class="d-flex" style="margin: 20px 0; width: 300px; height: {{ 

$questionCategories->filter(
                            fn ($questionCategory, $key) => str_starts_with(strtolower($questionCategory->name),
                            chr($i))
                            )->count() * 50

                     }}px">
                        <div class="heading p-0 px-3 text-white __flex-center" style="background:#969494">
                            {{ strtoupper(chr($i)) }}
                        </div>
                        <ul class="list-group w-100">
                            @foreach ($questionCategories->filter(
                            fn ($questionCategory, $key) => str_starts_with(strtolower($questionCategory->name),
                            chr($i))
                            ) as $questionCategory)
                            <li class="list-group-item d-flex " style="background:#f2f0f0;justify-content: space-between;">
                                @if ($questionCategory->staticPageExists)
                                <a href="{{ '/question-category/'.$questionCategory->slug.'.html' }}" style="color:#615b5b">
                                    {{ $questionCategory->name }}
                                </a>
                                @else
                                <a href="{{ route('userpanel.questionCategory.all-questions', $questionCategory->slug) }}"
                                style="color:#615b5b">
                                    {{ $questionCategory->name }}
                                </a>
                                @endif
                                <div class="">
                                <span class="badge rounded-pill" style="background:#969494">
                                    {{ $questionCategory->questions()->count() }}
                                </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                    @endfor
            </div>
</div> @endsection