@extends('layouts.admin')

@section('page-header')
Question categories
@endsection

@section('content')

<div class="container">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('admin.question.create') }}" class="btn btn-info btn-sm">
                                New Question
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col">
                            <table class="table" id="myTable">
                                <thead class="">
                                    <tr class="">
                                        <th class="">#</th>
                                        <th class="">
                                            Question
                                        </th>
                                        <th class="">
                                            Slug
                                        </th>
                                        <th class="">
                                            Category
                                        </th>
                                        <th class="">
                                            Answer
                                        </th>
                                        <th class="">
                                            Static page
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($questions as $question)
                                    <tr class="">
                                        <td class="">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.question.edit', $question->id) }}"
                                                class="text-info">
                                                {!! $question->title !!}
                                            </a>
                                        </td>
                                        <td class="">
                                            {{ $question->slug }}
                                        </td>
                                        <td class="">
                                            {{ $question->questionCategory->name }}
                                        </td>
                                        <td class="">
                                            @if ($question->answer)
                                            <a href="{{ route('admin.answer.edit', $question->answer->id) }}"
                                                class="text-info">
                                                {!! $question->answer->answer !!}
                                            </a>
                                            @else
                                            <a href="{{ route('admin.answer.create', ['question'=>$question]) }}"
                                                class="text-danger">
                                                Answer not added. Add now?
                                            </a>
                                            @endif
                                        </td>
                                        <td class="">
                                            @if ($question->staticPageExists)
                                            <div class="text-success">
                                                Yes
                                            </div>
                                            @else
                                            <a href="{{ route('admin.question.GenerateStaticPage', $question->slug) }}"
                                                class="text-danger">
                                                No. Generate now?
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('styles')
<link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet"
    type="text/css" />
@endsection

@section('scripts')

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js">
</script>

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