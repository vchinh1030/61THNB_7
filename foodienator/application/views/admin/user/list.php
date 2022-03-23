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
                <h2>Khách hàng thành viên</h2>
            </div>
            <input class="form-control mb-3" id="myInput" type="text" placeholder="Tìm kiếm..." style="width:50%;">
        </div>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tài khoản</th>
                        <th>Họ và tên đệm</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php if(!empty($users)) {?>
                    <?php foreach($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['manguoidung']; ?></td>
                        <td><?php echo $user['tendangnhap']; ?></td>
                        <td><?php echo $user['ho_tendem']; ?></td>
                        <td><?php echo $user['tenchinh']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['sdt']; ?></td>
                        <td><?php echo $user['diachi']; ?></td>
                        <td>
                            <a href="javascript:void(0);" onclick="deleteUser(<?php echo $user['manguoidung']; ?>)"
                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>   Delete</a>
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
<script type="text/javascript">
function deleteUser(id) {
    if (confirm("Are you sure you want to delete user?")) {
        window.location.href = '<?php echo base_url().'admin/user/delete/';?>' + id;
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