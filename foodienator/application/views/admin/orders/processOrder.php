<div class="container table-responsive m-t-20">
    <h2 class="py-3 text-center">Xem đơn hàng</h2>
    <table id="myTable" class="table table-bordered table-hover table-striped dataTable">
        <tbody>
            <tr>
                <td><strong>Đặt hàng bởi:</strong></td>
                <td><?php echo $order['tendangnhap'] ?></td>
            </tr>
            <tr>
                <td><strong>Tên sản phẩm:</strong></td>
                <td><?php echo $order['sptrongdon'] ?></td>
            </tr>
            <tr>
                <td><strong>Số lượng:</strong></td>
                <td><?php echo $order['soluong'] ?></td>
            </tr>
            <tr>
                <td><strong>Giá tiền:</strong></td>
                <td><?php echo "$".$order['giatien'] ?></td>
            </tr>
            <tr>
                <td><strong>Địa chỉ:</strong></td>
                <td><?php echo $order['diachi'] ?></td>
            </tr>
            <tr>
                <td><strong>Ngày đặt hàng:</strong></td>
                <td><?php echo $order['ngaytao'] ?></td>
            </tr>
            <form method="post" action="<?php echo base_url().'admin/orders/updateOrder/'.$order['madon']; ?>">
                <tr>
                    <td><strong>Trạng thái giao hàng:</strong></td>
                    <td>
                        <select class="form-control" name="trangthai"
                            class="<?php echo (form_error('trangthai') != "") ? 'is-invalid' : '';?>">
                            <option>Lựa chọn trạng thái</option>
                            <option value="in process">Trên đường vận chuyển</option>
                            <option value="closed">Đã giao</option>
                            <option value="rejected">Buộc hủy</option>
                        </select>
                        <?php echo form_error('trangthai');?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary btn-block" type="submit">Lưu thay đổi</button></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>