<?php
include 'database.php';
if (isset($_POST['add-cv'])) {
    $sql_user = mysqli_query(
        $connect,
        'INSERT INTO user (first_name, last_name, email, phone, address)
        VALUES ("' . $_POST['firstname'] . '", "' . $_POST['lastname'] . '", "' . $_POST['email'] . '", "' . $_POST['phone'] . '", "' . $_POST['address'] . '" )'
    );
    if ($sql_user == TRUE) {
        $user = mysqli_query($connect, 'SELECT * FROM user ORDER BY id DESC LIMIT 1');
        // foreach ($user as &$u) {
        //     echo $u['id'];
        // }
        while($row = mysqli_fetch_array($user)) {
            $user_id = $row['id'];
        }
    }
}
?>

<form class="container" method="POST">
    <div class="row mb-3">
        <div class="col-6">
            <label for="firstname" class="form-label">Họ</label>
            <input class="form-control" type="text" name="firstname" placeholder="VD: Nguyễn Văn">
        </div>
        <div class="col-6">
            <label for="lastname" class="form-label">Tên</label>
            <input class="form-control" type="text" name="lastname" placeholder="VD: Quyết">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="VD: quyet@example.com">
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" placeholder="VD: 033-793-1178">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" placeholder="VD: 29T1 Hoàng Đạo Thúy">
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Kinh nghiệm</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="experience-employer" class="form-label">Nhà tuyển dụng</label>
            <input type="text" class="form-control" name="experience-employer" placeholder="VD: DYNO">
        </div>
        <div class="col-6">
            <label for="experience-title" class="form-label">Chức vụ / Vị trí</label>
            <input type="text" class="form-control" name="experience-title" placeholder="VD: Backend Developer">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="job-description" class="form-label">Mô tả công việc</label>
            <textarea name="job-description" id="editor" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Học vấn</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="school-name" class="form-label">Trường</label>
            <input type="text" class="form-control" name="school-name" placeholder="VD: Đại học Thủy Lợi">
        </div>
        <div class="col-6">
            <label for="field-of-study" class="form-label">Chuyên ngành</label>
            <input type="text" class="form-control" name="field-of-study" placeholder="VD: Công nghệ thông tin">
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Các kỹ năng</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="skill" class="form-label">Tên kỹ năng</label>
            <input type="text" class="form-control" name="skill" placeholder="VD: Javascript">
        </div>
        <div class="col-6">
            <label for="skill" class="form-label">Level</label>
            <select class="form-select" aria-label="skill">
                <option selected>Level</option>
                <option value="20">20%</option>
                <option value="40">40%</option>
                <option value="60">60%</option>
                <option value="80">80%</option>
                <option value="100">100%</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="skill" class="form-label">Tên kỹ năng</label>
            <input type="text" class="form-control" name="skill" placeholder="VD: Javascript">
        </div>
        <div class="col-6">
            <label for="skill" class="form-label">Level</label>
            <select class="form-select" aria-label="skill">
                <option selected>Level</option>
                <option value="20">20%</option>
                <option value="40">40%</option>
                <option value="60">60%</option>
                <option value="80">80%</option>
                <option value="100">100%</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="skill" class="form-label">Tên kỹ năng</label>
            <input type="text" class="form-control" name="skill" placeholder="VD: Javascript">
        </div>
        <div class="col-6">
            <label for="skill" class="form-label">Level</label>
            <select class="form-select" aria-label="skill">
                <option selected>Level</option>
                <option value="20">20%</option>
                <option value="40">40%</option>
                <option value="60">60%</option>
                <option value="80">80%</option>
                <option value="100">100%</option>
            </select>
        </div>
    </div>
    <div class="btn-submit">
        <button type="submit" name="add-cv" class="btn btn-primary btn-lg w-25">Thêm</button>

    </div>
</form>