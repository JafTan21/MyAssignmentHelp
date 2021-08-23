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
                                        <th class="">
                                            Delete </th>
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
                                        <td>
                                            <form method="POST" action="{{ route('admin.page.destroy', $page->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
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