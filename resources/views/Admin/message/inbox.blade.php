@extends('layouts.admin')

@section('page-header')
Messenger
@endsection

@section('content')


<input type="hidden" value="{{ $room }}" id="room">
<input type="hidden" id="to_user_name" value="{{ \App\Models\User::where('id', $room)->first()->name }}" readonly
    class="d-none">
<div class="container">
    <div class="row">
        @include('Admin.message.list')

        {{-- <div class="direct-chat-contacts">
            <ul class="contacts-list">
                @foreach (\App\Models\User::with('roles')->get()->reject(function($user){
                return $user->hasRole('admin');
                }) as $user)
                <li class='list-group-item d-flex justify-content-between align-items-center'>
                    <a href="{{ route('admin.message.inbox', $user->id) }}">
        <img class="contacts-list-img" src="https://ui-avatars.com/api/?name={{ $user->name }}" alt="User Avatar">

        <div class="contacts-list-info">
            <span class="contacts-list-name text-info">
                {{ $user->name }}
            </span>
            <span class="contacts-list-msg"></span>
        </div>
        <!-- /.contacts-list-info -->
        </a>
        <span class="badge bg-primary rounded-pill" id="new-message-{{ $user->id }}">
            @if (\App\Models\Message::where('room', $user->id)
            ->whereNull('viewed_at')
            ->where('user_to_id', 'admin')
            ->count() > 0)
            new({{ \App\Models\Message::where('room', $user->id)
                        ->whereNull('viewed_at')
                        ->where('user_to_id', 'admin')
                        ->count() }})
            @endif
        </span>
        </li>
        @endforeach

        <!-- End Contact Item -->
        </ul>
    </div> --}}
    <div class="col-md-6">
        <!-- DIRECT CHAT SUCCESS -->
        <div class="card card-success card-outline direct-chat direct-chat-success ">
            <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" title="Contacts" id="all-contacts-button">
                        <i class="fas fa-comments"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body" id="messages-card" style="height: 380px; ">
                <div id="messages" style="padding: 10px 20px;">
                    @foreach ($old_messages as $old_message)
                    <div class="direct-chat-msg {{ $old_message->user_from_id == auth()->id() ? 'right':'' }}">
                        <div class="direct-chat-infos clearfix">
                            <span
                                class="direct-chat-name float-{{ $old_message->user_from_id == auth()->id() ? 'right':'left' }}">
                                {{ $old_message->user_from_id == auth()->id() 
                                    ? 'Admin'
                                    :$old_message->user_from->name }}
                            </span>
                            <span
                                class="direct-chat-timestamp float-{{ $old_message->user_from_id == auth()->id() ? 'left':'right' }}">
                                {{ $old_message->created_at }}
                            </span>
                        </div>
                        <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin"
                            alt="Message User Image">
                        <div class="direct-chat-text" style="word-break: break-word;">
                            {{ $old_message->message }}
                        </div>
                    </div>
                    @endforeach
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
    </div>
</div>
</div>
@endsection


@section('scripts')

<script src="{{ asset('js/admin/chat-inbox.js') }}"></script>

@endsection