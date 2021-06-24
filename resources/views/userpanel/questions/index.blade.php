@extends('layouts.master')

@section('content')
<div class="container">
    <ul class="">
        @foreach ($questions as $question)
        <li class="">
            {{ $question }}
        </li>
        @endforeach
    </ul>
</div>
@endsection