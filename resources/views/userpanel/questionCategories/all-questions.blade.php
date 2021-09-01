@extends('layouts.master')


@section('title')
    {{ $questionCategory->slug }}
@endsection


@section('content')
    <style>
        .hvr-float:hover {
            box-shadow: 2px 2px 15px #3737376c;
        }

    </style>
    <div class="container my-3 d-flex justify-content-center">


        <div style="width: 100%">

            @if ($questionCategory->staticPageExists)
                <a href="{{ '/question-category/' . $questionCategory->slug . '.html' }}" class="questions-list"
                    style="color: #191919; font-size:24px; font-weight: 500;">
                    {{ $questionCategory->name }}
                </a>
            @else
                <a href="{{ route('userpanel.questionCategory.all-questions', $questionCategory->slug) }}"
                    style="color: #191919; font-size:24px; font-weight: 500;">
                    {{ $questionCategory->name }}
                </a>
            @endif

            @forelse ( $questionCategory->questions as $question)
                <ul class="list-group p-0 m-0 mt-3 hvr-float">
                    <li class="list-group-item ">
                        @php
                            $href = $question->staticPageExists ? '/question/' . $question->slug . '.html' : route('userpanel.question', $question->slug);
                        @endphp
                        <a href="{{ $href }}" class="text-dark" style="font-weight: 400;font-size: 21px;">
                            {!! $question->title !!}
                        </a>
                        <h6 class="text-dark" style="padding-top: 7px;">
                            {!! substr($question->description, 0, 100) !!}...
                        </h6>
                    </li>
                </ul>
            @empty
                <div class="alert alert-danger">
                    No question found in this category.
                </div>
            @endforelse


        </div>


    </div>
@endsection
