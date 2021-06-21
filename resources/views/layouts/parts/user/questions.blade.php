<li>
    <a href="{{ route('userpanel.questionCategories') }}">Questions</a>
    <ul class="">
        @foreach ($questionCategories as $questionCategory)
        <li class="">
            <a href="{{ route('userpanel.questionCategory.all-questions', $questionCategory->slug) }}" class="">
                {{ $questionCategory->name }}
            </a>
            <ul class="">
                @foreach ($questionCategory->questions as
                $question)
                <li class="">
                    <a href="{{ route('userpanel.question', $question->slug) }}" class="questions-list">
                        {!! $question->title !!}
                    </a>
                </li>
                @endforeach
            </ul>

        </li>
        @endforeach
    </ul>
</li>