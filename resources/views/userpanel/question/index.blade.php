@extends('layouts.master')

@section('title')
{{ $question->title }}
@endsection

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card col-md-8 shadow">
        <div class="card-header">
            <div class="heading p-0">
                <i class="far fa-question-circle"></i>
                {{ $question->title }}
            </div>
            <div class="heading-2 text-md p-0">
                Category:

                @if ($question->questionCategory->staticPageExists)
                <a href="{{ '/question-category/'.$question->questionCategory->slug.'.html' }}" class="questions-list">
                    {{ $question->questionCategory->name }}
                </a>
                @else
                <a href="{{ route('userpanel.questionCategory.all-questions', $question->questionCategory->slug) }}"
                    class="">
                    {{ $question->questionCategory->name }}
                </a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div style="font-size: 20px;">
                {!! $question->answer->answer ?? "<div class='alert alert-danger'>
                    No answer found
                </div>
                " !!}
            </div>
        </div>
    </div>
</div>
@endsection