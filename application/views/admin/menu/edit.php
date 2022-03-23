<div class="conatiner">
    <form id="myForm" action="<?php echo base_url().'admin/menu/edit/'.$dish['masp'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Sửa sản phẩm "<?php echo $dish['tensp']; ?>"</h3>
        <div class="form-group">
            <label class="control-label">Loại sản phẩm</label>
            <select name="tenloaisanpham" id="resname"
                class="form-control <?php echo (form_error('tenloaisanpham') != "") ? 'is-invalid' : '';?>">
                <option>--Chọn loại sản phẩm--</option>
                <?php 
                if (!empty($stores)) { 
                    foreach($stores as $store) {
                        ?>
                <option value="<?php echo $store['maloai'];?>">
                    <?php echo set_select('resname', $store['tenloai']);?>
                    <?php echo $store['tenloai'];?>
                </option>
                <?php }
                }
                ?>
            </select>
            <span></span>
            <?php echo form_error('tenloaisanpham');?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tensanpham">Tên sản phẩm</label>
                    <input type="text" class="form-control my-2 
                    <?php echo (form_error('tensanpham') != "") ? 'is-invalid' : '';?>" name="tensanpham" id="name"
                        placeholder="Nhập tên sản phẩm" value="<?php echo set_value('name', $dish['tensp']); ?>">
                    <span></span>
                    <?php echo form_error('tensanpham'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="giatien">Giá tiền</label>
                    <input type="Price" class="form-control my-2
                    <?php echo (form_error('giatien') != "") ? 'is-invalid' : '';?>" id="price" name="giatien"
                        placeholder="Nhập giá tiền" value="<?php echo set_value('price', $dish['giatien']); ?>">
                    <span></span>
                    <?php echo form_error('giatien'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="thongtinsanpham">Thông tin sản phẩm</label>
                    <input type="text" class="form-control my-2
                    <?php echo (form_error('thongtinsanpham') != "") ? 'is-invalid' : '';?>" id="about" name="thongtinsanpham"
                        placeholder="Nhập thông tin" value="<?php echo set_value('about', $dish['thongtinsp']); ?>">
                    <span></span>
                    <?php echo form_error('thongtinsanpham'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="anh">Ảnh</label>
                    <input type="file" id="image" name="image" placeholder="Enter Image" class="form-control my-2
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>

                    <?php if($dish['anh'] != "" && file_exists('./public/uploads/dishesh/thumb/'.$dish['anh'])) { ?>

                    <img src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$dish['anh'];?>">

                    <?php } else { ?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Lưu thay đổi</button>
        <a href="<?php echo base_url().'admin/menu/index'?>" class="btn btn-secondary">Trở lại</a>
    </form>
</div>
<script>
const form = document.getElementById('myForm');
const resname = document.getElementById("resname");
const dishname = document.getElementById("name");
const price = document.getElementById("price");
const about = document.getElementById("about");
const image = document.getElementById("image");

form.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
})

const sendData = (sRate, count) => {
    if (sRate === count) {
        event.currentTarget.submit();
    }
}

const successMsg = () => {
    let formCon = document.getElementsByClassName('form-control');
    var count = formCon.length - 2;
    for (var i = 0; i < formCon.length; i++) {
        if (formCon[i].className === "form-control my-2 success") {
            var sRate = 0 + i;
            sendData(sRate, count);
        } else {
            return false;
        }
    }
}

const validate = () => {
    const resnameVal = resname.value.trim();
    const dishnameVal = dishname.value.trim();
    const priceVal = price.value.trim();
    const aboutVal = about.value.trim();
    const imageVal = image.value.trim();

    if (resnameVal === "--Select Restaurant--") {
        setErrorMsg(resname, 'select restaurant name');
    } else {
        setSuccessMsg(resname);
    }
    if (dishnameVal === "") {
        setErrorMsg(dishname, 'dish name cannot be blank');
    } else {
        setSuccessMsg(dishname);
    }
    if (priceVal === "") {
        setErrorMsg(price, 'price cannot be blank');
    } else {
        setSuccessMsg(price);
    }
    if (aboutVal === "") {
        setErrorMsg(about, 'about cannot be blank');
    } else {
        setSuccessMsg(about);
    }

    successMsg();

}

function setErrorMsg(ele, errormsgs) {
    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    const span = formCon.querySelector('span');
    span.innerText = errormsgs;
    formInput.className = "form-control my-2 is-invalid";
    span.className = "invalid-feedback font-weight-bold";
}

function setSuccessMsg(ele) {
    const formGroup = ele.parentElement;
    const formInput = formGroup.querySelector('.form-control');
    formInput.className = "form-control my-2 success";
}
</script>