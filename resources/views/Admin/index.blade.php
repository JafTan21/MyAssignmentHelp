@extends('layouts.admin')

@section('page-header') Dashboard @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Messages</span>
                                    <span class="info-box-number">
                                        {{ $message_count }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">User</span>
                                    <span class="info-box-number">
                                        {{ $user_count }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning">
                                    <i class="far fa-question-circle"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Questions</span>
                                    <span class="info-box-number">
                                        {{ $question_count }}
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Services</span>
                                    <span class="info-box-number">{{ $service_count }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="col">
                        <h5>Generate static pages:</h5>
                    </div>
                    <div class="row">
                        <div class="btn-group" role="group">

                            <a href="{{ route('admin.generate-all-static-pages', 'all') }}" class="btn btn-info">
                                All pages
                            </a>
                            <a href="{{ route('admin.generate-all-static-pages', 'service') }}" class="btn btn-info">
                                Service pages
                            </a>
                            <a href="{{ route('admin.generate-all-static-pages', 'question') }}" class="btn btn-info">
                                Question pages
                            </a>
                            <a href="{{ route('admin.generate-all-static-pages', 'category') }}" class="btn btn-info">
                                Question category pages
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection