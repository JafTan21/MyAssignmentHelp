@extends('layouts.admin')

@section('page-header')
All pages
@endsection

@section('content')

<div class="container">


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">


                    <div class="row">
                        <div class="col">
                            <a href="{{ route('admin.page.create') }}" class="btn btn-info btn-sm">
                                New page
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
                                            Page
                                        </th>
                                        <th class="">
                                            Category </th>
                                        <th class="">
                                            Sub Category </th>
                                        <th class="">
                                            Static page </th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($pages as $page)
                                    <tr class="">
                                        <td class="">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="">
                                            <a href="{{ route('admin.page.edit', $page->id) }}" class="text-info">
                                                {{ $page->title }}
                                            </a>
                                        </td>
                                        <td class="">
                                            {{ $page->mainCategory->name }}
                                        </td>
                                        <td class="">
                                            {{ $page->subCategory->name }}
                                        </td>
                                        <td class="">
                                            @if ($page->staticPageExists)
                                            <div class="text-success">
                                                Yes
                                            </div>
                                            @else
                                            <a href="{{ route('admin.page.GenerateStaticPage', $page->slug) }}"
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