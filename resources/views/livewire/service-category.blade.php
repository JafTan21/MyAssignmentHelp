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
        <li class="list-group-item  {{ $active == $serviceCategory->id ? 'bg-info' : '' }}" style="cursor: pointer;
         padding: 0;
         text-align: center;
    background: transparent;
         ">
            <div class="row">

                <div class="col-6">
                    <button wire:click="openSubCategoryOf({{ $serviceCategory->id }})" type="button"
                        class="btn {{ $active == $serviceCategory->id ? 'btn-info' : '' }}">
                        {{ $serviceCategory->name }}
                    </button>
                </div>
                <div class="col-6">

                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button"
                            class="btn {{ $active == $serviceCategory->id ? 'btn-info' : '' }} dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-edit"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <button wire:click="delete('{{ $serviceCategory->id }}')"
                                class="dropdown-item bg-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </li>
        @empty
        <li class="list-group-item">no service found</li>
        @endforelse
    </ul>
</div>