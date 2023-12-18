<div class="col-xs-12" id="collapseExample">
    <div class="table-configuration-wrap">
        <div class="wrapper-filter">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Tìm kiếm tên sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="deleted_at" class="form-control" id="deleted_at">
                                <option value="">Chọn trạng thái</option>
                                @foreach($checkStatus as $k => $item)
                                <option value={{$k}}
                                        @if($request->has('deleted_at') && $request->deleted_at!=null && $request->deleted_at == $k) selected @endif>
                                    {{ $item }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-search">
                                <i class="fa fa-search"></i> Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>