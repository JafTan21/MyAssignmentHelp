<div class="col-md-3">

    <ul class="list-group" id="users">

        @foreach (\App\Models\User::role('user')->get() as $user)
        <li class="list-group-item d-flex justify-content-between align-items-center py-0">
            <a href="{{ route('admin.message.inbox', $user->id) }}" class="btn ">
                {{ $user->name }}
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

    </ul>
</div>