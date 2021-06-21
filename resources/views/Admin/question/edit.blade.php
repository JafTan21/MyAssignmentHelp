@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.errors')
                <form action="{{ route('admin.question.update', $question) }}" method="POST" class="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="">Question:</label>
                        <textarea type="text" class="form-control" name="title" required id="editor">
                            {!! $question->title !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="">Question slug:</label>
                        <input type="text" class="form-control" name="slug" required value="{{ $question->slug }}">
                    </div>
                    <div class="form-group row">
                        <label>Question category: </label>
                        <select name="question_categories_id" required class="form-control">
                            @foreach (\App\Models\QuestionCategory::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ $question->question_categories_id == $category->id ? 'selected' : ''}}>
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
</script>
@endsection