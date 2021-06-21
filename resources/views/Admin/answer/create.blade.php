@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.errors')
                <form action="{{ route('admin.answer.store') }}" method="POST" class="">
                    @csrf

                    <div class="form-group">
                        <label for="" class="">Question:</label>
                        <input type="text" class="form-control d-none" name="question_id" value="{{ $question->id }}">
                        <p class="">
                            {!! $question->title !!}
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="" class="">Answer:</label>
                        <textarea type="text" class="form-control" name="answer" required id="editor">
                        </textarea>
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