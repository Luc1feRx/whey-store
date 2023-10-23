<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                <input type="text" class="form-control" placeholder="Nhập tên mã giảm giá" name="name"
                                    value="{{ old('name', $voucher->name ?? '') }}">
                                @error('name')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mã giảm giá</label>
                                <input type="text" class="form-control" name="voucher_sku"
                                    id="exampleInputPassword1" placeholder="Nhập mã giảm giá"
                                    value="{{ old('slug', $voucher->voucher_sku ?? '') }}">
                                @error('voucher_sku')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng</label>
                                <input type="number" class="form-control" id="slug" name="quantity"
                                    id="exampleInputPassword1" placeholder="Nhập số lượng"
                                    value="{{ old('slug', $voucher->quantity ?? '') }}">
                                @error('quantity')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số % giảm giá</label>
                                <input type="number" class="form-control" id="slug" name="percentage"
                                    id="exampleInputPassword1" placeholder="Nhập số % giảm giá"
                                    value="{{ old('slug', $voucher->percentage ?? '') }}">
                                @error('percentage')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control select2-data-post" id="status">
                                    <option value="">Chọn trạng thái</option>
                                    <option value="1" {{ isset($voucher) ? ($voucher->status == 1 ? 'selected' : '') : '' }}>Hiển thị</option>
                                    <option value="2" {{ isset($voucher) ? ($voucher->status == 2 ? 'selected' : '') : '' }}>Ẩn</option>
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
                        <i class="fa fa-save"></i> {{ isset($voucher) ? 'Sửa' : 'Thêm' }}
                    </button>
                    <input name="router" type="hidden" value="" id="router">
                </div>
            </div>
        </div>
    </div>