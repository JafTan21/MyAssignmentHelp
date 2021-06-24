<div class="col-md-3 col-5">
    <div class="card card-secondary">
        <div class="card-header">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" wire:click="toggle_is_collapsed">
                <h3 class="card-title">
                    New service category <i class="fas fa-minus"></i>
                </h3>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: {{ $is_collapsed ? 'none':'' }};">

            @if ($error)
            <div class="alert alert-danger text-sm">
                {{ $error }}
            </div>
            @endif

            <label for="" class="">Name</label>
            <input type="text" class="form-control" wire:model.500ms="name"
                {{ is_null($serviceCategoryId) ? 'disabled':'' }}>
            <label for="" class="">Slug</label>
            <input type="text" class="form-control" wire:model.500ms="slug"
                {{ is_null($serviceCategoryId) ? 'disabled':'' }}>
            <button class="btn btn-success btn-sm" wire:click="saveNewSubServiceCategory"
                {{ $name=='' || $slug=='' ?'disabled':'' }}>Save</button>
        </div>
        <!-- /.card-body -->
    </div>
    <ul class="list-group">
        @forelse ($subCategories as $subCategory)
        <li class="list-group-item">
            {{ $subCategory->name }}
            (Total page: {{ $pages->where('main_category_id', $serviceCategoryId)
            ->where('sub_category_id', $subCategory->id)->count() }})
        </li>
        @empty
        <li class="list-group-item bg-warning">No sub category found</li>
        @endforelse
    </ul>
</div>