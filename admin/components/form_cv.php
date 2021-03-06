<?php
include 'database.php';
if (isset($_POST['add-cv'])) {

    $required = array(
        'firstname', 'lastname', 'email', 'phone', 'address',
        'exp-employer', 'exp-title', 'exp-description', 'school-name',
        'field-of-study', 'skill-1', 'skill-2', 'skill-3'
    );
    $error = false;

    if(!$_FILES['image'] || !$_FILES['image']['size'] || $_FILES['image']['error']) {
        $error = true;
    }

    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }
    if (!$error) {
        $file_tmp= $_FILES['image']['tmp_name'];
        $data = file_get_contents($$file_tmp);

        $base64 = 'data:image/png;base64,' . base64_encode($data) ;

        $sql_user = mysqli_query(
            $connect,
            'INSERT INTO user (first_name, last_name, email, phone, address, image)
        VALUES ("' . $_POST['firstname'] . '", "' . $_POST['lastname'] . '", "' . $_POST['email'] . '", "' . $_POST['phone'] . '", "' . $_POST['address'] . '", "'.$base64.'" )'
        );
        if ($sql_user) {
            $user = mysqli_fetch_array(mysqli_query($connect, 'SELECT * FROM user ORDER BY id DESC LIMIT 1'));
            $user_id = $user['id'];

            $sql_exp = 'INSERT INTO experience (user_id, employer, title, description) 
                VALUES ("' . $user_id . '","' . $_POST['exp-employer'] . '", "' . $_POST['exp-title'] . '", "' . $_POST['exp-description'] . '")';
            $sql_edu = 'INSERT INTO education (user_id, school_name, field_of_study)
                VALUES ("' . $user_id . '", "' . $_POST['school-name'] . '", "' . $_POST['field-of-study'] . '")';
            $sql_skill = 'INSERT INTO skills (user_id, name, percent) VALUES
                ("' . $user_id . '", "' . $_POST['skill-1'] . '", "' . $_POST['level-1'] . '"),
                ("' . $user_id . '", "' . $_POST['skill-2'] . '", "' . $_POST['level-2'] . '"),
                ("' . $user_id . '", "' . $_POST['skill-3'] . '", "' . $_POST['level-3'] . '")';
            if (mysqli_query($connect, $sql_skill) && mysqli_query($connect, $sql_edu) && mysqli_query($connect, $sql_exp)) {
                echo '<script>
                        alert("Th??m cv th??nh c??ng")
                        window.open("index.php?page=home","_self")
                    </script>';
            }
        }
    } else {
        echo '<script>alert("B???n c???n nh???p ?????y ????? th??ng tin")</script>';
    }
}
?>

<form class="container" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-6">
            <label for="image" class="form-label">???nh c???a b???n</label>
            <input type="file" name="image" id="avatar" class="form-control" accept="image/*">
        </div>
        <div class="col">
            <img src="" alt="" id="img">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="firstname" class="form-label">H???</label>
            <input require class="form-control" type="text" name="firstname" placeholder="VD: Nguy???n V??n">
        </div>
        <div class="col-6">
            <label for="lastname" class="form-label">T??n</label>
            <input require class="form-control" type="text" name="lastname" placeholder="VD: Quy???t">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="email" class="form-label">Email</label>
            <input require type="email" class="form-control" name="email" placeholder="VD: quyet@example.com">
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">S??? ??i???n tho???i</label>
            <input require type="text" class="form-control" name="phone" placeholder="VD: 033-793-1178">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="address" class="form-label">?????a ch???</label>
            <input require type="text" class="form-control" name="address" placeholder="VD: 29T1 Ho??ng ?????o Th??y">
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>Kinh nghi???m</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="exp-employer" class="form-label">Nh?? tuy???n d???ng</label>
            <input require type="text" class="form-control" name="exp-employer" placeholder="VD: DYNO">
        </div>
        <div class="col-6">
            <label for="exp-title" class="form-label">Ch???c v??? / V??? tr??</label>
            <input require type="text" class="form-control" name="exp-title" placeholder="VD: Backend Developer">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="exp-description" class="form-label">M?? t??? c??ng vi???c</label>
            <textarea name="exp-description" id="editor" class="form-control" rows="30"></textarea>
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>H???c v???n</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="school-name" class="form-label">Tr?????ng</label>
            <input require type="text" class="form-control" name="school-name" placeholder="VD: ?????i h???c Th???y L???i">
        </div>
        <div class="col-6">
            <label for="field-of-study" class="form-label">Chuy??n ng??nh</label>
            <input require type="text" class="form-control" name="field-of-study" placeholder="VD: C??ng ngh??? th??ng tin">
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <h3>C??c k??? n??ng</h3>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="skill-1" class="form-label">T??n k??? n??ng</label>
            <input require type="text" class="form-control" name="skill-1" placeholder="VD: Javascript">
        </div>
        <div class="col-6">
            <label for="skill-level" class="form-label">Level</label>
            <select name="level-1" class="form-select" aria-label="skill-level">
                <option value="0" selected>Level</option>
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
            <label for="skill-2" class="form-label">T??n k??? n??ng</label>
            <input require type="text" class="form-control" name="skill-2" placeholder="VD: Javascript">
        </div>
        <div class="col-6">
            <label for="skill-level" class="form-label">Level</label>
            <select name="level-2" class="form-select" aria-label="skill-level">
                <option value="0" selected>Level</option>
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
            <label for="skill-3" class="form-label">T??n k??? n??ng</label>
            <input require type="text" class="form-control" name="skill-3" placeholder="VD: Javascript">
        </div>
        <div class="col-6">
            <label for="skill-level" class="form-label">Level</label>
            <select name="level-3" class="form-select" aria-label="skill-level">
                <option value="0" selected>Level</option>
                <option value="20">20%</option>
                <option value="40">40%</option>
                <option value="60">60%</option>
                <option value="80">80%</option>
                <option value="100">100%</option>
            </select>
        </div>
    </div>
    <div class="btn-submit">
        <button type="submit" name="add-cv" class="btn btn-primary btn-lg w-25">Th??m</button>

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