@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @include('layouts.errors')
            <form action="{{ route('admin.page.store') }}" method="POST" class="">
                @csrf
                <div class="form-group">
                    <label for="" class="">Page title:</label>
                    <input type="text" class="form-control" name="title" required value="{{ old('title') ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="" class="">Page description:</label>
                    <input type="text" class="form-control" name="description" required
                        value="{{ old('description') ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="" class="">Page slug:</label>
                    <input type="text" class="form-control" name="slug" required value="{{ old('slug') ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="" class="">Page contents:</label>
                    <textarea id="editor" name="content">
                        {{ old('content') ?? '' }}
                    </textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Service category: </label>
                        <select name="main_category_id" id="serviceCategory" required class="form-control"
                            onchange="load_service_sub_categories()">
                            <option value="" selected disabled>--- Select ---</option>
                            @foreach (\App\Models\ServiceCategory::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Service sub category: </label>
                        <select name="sub_category_id" id="serviceSubCategory" required class="form-control">
                            {{-- @foreach (\App\Models\ServiceSubCategory::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
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
@endsection


@section('styles')
<link href="{{ asset('froala_editor_4.0.1\css\froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')

<script>
    function load_service_sub_categories()
        {
            var categoryId = $("#serviceCategory").val();
var url = "/admin/page/get-sub-categories/" + categoryId;
            $.ajax({
                url: url,
                method: "GET",

                success: function(data){
                    var subCategories = data.subCategories;
                    var options = "";

                    subCategories.forEach(subCategory => {
                        options += `<option value='${subCategory.id}'>`;
                        options += `${subCategory.name}`;
                        options += `</option>`;
                    });

                    $("#serviceSubCategory").html(options);
                }
            });
        }
</script>

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