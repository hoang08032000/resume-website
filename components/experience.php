<?php
include 'database.php';

$user_id = $_GET['id'];

$sql = 'SELECT * FROM experience WHERE user_id = "'.$user_id.'"';
$exp = mysqli_query($connect, $sql);

?>

<section class="Experience section" id="experience">
    <h2 class="section-title">Kinh nghiệm làm việc</h2>

    <div class="experience__container bd-grid">

        <div>
            <?php 
            if(mysqli_num_rows($exp) > 0) {
                foreach($exp as $row){
            ?>
            
            <div>
                <h2 class="experience__sign">- Công ty: <?php echo $row['employer'] ?></h2>
                <h5>Vị trí: <?php echo $row['title'] ?></h5>
                <div style="padding: 0 10px;">
                    <?php echo $row['description'] ?>
                </div>
            </div>
            <?php        
                }
            }
            ?>
        </div>
        <div>
            <img src="assets/code.png" alt="experience">
        </div>

    </div>
</section>