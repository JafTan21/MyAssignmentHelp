@extends('layouts.master')

@section('content')
    <style>
        .hvr-float:hover {
            box-shadow: 2px 2px 15px #3737376c;
        }

    </style>
    <div class="container my-5 d-flex justify-content-center">
        <div style="width:100%">
            @forelse ($servicePages as $page)
                <ul class="list-group p-0 m-0 mt-3 col-md-8 hvr-float w-100">
                    <li class="list-group-item ">
                        <a href="{{ route('userpanel.service-page', $page->slug) }}" class="">
                            {!! $page->content !!}
                        </a>
                    </li>
                </ul>
            @empty
                <div class="alert alert-danger text-sm">
                    No service found.
                </div>
            @endforelse
        </div>
    </div>
@endsection
