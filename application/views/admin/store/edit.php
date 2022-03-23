<div class="conatiner">
    <form action="<?php echo base_url().'admin/store/edit/'.$store['maloai'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Sửa loại sản phẩm "<?php echo $store['tenloai'] ?>" </h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Tên loại sản phẩm</label>
                    <input type="text" name="tenloai_sanpham"  class="form-control
                    <?php echo (form_error('tenloai_sanpham') != "") ? 'is-invalid' : '';?>" placeholder="Add restaurant name"
                        value="<?php echo set_value('tenloai_sanpham', $store['tenloai']);?>">
                    <?php echo form_error('tenloai_sanpham'); ?>
                </div>
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-danger">
                    <label for="image">Ảnh</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <br>
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <?php if($store['anh'] != '' && file_exists('./public/uploads/restaurant/thumb/'.$store['anh'])) { ?>
                    <!-- <?php echo base_url().'public/uploads/restaurant/thumb/'.$store['anh']; ?>"> -->
                    <?php } else {?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                </div>
                <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-success" value="Lưu thay đổi">
            <a href="<?php echo base_url().'admin/store/index'?>" class="btn btn-secondary">Hủy bỏ</a>
        </div>
    </form>
</div>
