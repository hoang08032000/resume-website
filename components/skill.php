<?php
include 'database.php';

$user_id = $_GET['id'];

$sql = 'SELECT * FROM skills WHERE user_id = "' . $user_id . '" ORDER BY id DESC limit 3';
$skills = mysqli_query($connect, $sql);

?>

<section class="skills section" id="skills">
    <h2 class="section-title">Các kỹ năng</h2>

    <div class="skills__container bd-grid">
        <div>
            <?php
            if (mysqli_num_rows($skills) > 0) {
                foreach ($skills as $row) {
            ?>
                    <div class="skills__data">
                        <div class="skills__names">
                            <!-- <i class='bx bxl-html5 skills__icon'></i> -->
                            <span class="skills__name"><?php echo $row['name'] ?></span>
                        </div>
                        <div class="skills__bar" style="width: <?php echo $row['percent'] . '%'?>;">

                        </div>
                        <div>
                            <span class="skills__percentage"><?php echo $row['percent'] ?>%</span>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>

        <div>
            <img src="assets/skills.jpg" alt="" class="skills__img">
        </div>
    </div>
</section>