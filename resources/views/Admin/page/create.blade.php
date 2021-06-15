@extends('layouts.admin')

@section('content')
<form action="{{ route('admin.page.store') }}" method="POST" class="">
    @csrf
    <div class="form-group">
        <label for="" class="">Page title:</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="form-group">
        <label for="" class="">Page description:</label>
        <input type="text" class="form-control" name="description" required>
    </div>
    <div class="form-group">
        <label for="" class="">Page slug:</label>
        <input type="text" class="form-control" name="slug" required>
    </div>
    <div class="form-group">
        <label for="" class="">Page contents:</label>
        <textarea id="editor" name="page"></textarea>
    </div>
    <div class="form-group row">
        <div class="col-md-3">
            <label>Service category: </label>
            <select name="serviceCategory" id="serviceCategory" required class="form-control"
                onchange="load_service_sub_categories()">
                <option value="" selected disabled>--- Select ---</option>
                @foreach (\App\Models\ServiceCategory::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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

@include('ckeditor')

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
@endsection