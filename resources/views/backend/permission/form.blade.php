<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên quyền</label>
                                <input type="text" class="form-control" placeholder="Nhập tên quyền"
                                    name="name"
                                    value="{{ old('name', $permission->name ?? '') }}">
                                @error('name')
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
                        <i class="fa fa-save"></i> {{ isset($permission) ? 'Sửa' : 'Thêm' }}
                    </button>
                    <input name="router" type="hidden" value="" id="router">
                </div>
            </div>
        </div>
    </div>