<!-- Modal -->
<div class="modal fade" id="exampleModalCenterExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Xuất hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.good-issues.exportProduct') }}" method="post">
          <div class="modal-body">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleInputEmail1">Số lượng</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="quantity" placeholder="Nhập số lượng">
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