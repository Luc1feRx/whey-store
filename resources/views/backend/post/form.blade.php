<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tin tức</label>
                                <input type="text" class="form-control" placeholder="Nhập tên tin tức"
                                    id="convert_slug" name="name"
                                    value="{{ old('name_category', $cate->name_category ?? '') }}">
                                @error('name')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    id="exampleInputPassword1" placeholder="Nhập slug tin tức"
                                    value="{{ old('slug_category', $cate->slug_category ?? '') }}">
                                @error('slug')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control select2-data-post" id="status">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Ẩn</option>
                                </select>
                                @error('status')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" name="is_feature" value="1" type="checkbox">
                                    <label class="form-check-label">Tin nổi bật</label>
                                  </div>
                              </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea class="form-control summernote" name="content" id="content-post" cols="30" rows="10"></textarea>
                                @error('content')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Hành động
                    </h3>
                </div>
                <div class="card-body">
                    <button type="button" name="btnSubmit" value="save" class="btn btn-primary submit btnCreate">
                        <i class="fa fa-save"></i> Thêm
                    </button>
                    <input name="router" type="hidden" value="" id="router">
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Chọn ảnh
                    </h3>
                </div>
                <div class="card-body parent-thumbnail">
                    <div class="preview-image-wrapper ">
                        <div class="form-group">
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control btn_gallery d-none" placeholder="" value="" accept="images/*">
                        </div>
                        <img
                            src="{{ !empty($data->thumbnail) ? asset('storage/' .$data->thumbnail) : asset('backend\dist\img\placeholder.png') }}"
                            alt="Preview image" class="preview_image" width="150">
                        <a class="btn_remove_image" title="Remove image">
                            <i class="fa fa-times"></i>
                        </a>
                        <div class="mx-auto cursor-pointer position-relative mt-1">
                            <button id="btn-avatar" type="button" class="btn btn-primary w-full preview_image" aria-invalid="false" style="width: 100%">Chọn ảnh</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>