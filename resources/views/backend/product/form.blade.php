<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                                    id="convert_slug" name="name"
                                    value="{{ old('name', $product->name ?? '') }}">
                                @error('name')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    id="exampleInputPassword1" placeholder="Nhập slug sản phẩm"
                                    value="{{ old('slug', $product->slug ?? '') }}">
                                @error('slug')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea id="short_description" name="short_description" cols="30" rows="12" placeholder="Nhập mô tả" class="form-control">{!! old('short_description', $product->short_description ?? '') !!}</textarea>
                                @error('short_description')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" {{ isset($product) ? ($product->is_featured_product == 1 ? 'checked' : '') : '' }} name="is_featured_product" value="1" type="checkbox">
                                    <label class="form-check-label">Sản phẩm nổi bật</label>
                                  </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea id="description" name="description" cols="30" rows="10" placeholder="Nhập nội dung" class="form-control content-post summernote">{!! old('content', $post->content ?? '') !!}</textarea>
                                @error('description')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trọng lượng</label>
                                <input type="text" class="form-control" placeholder="Nhập trọng lượng"
                                    id="convert_slug" name="weight"
                                    value="{{ old('weight', $product->weight ?? '') }}">
                                @error('weight')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khẩu phần</label>
                                <input type="text" class="form-control" placeholder="Nhập khẩu phần" name="serving_size"
                                    value="{{ old('serving_size', $product->serving_size ?? '') }}">
                                @error('serving_size')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá gốc</label>
                                <input type="text" class="form-control" placeholder="Nhập giá gốc" name="price"
                                    value="{{ old('price', $product->price ?? '') }}">
                                @error('price')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phần trăm khuyến mãi</label>
                                <div class="input-group">
                                    <input type="number" min="1" max="100" class="form-control" placeholder="Nhập giá gốc" name="percent"
                                    value="{{ old('percent', $product->percent ?? '') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                    </div>
                                </div>
                                @error('percent')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Điểm bình chọn</label>
                                <input type="text" class="form-control" placeholder="Nhập điểm" name="score"
                                    value="{{ old('score', $product->score ?? '') }}">
                                @error('score')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xuất xứ</label>
                                <input type="text" class="form-control" placeholder="Nhập xuất xứ" name="origin"
                                    value="{{ old('origin', $product->origin ?? '') }}">
                                @error('origin')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thành phần chính</label>
                                <input type="text" class="form-control" placeholder="Nhập thành phần chính" name="main_ingredient"
                                    value="{{ old('main_ingredient', $product->main_ingredient ?? '') }}">
                                @error('main_ingredient')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control select2-common" name="brand_id" aria-hidden="true">
                                    <option value="">Chọn thương hiệu</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control select2-common-multiple" data-live-search="true" data-placeholder="Chọn danh mục" name="category_id[]" multiple="multiple" aria-hidden="true">
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại vị</label>
                                <select class="form-control select2-common-multiple" data-live-search="true" data-placeholder="Chọn loại vị" name="flavor_id[]" multiple="multiple" aria-hidden="true">
                                    @foreach ($flavors as $flavor)
                                        <option value="{{ $flavor->id }}">{{ $flavor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control select2-data-post" id="status">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1" {{ isset($product) ? ($product->status == 1 ? 'selected' : '') : '' }}>Hiển thị</option>
                                    <option value="2" {{ isset($product) ? ($product->status == 2 ? 'selected' : '') : '' }}>Ẩn</option>
                                </select>
                                @error('status')
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
                    <button type="submit" type="submit" name="btnSubmit" value="save" class="btn btn-primary submit btnCreate">
                        <i class="fa fa-save"></i> {{ isset($post) ? 'Sửa' : 'Thêm' }}
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
                            src="{{ !empty($post->thumbnail) ? asset('storage/' .$post->thumbnail) : asset('backend\dist\img\placeholder.png') }}"
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Chọn ảnh
                    </h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="image[]" id="images" class="" multiple accept="images/*">
                    </div>
                    <div id="image-preview" style="margin-top: 10px">
                        <img src="{{ asset('backend\dist\img\placeholder.png') }}" class="preview-image" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>