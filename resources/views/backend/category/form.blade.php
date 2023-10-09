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
    <div class="form-group">
        <label for="catetory">Danh mục cha</label>
        <select name="parent_id" class="form-control select2-data-category" id="">
            @foreach ($getParentCategory as $getItem)
                @php
                    $selectedParentId = old('parent_id', $cate->parent_id ?? ''); // Lấy danh mục cha của category (nếu có)
                @endphp

                @foreach ($getParentCategory as $getItem)
                    @if ($selectedParentId == $getItem->id)
                        <option value="{{ $getItem->id }}" selected>{{ $getItem->name_category }}</option>
                    @else
                        <option value="{{ $getItem->id }}">{{ $getItem->name_category }}</option>
                    @endif
                @endforeach
            @endforeach
        </select>
        @error('parent_id')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">Thêm</button>
</div>
