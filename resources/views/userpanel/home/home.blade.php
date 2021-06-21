@extends('layouts.master')

@section('content')

@include('userpanel.home.sections.banner')
@include('userpanel.home.sections.online-educational-assistance')
@include('userpanel.home.sections.assignment-help-services')
@include('userpanel.home.sections.counter')
@include('userpanel.home.sections.why-us')
@include('userpanel.home.sections.help-features')

@include('userpanel.inc.app-promotion')

@endsection


@section('scripts')
<script>
    $("#messages").scrollTop($("#messages").prop("scrollHeight"));

</script>
@endsection