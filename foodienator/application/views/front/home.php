<div id="slides" class="carousel slide carousel-cus" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url().'public/uploads/restaurant/thumb/ruoupha.jpg';?>" alt="FriesBrgrImg">
            <div class="carousel-caption text-left">
                <h1 class="display-2">Bạn đang cần có dụng cụ pha chế ?</h1>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-outline-light btn-lg">Đặt hàng ngay</a>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-primary btn-lg">Xem danh mục</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url().'public/uploads/restaurant/thumb/coc.jpg';?>" alt="Spaghetti">
            <div class="carousel-caption text-right">
                <h1 class="display-2">Bạn đang cần có dụng cụ pha chế ?</h1>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-outline-light btn-lg">Đặt hàng ngay</a>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-primary btn-lg">Xem danh mục</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url().'public/uploads/restaurant/thumb/Bartesian-Cocktail-Maker-.webp';?>" alt="corn">
            <div class="carousel-caption text-right">
                <h1 class="display-2">Bạn đang cần có dụng cụ pha chế ?</h1>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-outline-light btn-lg">Đặt hàng ngay</a>
                <a href="<?php echo base_url().'restaurant/index'?>" class="btn btn-primary btn-lg">Xem danh mục</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Chỉ với 3 bước đơn giản</h1>
        </div>
        <hr>
        <div class="col-12">
            <p class="lead">Các khách hàng thành viên khi đặt hàng tại Group 7 Bartender Shop sẽ thao tác một cách đơn giản và nhanh chóng !</p>
        </div>
    </div>
</div>
<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fas fa-utensils"></i>
            <h3>Chọn loại sản phẩm</h3>
            <p>Bước đầu tiên hãy chọn loại sản phẩm có chứa sản phẩm bạn đang tìm kiếm!</p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <i class="fas fa-bullseye"></i>
            <h3>Chọn sản phẩm</h3>
            <p>Đối với mỗi loại sản phẩm sẽ có các sản phẩm tương ứng. Hãy lựa chọn thật kĩ nhé!</p>
        </div>
        <div class="col-sm-12 col-md-4">
        <i class="fas fa-clipboard-check"></i>
            <h3>Đặt và giao nhận hàng</h3>
            <p>Sau khi chọn sản phẩm, hãy đặt hàng và chúng tôi sẽ giao hàng đến bạn một cách nhanh chóng!</p>
        </div>
    </div>
    <hr class="my-4">
</div>
<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Các sản phẩm nổi bật</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container-fluid padding dish-card">
    <div class="row">
        <?php if(!empty($dishesh)) { ?>
        <?php foreach($dishesh as $dish) { ?>
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
            <div class="card mb-4 shadow-sm">
                <?php $image = $dish['anh'];?>
                <img class="card-img-top" src="<?php echo base_url().'public/uploads/dishesh/thumb/'.$image; ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title"><?php echo $dish['tensp']; ?></h4>
                        <h4 class="text-muted"><b>$<?php echo $dish['giatien']; ?></b></h4>
                    </div>
                    <p class="card-text"><?php echo $dish['thongtinsp']; ?></p>
                    <a href="<?php echo base_url().'Dish/addToCart/'.$dish['masp']; ?>"></a>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } else { ?>
        <div class="jumbotron">
            <h1>No records found</h1>
        </div>
        <?php } ?>
    </div>
    <hr class="my-4">
</div>
<div class="container-fluid padding">
    <div class="row text-center padding">
        <div class="col-12">
            <h2>Liên hệ với chúng tôi</h2>
        </div>
        <div class="col-12 social padding">
            <a href="https://www.facebook.com/admin.leleg/"><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-google-plus-g"></i></a>
            <a href="https://www.instagram.com/vthony1030/"><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
<script>
const form = document.getElementById('myForm');
const userName = document.getElementById('name');
const email = document.getElementById('email');
const subject = document.getElementById('subject');
const message = document.getElementById('message');

form.addEventListener('submit', (event) => {
    event.preventDefault();
    validate();
})

const isEmail = (emailVal) => {
    var re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(emailVal)) {
        return "fail";
    }
}

const sendData = (sRate, count) => {
    if (sRate === count) {
        event.currentTarget.submit();
    }
}

const successMsg = () => {
    let formCon = document.getElementsByClassName('form-control');
    var count = formCon.length - 1;
    for (var i = 0; i < formCon.length; i++) {
        if (formCon[i].className === "form-control success") {
            var sRate = 0 + i;
            sendData(sRate, count);
        } else {
            return false;
        }
    }
}

const validate = () => {
    const userNameVal = userName.value.trim();
    const emailVal = email.value.trim();
    const subjectVal = subject.value.trim();
    const messageVal = message.value.trim();

    //username validation
    if (userNameVal === "") {
        setErrorMsg(userName, 'name cannot be blank');
    } else if (!isNaN(userNameVal)) {
        setErrorMsg(userName, 'only characters are allowed');
    } else {
        setSuccessMsg(userName);
    }

    //email validation
    if (emailVal === "") {
        setErrorMsg(email, 'email cannot be blank');
    } else if (isEmail(emailVal) === "fail") {
        setErrorMsg(email, 'enter valid email only');
    } else {
        setSuccessMsg(email);
    }

    //subject can not
    if (subjectVal === "") {
        setErrorMsg(subject, 'subject cannot be blank');
    } else {
        setSuccessMsg(subject);
    }

    //message validation
    if (messageVal === "") {
        setErrorMsg(message, 'message cannot be blank');
    } else {
        setSuccessMsg(message);
    }

    successMsg();
}

function setErrorMsg(ele, msg) {

    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    const span = formCon.querySelector('span');
    span.innerText = msg;
    formInput.className = "form-control is-invalid";
    span.className = "invalid-feedback font-weight-bold"
}

function setSuccessMsg(ele) {
    const formCon = ele.parentElement;
    const formInput = formCon.querySelector('.form-control');
    formInput.className = "form-control success";
}
</script>