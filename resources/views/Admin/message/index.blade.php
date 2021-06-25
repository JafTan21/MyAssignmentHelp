@extends('layouts.admin')

@section('page-header')
Messenger
@endsection

@section('content')

<input type="hidden" value="{{ $room }}" id="room">
<div class="container">
    <div class="row">
        @include('Admin.message.list')
        {{-- <div class="col-md-6">
            <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success card-outline direct-chat direct-chat-success ">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="messages-card" style="height: 380px;overflow-y: scroll; ">
                    <div id="messages" style="padding: 10px 20px;">
                        @foreach ($old_messages as $old_message)
                        <div class="direct-chat-msg {{ $old_message->user_from_id == auth()->id() ? 'right':'' }}">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-{{ $old_message->user_from_id == auth()->id() ? 'right':'left' }}">
                Sarah Bullock </span> <span
                class="direct-chat-timestamp float-{{ $old_message->user_from_id == auth()->id() ? 'left':'right' }}">
                {{ $old_message->created_at }} </span>
        </div>
        <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin" alt="Message User Image">
        <div class="direct-chat-text" style="word-break: break-word;">
            {{ $old_message->message }}
        </div>
    </div>
    @endforeach
</div>
<div class="direct-chat-contacts">
    <ul class="contacts-list">
        <li>
            <a href="#">
                <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Avatar">

                <div class="contacts-list-info">
                    <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date float-right">2/28/2015</small>
                    </span>
                    <span class="contacts-list-msg">How have you been? I was...</span>
                </div>
                <!-- /.contacts-list-info -->
            </a>
        </li>
        <!-- End Contact Item -->
    </ul>
    <!-- /.contatcts-list -->
</div>
<!-- /.direct-chat-pane -->
</div>
<!-- /.card-body -->
<div class="card-footer">
    <div class="input-group">
        <input type="text" id="chatInput" placeholder="Type Message ..." class="form-control">
        <span class="input-group-append">
            <button type="button" class="btn btn-success" id="sendButton">Send</button>
        </span>
    </div>
</div>
<!-- /.card-footer-->
</div>
<!--/.direct-chat -->
</div> --}}
</div>
</div>
@endsection




@section('styles')
<link href="{{ asset('froala_editor_4.0.1\css\froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
@endsection



@section('scripts')

<script src="https://cdn.socket.io/4.0.1/socket.io.min.js"
    integrity="sha384-LzhRnpGmQP+lOvWruF/lgkcqD+WDVt9fU3H4BWmwP5u5LTmkUGafMcpZKNObVMLU" crossorigin="anonymous">
</script>

<script src="{{ asset('js/admin/chat.js') }}"></script>

<script>
    $(document).ready(function(){
        $("#messages-card").scrollTop($("#messages-card").prop("scrollHeight"));
    });

</script>
@endsection