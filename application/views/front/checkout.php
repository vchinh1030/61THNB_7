<div class="container">
    
    <div class="row">
        <div class="col-md-8">
        <h2 class="mt-3">Kiểm tra đơn hàng</h2>
            <div class="table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php if($this->cart->total_items() > 0) { 
                    foreach($cartItems as $item) { ?>
                        <tr>
                            <td>
                                <?php $image = $item['image'];?>
                                <img class="" width="100"
                                    src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$image; ?>">
                            </td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo '$'.$item['price']; ?></td>
                            <td><?php echo $item['qty']; ?></td>
                            <td><?php echo '$'.$item['subtotal']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="5">
                                <p>Chưa có sản phẩm nào trong giỏ hàng !</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <?php  if($this->cart->total_items() > 0) { ?>
                            <td class="text-left">Total: <b><?php echo '$'.$this->cart->total();?></b></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <form action="<?php echo base_url().'checkout/index';?>" method="POST"
                class="form-container  shadow-container" style="width:80%">
                <h3 class="mt-3">Địa chỉ giao hàng</h3><hr>
                <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <textarea name="diachi" type="text" style="height:70px;"
                        class="form-control
                    <?php echo (form_error('diachi') != "") ? 'is-invalid' : '';?>"><?php echo set_value('diachi', $user['diachi']);?></textarea>
                    <?php echo form_error('diachi'); ?>
                </div>
                <p class="lead mb-0">Phương thức thanh toán</p>
                <div class="container p-2 mb-3" style="background: #e5e5e5;">
                    Thanh toán bằng tiền mặt
                </div>
                <div>
                    <a href="<?php echo base_url().'cart'; ?>" class="btn btn-warning"><i class="fas fa-angle-left"></i>
                        Trở lại giỏ hàng</a>
                    <button type="submit" name="placeOrder" class="btn btn-success">Đặt hàng <i
                            class="fas fa-angle-right"></i></button>
                </div>
                </from>
        </div>
    </div>
</div>