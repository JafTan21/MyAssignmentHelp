@extends('layouts.master')

@section('content')
<style>
    .hvr-float:hover {
        box-shadow: 2px 2px 15px #3737376c;
    }
</style>
<div class="container my-5 d-flex justify-content-center">
    <div class="card shadow col-md-8">
        <div class="card-header">
            <div class="heading p-0">
                <i class="far fa-question-circle"></i>
                All questions
            </div>
            <div class="heading-2 text-md p-0">
                Category:
                <a href="{{ route('userpanel.questionCategory.all-questions',  $questionCategory->slug) }}" class="">
                    {{  $questionCategory->name }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ( $questionCategory->questions as $question)
                <ul class="list-group p-0 m-0 mt-3 col-md-8 hvr-float">
                    <li class="list-group-item ">
                        <a href="{{ route('userpanel.question', $question->slug) }}" class="">
                            {!! $question->title !!}
                        </a>
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