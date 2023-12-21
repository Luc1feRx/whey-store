<div class="card-body">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="old_thumbnail" value="" class="old_thumbnail">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tài khoản</label>
                                <input type="text" class="form-control" placeholder="Nhập tên tài khoản"
                                    name="name"
                                    value="{{ old('name', $user->name ?? '') }}">
                                @error('name')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" name="email"
                                    id="exampleInputPassword1" placeholder="Nhập email"
                                    value="{{ old('email', $user->email ?? '') }}">
                                @error('email')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone"
                                    id="exampleInputPassword1" placeholder="Nhập email"
                                    value="{{ old('email', $user->phone ?? '') }}">
                                @error('email')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Địa chỉ</label>
                                <input type="text" class="form-control" name="address"
                                    id="exampleInputPassword1" placeholder="Nhập địa chỉ"
                                    value="{{ old('address', $user->address ?? '') }}">
                                @error('address')
                                <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (!isset($user))
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" class="form-control" name="password"
                                        id="exampleInputPassword1" placeholder="Nhập password"
                                        value="{{ old('password', $user->password ?? 'asd123123') }}">
                                    @error('password')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Vai trò</label>
                                <select class="form-control select2-common" name="role_id" aria-hidden="true">
                                    <option value="">Chọn vai trò</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ isset($admin) && $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
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
                        <i class="fa fa-save"></i> {{ isset($admin) ? 'Sửa' : 'Thêm' }}
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
                            <input type="file" name="avatar" id="thumbnail" class="form-control btn_gallery d-none" placeholder="" value="" accept="images/*">
                        </div>
                        <img
                            src="{{ !empty($admin->avatar) ? asset('storage/' .$admin->avatar) : asset('backend\dist\img\placeholder.png') }}"
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