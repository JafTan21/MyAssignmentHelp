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
                        <input value="{{ $question->title }}" type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="">Description:</label>
                        <textarea type="text" class="form-control" name="description" required id="editor">
                            {!! $question->description !!}
                        </textarea>
                    </div>


                    <div class="form-group">
                        <label for="" class="">Question slug:</label>
                        <input type="text" class="form-control" name="slug" required value="{{ $question->slug }}">
                    </div>
                    <div class="form-group row">
                        <label>Question category: </label>
                        <select name="question_category_id" required class="form-control">
                            @foreach (\App\Models\QuestionCategory::pluck('id', 'name') as $name => $id)
                            <option value="{{ $id }}" {{ $question->question_category_id == $id ? 'selected' : ''}}>
                                {{ $name }}</option>
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




@section('styles')
<link href="{{ asset('froala_editor_4.0.1\css\froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.1/js/froala_editor.min.js"
    integrity="sha512-DC6eRe7DrRFl0gZcpnbMDPJg6QykwAfcdWy1iJ+lg5UYtp3AZc0u91d2NwYaRYq2muLWSkyG8Eqy/MejSmwpjw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var editor = new FroalaEditor('#editor', {
            imageUploadParam: 'image_param',
            imageUploadMethod: 'post',
            imageUploadURL: "{{ route('image.store') }}",
            imageUploadParams: {
                froala: 'true',
                _token: "{{ csrf_token() }}"
            }
        })
</script>


@endsection