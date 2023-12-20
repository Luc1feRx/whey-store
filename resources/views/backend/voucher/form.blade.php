<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
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
                                    value="{{ old('voucher_sku', $voucher->voucher_sku ?? '') }}">
                                @error('voucher_sku')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số lượng</label>
                                <input type="number" class="form-control" name="quantity"
                                    id="exampleInputPassword1" placeholder="Nhập số lượng"
                                    value="{{ old('quantity', $voucher->quantity ?? '') }}">
                                @error('quantity')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea id="description" name="description" cols="30" rows="3" placeholder="Nhập mô tả" class="form-control">{!! old('description', $voucher->description ?? '') !!}</textarea>
                                @error('description')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Điều kiện để giảm giá</label>
                                <input type="text" class="form-control" name="min_purchase"
                                    id="exampleInputPassword1" placeholder="Nhập số tiền tổng đơn hàng tối thiểu để giảm"
                                    value="{{ old('min_purchase', $voucher->min_purchase ?? '') }}">
                                @error('min_purchase')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số tiền giảm</label>
                                <input type="text" class="form-control" name="reduced_amount"
                                    id="exampleInputPassword1" placeholder="Nhập số tiền giảm giá"
                                    value="{{ old('reduced_amount', $voucher->reduced_amount ?? '') }}">
                                @error('reduced_amount')
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