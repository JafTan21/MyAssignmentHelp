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
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow col-md-10">
        <div class="card-header">
            <div class="heading p-0">
                <i class="far fa-question-circle"></i>
                All questions
            </div>
            <div class="heading-2 text-md p-0">
                Category:
                @if ($questionCategory->staticPageExists)
                <a href="{{ '/question-category/'.$questionCategory->slug.'.html' }}" class="questions-list">
                    {{ $questionCategory->name }}
                </a>
                @else
                <a href="{{ route('userpanel.questionCategory.all-questions',  $questionCategory->slug) }}" class="">
                    {{  $questionCategory->name }}
                </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ( $questionCategory->questions as $question)
                <ul class="list-group p-0 m-0 mt-3 col-md-8 hvr-float">
                    <li class="list-group-item ">
                        @php
                        if ($question->staticPageExists) {
                        $href = '/question/'.$question->slug.'.html';
                        } else {
                        $href = route('userpanel.question', $question->slug);
                        }
                        @endphp
                        <h4>
                            <a href="{{ $href }}" class="text-dark">
                                {!! $question->title !!}
                            </a>
                        </h4>
                        <h6 class="text-dark" style="
    padding-top: 7px;
                        ">
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
    </div>
</div>
@endsection