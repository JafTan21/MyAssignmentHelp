@extends('layouts.admin')

@section('page-header')
Question categories
@endsection

@section('content')

<div class="container">

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
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($questions as $question)
                    <tr class="">
                        <td class="">
                            {{ $loop->iteration }}
                        </td>
                        <td class="">
                            <a href="{{ route('admin.question.edit', $question->id) }}" class="text-info">
                                {!! $question->title !!}
                            </a>
                        </td>
                        <td class="">
                            {{ $question->slug }}
                        </td>
                        <td class="">
                            {{ $question->category->name }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection