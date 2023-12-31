<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Nhập tên danh mục" id="convert_slug" name="name_category"
            value="{{ old('name_category', $cate->name_category ?? '') }}">
        @error('name_category')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug_category" id="exampleInputPassword1"
            placeholder="Nhập slug danh mục" value="{{ old('slug_category', $cate->slug_category ?? '') }}">
        @error('slug_category')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    @php
        $selectedParentId = old('parent_id', $cate->parent_id ?? ''); // Lấy danh mục cha của category (nếu có)
    @endphp
    @if (isset($cate->parent_id) && Route::currentRouteName() === 'admin.categories.edit')
        <div class="form-group">
            <label for="category">Danh mục cha</label>
            <select name="parent_id" class="form-control select2-data-category" id="category">
                <option value="">Chọn danh mục</option>

                @foreach ($getParentCategory as $getItem)
                    @if ($selectedParentId == $getItem->id)
                        <option value="{{ $getItem->id }}" selected>{{ $getItem->name_category }}</option>
                    @else
                        <option value="{{ $getItem->id }}">{{ $getItem->name_category }}</option>
                    @endif
                @endforeach
            </select>
            @error('parent_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    @else
        <div class="form-group">
            <label for="category">Danh mục cha</label>
            <select name="parent_id" class="form-control select2-data-category" id="category">
                <option value="">Chọn danh mục</option>

                @foreach ($getParentCategory as $getItem)
                    <option value="{{ $getItem->id }}">{{ $getItem->name_category }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    @endif
    <div class="form-group">
        <label for="exampleInputFile">Chọn Ảnh</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="thumbnail" class="custom-file-input" id="imageInput">
            <label class="custom-file-label" for="exampleInputFile">Chọn Ảnh</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Tải lên</span>
          </div>
        </div>
        @error('thumbnail')
            <span class="error">{{ $message }}</span>
        @enderror
        <img id="imagePreview" src="{{ isset($cate->thumbnail) ? asset('storage/'.$cate->thumbnail) : '' }}" alt="Image Preview" style="{{ isset($cate->thumbnail) ? '' : 'display: none;' }}">
      </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ isset($cate) ? 'Sửa' : 'Thêm' }}</button>
</div>
