@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.page.update', $page->id) }}" method="POST" class="">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="" class="">Page title:</label>
        <input type="text" class="form-control" name="title" required value="{{ $page->title }}">
    </div>
    <div class="form-group">
        <label for="" class="">Page description:</label>
        <input type="text" class="form-control" name="description" required value="{{ $page->description }}">
    </div>
    <div class="form-group">
        <label for="" class="">Page slug:</label>
        <input type="text" class="form-control" name="slug" required value="{{ $page->slug }}">
    </div>
    <div class="form-group">
        <label for="" class="">Page contents:</label>
        {{-- <textarea class="editor-2" rows="30" name="page">
            {!! $page->content !!}
          </textarea> --}}
        <textarea id="editor" name="page">
            {!! $page->content !!}
        </textarea>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label>Service category: </label>
            <select name="serviceCategory" id="serviceCategory" required class="form-control"
                onchange="load_service_sub_categories()">
                <option value="" selected disabled>--- Select ---</option>
                @foreach (\App\Models\ServiceCategory::all() as $category)
                <option value="{{ $category->id }}" {{ $category->id == $page->main_category_id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label>Service sub category: </label>
            <select name="serviceSubCategory" id="serviceSubCategory" required class="form-control">
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
@endsection

@section('scripts')
{{-- ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json --}}

{{-- @include('ckeditor') --}}

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
                    var pageId = "{{ $page->id }}";

                    var is_selected;
                    subCategories.forEach(subCategory => {
                        is_selected = (subCategory.id == pageId) ? 'selected' : '';
                        options += `<option value='${subCategory.id}' ${is_selected}>`;
                        options += `${subCategory.name}`;
                        options += `</option>`;
                    });

                    $("#serviceSubCategory").html(options);
                }
            });
        }

        load_service_sub_categories();
</script>
@endsection