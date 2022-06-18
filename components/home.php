<?php
include 'database.php';

$sql = 'SELECT * FROM user';
$users = mysqli_query($connect, $sql);
?>
<div class="container home bd-grid">
    <div class="row">
        <div class="col">
            <h1 class="header-title">Chào mừng đến với website giới thiệu CV</h1>
        </div>
    </div>
    <div class="row">
        <?php
        if ($users) {
            foreach ($users as $user) {
        ?>
                <div class="col">
                    <div class="profile">
                        <h3><a href="index.php?page=home&id=<?php echo $user['id'] ?>"><?php echo $user['first_name'] . ' ' . $user['last_name'] ?></a></h3>
                        <div class="profile-img">
                            <a href="index.php?page=home&id=<?php echo $user['id'] ?>">
                                <img src="<?php echo $user['image'] ?>" alt="" style="margin: auto;">
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>