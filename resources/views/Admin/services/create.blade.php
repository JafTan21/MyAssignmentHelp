@extends('layouts.admin')

@section('page-header')
new service menus
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New service menu</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.services.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">
                                Service menu name
                            </label>
                            <input type="text" required class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Enter name" name="name" value="{{ old('name')??'' }}">
                            @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">
                                Service menu slug
                            </label>
                            <input type="text" required class="form-control @error('slug') is-invalid @enderror"
                                id="slug" placeholder="Enter slug" name="slug" value="{{ old('slug')??'' }}">
                            @error('slug')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Menu/Sub-menu: </label>
                            <select name="serviceMenu" required id="serviceMenu"
                                class="form-control @error('serviceMenu') is-invalid @enderror"
                                onchange="submenu_option_show_or_hide()">
                                <option value="1">Service menu</option>
                                <option value="0"
                                    {{ (request()->query('id') || old('serviceMenu')) ? 'selected' : '' }}>Service sub
                                    menu
                                </option>
                            </select>
                            @error('serviceMenu')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Submenu of: </label>
                            <select name="submenu_of" disabled="true" id="submenu_of"
                                class="form-control  @error('submenu_of') is-invalid @enderror">
                                <option value="" disabled selected>Select</option>

                                @forelse (\App\Models\ServiceMenu::menus()->get() as $serviceMenu)

                                <option value="{{ $serviceMenu->id }}"
                                    {{ request()->query('id') == $serviceMenu->id ? 'selected' : '' }}>
                                    {{ $serviceMenu->name }}
                                </option>

                                @empty
                                @endforelse
                            </select>
                            @error('submenu_of')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function submenu_option_show_or_hide(){
    var selected = $("#serviceMenu").val();

    if(selected == 0){ // sub menu
        $("#submenu_of").attr('disabled', false);
    }

    if(selected == 1){ // menu
        $("#submenu_of")
        .val('')
        .attr('disabled', true)
        .attr('required', true);
    }
}
submenu_option_show_or_hide();
</script>
@endsection