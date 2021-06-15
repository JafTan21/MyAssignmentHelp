@extends('layouts.admin')

@section('page-header')
All pages
@endsection

@section('content')

<div class="container">

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
                                {{ $page->slug }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection