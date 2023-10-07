<div class="card-body" style="display: block;">
    <div class="card card-primary">
        <!-- /.card-header -->

        <!-- form start -->
        <form action="{{ route('admin.categories.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" class="form-control"
                        placeholder="Nhập tên danh mục" id="convert_slug" name="name_category">
                        @error('name_category') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug_category" id="exampleInputPassword1"
                        placeholder="Nhập slug danh mục">
                        @error('slug_category') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="catetory">Danh mục cha</label>
                    <select name="parent_id" class="form-control select2-data-category" id="">
                        <option value="">Chọn danh mục</option>
                        @foreach ($getParentCategory as $getItem)
                            <option value="{{ $getItem->id }}">{{ $getItem->name_category }}</option>
                        @endforeach
                    </select>
                    @error('parent_id') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
</div>