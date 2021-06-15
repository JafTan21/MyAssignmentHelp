@extends('layouts.admin')

@section('page-header')
Service menus
@endsection

@section('content')

<div class="row justify-content-around">
    @livewire('service-category')
    @livewire('service-sub-category')
</div>


@endsection