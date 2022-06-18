<?php
include "database.php";
if (isset($_POST['signin'])) {
    $check = mysqli_query($connect, 'select * from admin where username = "' . $_POST['username'] . '" and password = "' . $_POST['password'] . '"');
    if (!mysqli_num_rows($check)) {
        $err = '<p style="color:#f00;">Email or password may be wrong! please try again.</p>';
    } else {
        $_SESSION['profile_session'] = $_POST['username'];
        echo "<script>window.open('index.php?page=home','_self')</script>";
    }
}

?>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h1 class="mb-2">Đăng nhập</h1>
            <form action="" method="post">
                <?php if (!empty($err)) {
                            echo $err;
                        } ?>
                <div class="form-group mb-2">
                    <label>Tên đăng nhập:</label>
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" required>
                </div>
                <div class="form-group mb-2">
                    <label>Mật khẩu:</label>
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                </div>
                <div class="checkbox mb-2">
                    <label>
                        Chưa có tài khoản? <a href="index.php?page=signup">Đăng ký</a> |
                        <a href="index.php?page=forgot_password">Quên mật khẩu</a>
                    </label>
                </div>
                <button name="signin" type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>