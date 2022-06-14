<?php
// include "connect_db.php";
if (isset($_POST['signup'])) {
    $check = mysqli_query($connect, 'select * from user where user.username = "' . $_POST['username'] . '"');
    // while ($row = mysqli_fetch_assoc($check)) {
    // echo $row['username'];
    if (mysqli_num_rows($check) > 0) {
        $err = '<p style="color:#f00;">Tên đang nhập đã tồn tại. Vui lòng thử lại</p>';
    } else if ($_POST['password'] != $_POST['confirm_password']) {
        $err = '<p style="color:#f00;">Mật khẩu không khớp. Vui lòng thử lại</p>';
    } else {
        $sql = 'insert into user (username, password, fullname) values(
                "' . $_POST['username'] . '",
                "' . $_POST['password'] . '",
                "' . $_POST['fullname'] . '"
            )';
        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('Registration successfull! Login now?')</script>";
            // echo "<script>window.open('index.php?page=signin','_self')</script>";
        } else {
            $err = '<p style="color:#f00;">Đã có lỗi xảy ra. Vui lòng thử lại</p>';
        }
    }
    // }
}

?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1 class="mb-2">Đăng ký</h1>
            <form action="" method="post">
                <!-- <?php if (!empty($err)) {
                            echo $err;
                        } ?> -->
                <div class="form-group mb-2">
                    <label>Tên đăng nhập:</label>
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" required>
                </div>
                <div class="form-group mb-2">
                    <label>Họ và tên:</label>
                    <input type="text" class="form-control" placeholder="Họ và tên" name="fullname" required>
                </div>
                <div class="form-group mb-2">
                    <label>Mật khẩu:</label>
                    <input type="password" class="form-control" placeholder="Mật khâu" name="password" required>
                </div>
                <div class="form-group mb-2">
                    <label>Xác nhận mật khẩu:</label>
                    <input type="password" class="form-control" placeholder="Xác nhận mật khẩu" name="confirm_password" required>
                </div>
                <div class="checkbox mb-2">
                    <label>Đã có tài khoản? <a href="index.php?page=signin">Đăng nhập</a>
                </div>
                <button name="signup" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>