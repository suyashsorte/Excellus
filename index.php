<?php 
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();
?>

<!DOCTYPE html>
<?php $thisPage="Home"; $fileName='index.php';?>
<html lang="en">
    <head>
        <title>Excellus</title>
        <?php include($path.'assets/inc/header-element.php');?>

    </head>
    <body>
        <header id="homeHd">
            <?php 
                include($path.'assets/inc/header.php'); 
            ?>

            <video playsinline="playsinline" autoplay muted loop id="myVideo">
                <source src="assets/media/Driving-a-Mercedes.mp4" type="video/mp4">
            </video>
            <div class="container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white" id="homeBtn">
                        <p>WE&nbsp;&nbsp;SELL&nbsp;&nbsp;THE&nbsp;&nbsp;CAR&nbsp;&nbsp;YOU&nbsp;&nbsp;LOVE</p>
                        <a class="btn btn-warning" href="new-car.php" role="button">Explore More</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="container-fluid h-100">
        </main>

        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>

</html>