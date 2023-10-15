<div class="card-body">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên slider</label>
        <input type="text" class="form-control" placeholder="Nhập tên thương hiệu" id="convert_slug" name="name"
            value="{{ old('name', $slider->name ?? '') }}">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" id="exampleInputPassword1"
            placeholder="Nhập slug" value="{{ old('slug', $slider->slug ?? '') }}">
        @error('slug')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
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
        <img id="imagePreview" src="{{ isset($slider->thumbnail) ? asset('storage/'.$slider->thumbnail) : '' }}" alt="Image Preview" style="{{ isset($slider->thumbnail) ? '' : 'display: none;' }}">
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ isset($slider) ? 'Sửa' : 'Thêm' }}</button>
</div>
