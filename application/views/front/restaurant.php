<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Loại sản phẩm</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container text-center padding dish-card">
    <div class="row container">
        <?php if(!empty($stores)) { ?>
        <?php foreach($stores as $store) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $store['anh'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/restaurant/thumb/'.$image; ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $store['tenloai']; ?></h4>
                    <a href="<?php echo base_url().'dish/list/'.$store['maloai']; ?>" class="btn btn-primary">Xem sản phẩm</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <h1>No records found</h1>
        <?php } ?>
    </div>
</div>