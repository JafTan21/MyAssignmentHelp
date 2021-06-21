@auth
<button class="btn btn-info" style="position: fixed;
 right: -40px;
  top: 50%;
  transform: rotate(-90deg);
  z-index: 100;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="msgBtnClicked();">
    {{-- onclick="toggleShowChatModal();" --}}
    Chat with admin
    <span class="badge badge-warning" id="new_unread_message_count"></span>
</button>

@else
<a class="btn btn-info" style="position: fixed;
 right: -40px;
  top: 50%;
  transform: rotate(-90deg);
  z-index: 100;" href="{{ route('login') }}" onclick="return confirm('Please login to send a message');">
    {{-- onclick="toggleShowChatModal();" --}}
    Chat with admin
    <span class="badge badge-warning" id="new_unread_message_count"></span>
</a>
@endauth


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    User to admin massenger
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div id="messages" style="max-height: 400px; overflow-y: scroll;">
                        @foreach (\App\Models\Message::where('user_from_id', auth()->id())->where('user_to_id',
                        2)->get() as $old_message)
                        <div class="direct-chat-msg {{ $old_message->user_from_id == auth()->id() ? 'right':'' }}">
                            <div class="direct-chat-infos clearfix">
                                <span
                                    class="direct-chat-name float-{{ $old_message->user_from_id == auth()->id() ? 'right':'left' }}">
                                    Sarah Bullock </span> <span
                                    class="direct-chat-timestamp float-{{ $old_message->user_from_id == auth()->id() ? 'left':'right' }}">
                                    {{ $old_message->created_at }} </span>
                            </div>
                            <img class="direct-chat-img" src="https://ui-avatars.com/api/?name=admin"
                                alt="Message User Image">
                            <div class="direct-chat-text" style="word-break: break-word;">
                                {{ $old_message->message }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="input-group">
                        <input type="text" id="chatInput" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-append">
                            <button type="button" class="btn btn-primary" id="sendButton">Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>