<?php
include 'database.php';

$user_id = $_GET['id'];

$sql_user = 'SELECT * FROM user WHERE user.id = "' . $user_id . '"';
$sql_exp = 'SELECT * FROM experience WHERE experience.user_id = "' . $user_id . '"';
$sql_edu = 'SELECT * FROM education WHERE education.user_id = "' . $user_id . '"';
$sql_skill = 'SELECT * FROM skills WHERE skills.user_id = "' . $user_id . '" ORDER BY id DESC LIMIT 3' ;

$cv_user = mysqli_query($connect, $sql_user);
$cv_exp = mysqli_query($connect, $sql_exp);
$cv_edu = mysqli_query($connect, $sql_edu);
$cv_skill = mysqli_query($connect, $sql_skill);
if (mysqli_num_rows($cv_user) && mysqli_num_rows($cv_exp) && mysqli_num_rows($cv_edu) && mysqli_num_rows($cv_skill)) {

?>
    <form class="container" method="POST" enctype="multipart/form-data">
        <?php
        foreach ($cv_user as $row) {
            $base64 = $row['image'];
        ?>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="image" class="form-label">Ảnh của bạn</label>
                    <input type="file" name="image" id="avatar" class="form-control">
                </div>
                <div class="col">
                    <img src="<?php echo $row['image']; ?>" alt="avatar" id="img">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="firstname" class="form-label">Họ</label>

                    <input require class="form-control" type="text" name="firstname" placeholder="VD: Nguyễn Văn" value="<?php $_POST['firstname'] = $row['first_name'];
                                                                                                                            echo $row['first_name'] ?>">
                </div>
                <div class="col-6">
                    <label for="lastname" class="form-label">Tên</label>
                    <input require class="form-control" type="text" name="lastname" placeholder="VD: Quyết" value="<?php $_POST['lastname'] = $row['last_name'];
                                                                                                                    echo $row['last_name'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input require type="email" class="form-control" name="email" placeholder="VD: quyet@example.com" value="<?php $_POST['email'] = $row['email'];
                                                                                                                                echo $row['email'] ?>">
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input require type="text" class="form-control" name="phone" placeholder="VD: 033-793-1178" value="<?php $_POST['phone'] = $row['phone'];
                                                                                                                        echo $row['phone'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input require type="text" class="form-control" name="address" placeholder="VD: 29T1 Hoàng Đạo Thúy" value="<?php $_POST['address'] = $row['address'];
                                                                                                                                echo $row['address'] ?>">
                </div>
            </div>
        <?php
        }
        foreach ($cv_exp as $row) {
        ?>
            <div class="row mb-1 mt-3">
                <div class="col">
                    <h3>Kinh nghiệm</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="exp-employer" class="form-label">Nhà tuyển dụng</label>
                    <input require type="text" class="form-control" name="exp-employer" placeholder="VD: DYNO" value="<?php $_POST['exp-employer'] = $row['employer'];
                                                                                                                        echo $row['employer'] ?>">
                </div>
                <div class="col-6">
                    <label for="exp-title" class="form-label">Chức vụ / Vị trí</label>
                    <input require type="text" class="form-control" name="exp-title" placeholder="VD: Backend Developer" value="<?php $_POST['exp-title'] = $row['title'];
                                                                                                                                echo $row['title'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="exp-description" class="form-label">Mô tả công việc</label>
                    <textarea name="exp-description"  class="form-control editor"><?php $_POST['exp-description'] = $row['description'];
                                                                                                echo $row['description'] ?></textarea>
                </div>
            </div>
        <?php
        }
        foreach ($cv_edu as $row) {
        ?>
            <div class="row mb-1 mt-3">
                <div class="col">
                    <h3>Học vấn</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="school-name" class="form-label">Trường</label>
                    <input require type="text" class="form-control" name="school-name" placeholder="VD: Đại học Thủy Lợi" value="<?php $_POST['school-name'] = $row['school_name'];
                                                                                                                                    echo $row['school_name'] ?>">
                </div>
                <div class="col-6">
                    <label for="field-of-study" class="form-label">Chuyên ngành</label>
                    <input require type="text" class="form-control" name="field-of-study" placeholder="VD: Công nghệ thông tin" value="<?php $_POST['field-of-study'] = $row['field_of_study'];
                                                                                                                                        echo $row['field_of_study'] ?>">
                </div>
            </div>
        <?php
        }
        $index = 1;
        foreach ($cv_skill as $row) {
        ?>
            <div class="row mb-1 mt-3">
                <div class="col">
                    <h3>Các kỹ năng</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="skill-<?php echo $index ?>" class="form-label">Tên kỹ năng</label>
                    <input require type="text" class="form-control" name="skill-<?php echo $index ?>" placeholder="VD: Javascript" value="<?php $_POST['skill-' . $index] = $row['name'];
                                                                                                                                            echo $row['name'] ?>">
                </div>
                <div class="col-6">
                    <label for="skill-level" class="form-label">Level</label>
                    <select name="level-<?php $index ?>" class="form-select" aria-label="skill-level">
                        <?php
                        $_POST['level-' . $index] = $row['percent'];
                        for ($level = 0; $level <= 5; $level++) {
                            if ($level * 20 == $row['percent']) {
                                echo '<option value="' . $level * 20 . '" selected >' . $level * 20 . '</option>';
                            } else {
                                echo '<option value="' . $level * 20 . '">' . $level * 20 . '%</option>';
                            }
                        } ?>
                    </select>
                </div>
            </div>
    <?php
            $index++;
        }
    }
    ?>
    <div class="btn-submit">
        <button type="submit" name="edit-cv" class="btn btn-primary btn-lg w-25">Thêm</button>

    </div>
    </form>

    <?php
    if (isset($_POST['edit-cv'])) {

        $required = array(
            'firstname', 'lastname', 'email', 'phone', 'address',
            'exp-employer', 'exp-title', 'exp-description', 'school-name',
            'field-of-study', 'skill-1', 'skill-2', 'skill-3'
        );
        $error = false;
        if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
            $file_tmp = $_FILES['image']['tmp_name'];
            $data = file_get_contents($file_tmp);
            $base64 = 'data:image/png;base64,' . base64_encode($data);
        }

        foreach ($required as $field) {
            if (empty($_POST[$field])) {
                $error = true;
            }
        }

        if (!$error) {

            $sql_user = mysqli_query(
                $connect,
                'UPDATE user 
                SET first_name = "' . $_POST['firstname'] . '", last_name = "' . $_POST['lastname'] . '", 
                    email = "' . $_POST['email'] . '", phone = "' . $_POST['phone'] . '", 
                    address = "' . $_POST['address'] . '", image = "' . $base64 . '"
                WHERE id = "'.$user_id.'"'
            );


            $sql_exp = 'UPDATE experience 
                    SET employer = "' . $_POST['exp-employer'] . '", title = "' . $_POST['exp-title'] . '", description =  "' . $_POST['exp-description'] . '" 
                    WHERE user_id = "' . $user_id . '"';
            $sql_edu = 'UPDATE education SET  school_name = "' . $_POST['school-name'] . '", field_of_study = "' . $_POST['field-of-study'] . '"
                    WHERE user_id = "' . $user_id . '"';
            $sql_skill = 'INSERT INTO skills (user_id, name, percent) VALUES
                    ("' . $user_id . '", "' . $_POST['skill-1'] . '", "' . $_POST['level-1'] . '"),
                    ("' . $user_id . '", "' . $_POST['skill-2'] . '", "' . $_POST['level-2'] . '"),
                    ("' . $user_id . '", "' . $_POST['skill-3'] . '", "' . $_POST['level-3'] . '")';
            if (mysqli_query($connect, $sql_skill) && mysqli_query($connect, $sql_edu) && mysqli_query($connect, $sql_exp)) {
                echo '<script>
                        alert("Sửả thành công!")
                        window.open("index.php?page=home","_self")
                        </script>';
            }
        } else {
            echo '<script>alert("Bạn cần nhập đầy đủ thông tin")</script>';
        }
    }
    ?>

    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });

        const avatar = document.getElementById('avatar')
        const img = document.getElementById('img')
        avatar.addEventListener('change', (e) => {
            var file = avatar.files[0]
            console.log(file)
            const reader = new FileReader()

            reader.addEventListener("load", function() {
                // convert image file to base64 string
                img.src = reader.result
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        })
    </script>