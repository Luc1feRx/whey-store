<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nhập hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.good-issues.store') }}" method="post">
        <div class="modal-body">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Số lượng</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="quantity" placeholder="Nhập số lượng">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Giá nhập</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Nhập giá">
            </div>
            <div class="form-group">
              <label>Ngày sản xuất:</label>
                <div class="input-group">
                    <input type="text" name="manufacturing_date" class="form-control datetimepicker">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label>Ngày hết hạn:</label>
                <div class="input-group">
                    <input type="text" name="expiration_date" class="form-control datetimepicker">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <input type="text" style="display: none" name="product_id" value="" class="dataIdProduct">
            <input type="text" style="display: none" name="flavor_id" value="" class="dataIdFlavor">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>