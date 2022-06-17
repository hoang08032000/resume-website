<?php
include 'database.php';

$list_cv = mysqli_query(
    $connect,
    'SELECT * FROM `user` ORDER BY id DESC'
);

?>
<div class="container form-user">
    <div class="row mb-5">
        <div class="col-4"></div>
        <div class="col-4">
            <h2 class="">Danh sách hồ sơ</h2>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row border-bottom mb-2">
        <div class="col-1">
            <h4>ID</h4>
        </div>
        <div class="col">
            <h4>Hồ sơ</h4>
        </div>
        <div class="col-4">
            <h4>Hành động</h4>
        </div>
    </div>
    <?php
    if (mysqli_num_rows($list_cv) > 0) {
        foreach ($list_cv as $row) {
    ?>
            <div class="row mb-3">
                <div class="col-1">
                    <h5><?php echo $row['id'] ?></h5>
                </div>
                <div class="col"><?php echo $row['first_name'] . ' ' . $row['last_name'] ?></div>
                <div class="col-4">
                    <button type="button" class="btn btn-primary me-3"><a href="<?php echo 'index.php?page=edit-cv&id=' . $row['id']; ?>">Sửa</a></button>
                    <button type="button" class="btn btn-danger"><a href="<?php echo 'index.php?page=delete&id=' . $row['id']; ?>">Xóa</a></button>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } else {
    ?>
    <div class="row mb-3">
        <div class="col">
            <p>Danh sách CV trống</p>
        </div>
    </div>
    <?php
    }
    ?>
</div>