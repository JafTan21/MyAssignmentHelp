@extends('layouts.master')

@section('title')
    {{ $question->title }}
@endsection

@section('content')
    <div class="container my-5 d-flex justify-content-center">

        @php
            $href = $question->staticPageExists ? '/question/' . $question->slug . '.html' : route('userpanel.question', $question->slug);
        @endphp

        <div style="width: 100%">
            <ul class="list-group p-0 m-0 mt-3 hvr-float" style="width: 100%">
                <li class="list-group-item ">

                    <a href="{{ $href }}" class="text-dark" style="font-weight: 400;font-size: 21px;">
                        {!! $question->title !!}
                    </a>
                    <br>
                    {!! $question->description !!}
                </li>
            </ul>

            <span style="display: block;text-align: center;margin: 20px 0;font-size: 20px;color: #FF8000;">
                Solution
            </span>

            <ul class="list-group p-0 m-0 mt-3 hvr-float" style="width: 100%">
                <li class="list-group-item ">
                    @php
                        // dd($question);
                    @endphp
                    {!! $question->answer->answer ?? 'Not found' !!}
                </li>
            </ul>

        </div>

    </div>
@endsection
