@extends('layouts.master')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card col-md-8 shadow">
        <div class="card-header">
            <div class="heading p-0">
                {!! $question->title !!}
            </div>
            <div class="heading-2 text-md p-0">
                Category:
                <a href="{{ route('userpanel.questionCategory.all-questions', $question->questionCategory->slug) }}"
                    class="">
                    {{ $question->questionCategory->name }}
                </a>
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