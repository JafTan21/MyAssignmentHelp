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
                            <a href="{{ route('admin.questionCategory.create') }}" class="btn btn-info btn-sm">
                                New Category
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
                                            Name
                                        </th>
                                        <th class="">
                                            Slug
                                        </th>
                                        <th class="">
                                            Static page
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($questionCategories as $questionCategory)
                                    <tr class="">
                                        <td class="">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.questionCategory.edit', $questionCategory->id) }}"
                                                class="text-info">
                                                {!! $questionCategory->name !!}
                                            </a>
                                        </td>
                                        <td class="">
                                            {{ $questionCategory->slug }}
                                        </td>
                                        <td class="">
                                            @if ($questionCategory->staticPageExists)
                                            <div class="text-success">
                                                Yes
                                            </div>
                                            @else
                                            <a href="{{ route('admin.questionCategory.GenerateStaticPage', $questionCategory->slug) }}"
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