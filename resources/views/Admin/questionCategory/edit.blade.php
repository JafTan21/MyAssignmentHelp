@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @include('layouts.errors')
                <form action="{{ route('admin.questionCategory.update', $questionCategory) }}" method="POST" class="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="">Name:</label>
                        <input type="text" class="form-control" name="name" required
                            value={{ $questionCategory->name }}>
                    </div>
                    <div class="form-group">
                        <label for="" class="">Slug:</label>
                        <input type="text" class="form-control" name="slug" required
                            value={{ $questionCategory->slug }}>
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