<div class="col-md-3 col-5">
    <div class="card card-primary">
        <div class="card-header">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" wire:click="toggle_is_collapsed">
                <h3 class="card-title">
                    New service category <i class="fas fa-minus"></i>
                </h3>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body " style="display: {{ $is_collapsed ? 'none':'' }};">
            <label for="" class="">New service category</label>
            <input type="text" class="form-control" wire:model.500ms="name">
            <button class="btn btn-success btn-sm" wire:click="saveNewServiceCategory"
                {{ $name==''?'disabled':'' }}>Save</button>
        </div>
        <!-- /.card-body -->
    </div>

    <ul class="list-group">
        @forelse ($serviceCategories as $serviceCategory)
        <li wire:click="openSubCategoryOf({{ $serviceCategory->id }})"
            class="list-group-item {{ $active == $serviceCategory->id ? 'active' : '' }}" style="cursor: pointer;">
            {{ $serviceCategory->name }}
        </li>
        @empty
        <li class="list-group-item">no service found</li>
        @endforelse
    </ul>
</div>