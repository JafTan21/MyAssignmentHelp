@extends('layouts.master')

@section('title')
{{ $page->title }}
@endsection

@section('content')
<div class="container">

    {!! $page->content !!}
</div>
@endsection