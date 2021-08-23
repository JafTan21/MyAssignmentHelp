<li>
    <a href="{{ route('userpanel.questionCategories') }}">Questions</a>
    <ul class="">
        @foreach ($questionCategories as $questionCategory)
        <li class="">
            @if ($questionCategory->staticPageExists)
            <a href="{{ '/question-category/'.$questionCategory->slug.'.html' }}" class="questions-list">
                {{ $questionCategory->name }}
            </a>
            @else
            <a href="{{ route('userpanel.questionCategory.all-questions', $questionCategory->slug) }}" class="">
                {{ $questionCategory->name }}
            </a>
            @endif
            {{-- <ul class="">
                @foreach ($questionCategory->questions as
                $question)
                <li class="">
                    @if ($question->staticPageExists)
                    <a href="{{ '/question/'.$question->slug.'.html' }}" class="questions-list">
            {!! $question->title !!}
            </a>
            @else
            <a href="{{ route('userpanel.question', $question->slug) }}" class="questions-list">
                {!! $question->title !!}
            </a>
            @endif
        </li>
        @endforeach
    </ul> --}}

</li>
@endforeach
</ul>
</li>