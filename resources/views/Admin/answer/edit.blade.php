@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.errors')
                <form action="{{ route('admin.answer.update', $answer) }}" method="POST" class="">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="" class="">Answer:</label>
                        <textarea type="text" class="form-control" name="answer" required id="editor">
                            {!! $answer->answer !!}
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