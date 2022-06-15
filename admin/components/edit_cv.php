<?php 
include 'database.php';

$user_id = $_GET['id'];

$sql_user = 'SELECT * FROM user WHERE user.id = "'.$user_id.'"';
$sql_exp = 'SELECT * FROM experience WHERE experience.user_id = "'.$user_id.'"';
$sql_edu = 'SELECT * FROM education WHERE education.user_id = "'.$user_id.'"';
$sql_skill = 'SELECT * FROM skills WHERE skills.user_id = "'.$user_id.'"';

$cv_user = mysqli_query($connect, $sql_user);
$cv_exp = mysqli_query($connect, $sql_exp);
$cv_edu = mysqli_query($connect, $sql_edu);
$cv_skill = mysqli_query($connect, $sql_skill);
if(mysqli_num_rows($cv_user) && mysqli_num_rows($cv_exp)&& mysqli_num_rows($cv_edu) && mysqli_num_rows($cv_skill)) {

?>
<form class="container" method="POST">
    <?php 
        foreach($cv_user as $row){
    ?>
    <div class="row mb-3">
        <div class="col-6">
            <label for="image" class="form-label">Ảnh của bạn</label>
            <input type="file" name="image" id="avatar" class="form-control" >
        </div>
        <div class="col">
            <img src="" alt="" id="img">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="firstname" class="form-label">Họ</label>
            
            <input require class="form-control" type="text" name="firstname" placeholder="VD: Nguyễn Văn" value="<?php echo $row['first_name'] ?>">
        </div>
        <div class="col-6">
            <label for="lastname" class="form-label">Tên</label>
            <input require class="form-control" type="text" name="lastname" placeholder="VD: Quyết" value="<?php echo $row['last_name'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <input require type="email" class="form-control" name="email" placeholder="VD: quyet@example.com" value="<?php echo $row['email'] ?>">
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input require type="text" class="form-control" name="phone" placeholder="VD: 033-793-1178" value="<?php echo $row['phone'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="address" class="form-label">Địa chỉ</label>
            <input require type="text" class="form-control" name="address" placeholder="VD: 29T1 Hoàng Đạo Thúy" value="<?php echo $row['address'] ?>">
        </div>
    </div>
    <?php 
    }
    foreach($cv_exp as $row){
    ?>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Kinh nghiệm</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="exp-employer" class="form-label">Nhà tuyển dụng</label>
            <input require type="text" class="form-control" name="exp-employer" placeholder="VD: DYNO" value="<?php echo $row['employer'] ?>">
        </div>
        <div class="col-6">
            <label for="exp-title" class="form-label">Chức vụ / Vị trí</label>
            <input require type="text" class="form-control" name="exp-title" placeholder="VD: Backend Developer" value="<?php echo $row['title'] ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="exp-description" class="form-label">Mô tả công việc</label>
            <textarea name="exp-description" id="editor" class="form-control" rows="30" ><?php echo $row['description'] ?></textarea>
        </div>
    </div>
    <?php 
    } 
    foreach($cv_edu as $row){
    ?>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Học vấn</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="school-name" class="form-label">Trường</label>
            <input require type="text" class="form-control" name="school-name" placeholder="VD: Đại học Thủy Lợi" value="<?php echo $row['school_name'] ?>">
        </div>
        <div class="col-6">
            <label for="field-of-study" class="form-label">Chuyên ngành</label>
            <input require type="text" class="form-control" name="field-of-study" placeholder="VD: Công nghệ thông tin" value="<?php echo $row['field_of_study'] ?>">
        </div>
    </div>
    <?php 
    }
    $index = 0;
    foreach($cv_skill as $row){
    ?>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Các kỹ năng</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="skill-<?php echo $index ?>" class="form-label">Tên kỹ năng</label>
            <input require type="text" class="form-control" name="skill-<?php echo $index ?>" placeholder="VD: Javascript" value="<?php echo $row['name'] ?>">
        </div>
        <div class="col-6">
            <label for="skill-level" class="form-label">Level</label>
            <select name="level-1" class="form-select" aria-label="skill-level">
                <?php for($level=0; $level<=5 ; $level++){ 
                    if($level*20 == $row['percent']) {
                        echo '<option value="' .$level*20 . '" selected>' . $level*20 . '</option>';
                    } else {
                        echo '<option value="' . $level*20 . '">' . $level*20 . '%</option>';
                    }
                }?>
                <!-- <option value="0">Level</option>
                <option value="20">20%</option>
                <option value="40">40%</option>
                <option value="60">60%</option>
                <option value="80">80%</option>
                <option value="100">100%</option>
                 -->
                
            </select>
        </div>
    </div>
    <?php 
    $index++;
    }
}
    ?>
    <div class="btn-submit">
        <button type="submit" name="add-cv" class="btn btn-primary btn-lg w-25">Thêm</button>

    </div>
</form>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    const avatar = document.getElementById('avatar')
    const img = document.getElementById('img')
    const img_base64 = document.getElementById('img-base64')
    avatar.addEventListener('change', (e) => {
        var file = avatar.files[0]
        console.log(file)
        const reader = new FileReader()

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            img.src = reader.result
            img_base64.value = reader.result
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    })
</script>


