<div class="col-xl-12 col-lg-7">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample" style="">
            <div class="card-body">
                <form class="user">
                    <div class="form-group">
                        <input wire:model="name_category" type="text" id="convert_slug" class="form-control" placeholder="Nhập tên danh mục">
                        @error('name_category') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" wire:model="category_slug" id="slug" class="form-control" placeholder="Nhập slug">
                        @error('category_slug') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <button wire:click.prevent="store" type="submit" class="btn btn-primary btn-block">
                        Thêm mới
                    </button>    
                </form>
            </div>
        </div>
    </div>
</div>