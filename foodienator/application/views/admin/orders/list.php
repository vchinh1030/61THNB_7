<div class="container">
    <div class="container shadow-container">
        <?php if($this->session->flashdata('success') != ""):?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success');?>
        </div>
        <?php endif ?>
        <?php if($this->session->flashdata('error') != ""):?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('error');?>
        </div>
        <?php endif ?>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <h2>Tất cả đơn hàng</h2>
            </div>
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Tìm kiếm..." style="width:50%;">
        </div>

        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá tiền</th>
                        <th>Địa chỉ</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt hàng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($orders)) {?>
                    <?php foreach($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['tendangnhap']; ?></td>
                        <td><?php echo $order['sptrongdon']; ?></td>
                        <td><?php echo $order['soluong']; ?></td>
                        <td><?php echo "$".$order['giatien']; ?></td>
                        <td><?php echo $order['diachi']; ?></td>


                        <?php $status=$order['trangthai'];
						if($status=="" or $status=="NULL") { ?>
                        <td> <button type="button" class="btn btn-secondary" style="font-weight:bold;"><i class="fas fa-bars"></i> Đang chờ duyệt</button></td>
                        <?php } if($status=="in process") { ?>
                        <td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"
                                    aria-hidden="true"></span> Trên đường vận chuyển </button></td>
                        <?php } if($status=="closed") { ?>
                        <td> <button type="button" class="btn btn-success"><span class="fa fa-check-circle"aria-hidden="true"></span> Đã thanh toán</button>
                        </td> <?php } ?> <?php if($status=="rejected") { ?>
                        <td> <button type="button" class="btn btn-danger"><i class="far fa-times-circle"></i> Hủy đơn hàng</button>
                        </td>
                        <?php } ?>
                        <td><?php echo $order['ngaytao']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/orders/processOrder/'.$order['madon'];?>"
                                class="btn btn-info mb-1">                               <i class="fas fa-arrow-alt-circle-right"></i> Sửa</a>
                            <a href="<?php echo base_url().'admin/orders/deleteOrder/'.$order['madon']?>"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } else {?>
                    <tr>
                        <td colspan="8">Records not found</td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
function deleteOrder(id) {
    if (confirm("Are you sure you want to delete orders?")) {
        window.location.href = '<?php echo base_url().'admin/orders/deleteOrder/';?>' + id;
    }
}

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>