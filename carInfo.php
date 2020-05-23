<?php 
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();
?>
<!DOCTYPE html>
<?php $thisPage="newCar"; $fileName='carInfo.php';?>

<html lang="en">
    <head>
        <title>Excellus</title>
        <?php 
            include($path.'assets/inc/header-element.php'); 
        ?>

    </head>
    <body>
        <header>
            <?php 
                include($path.'assets/inc/header.php'); 

            ?>

        </header>

        <main class="container">
            <div class="px-3">
                <div class="row backLink mb-3">
                    <a class="align-middle" href="new-car.php">&nbsp;Back</a>
                </div>

                <div class="row">
                    <h1 class="pt-2">Car Information</h1>
                </div>
                    
            </div>
                

            <div class="row">
                <div class="col-lg-7">
                    <div id="carouselCar" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCar" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselCar" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <?php 
                                    $db = new Carinfo();
                                    if(!$db) {
                                        echo $db->lastErrorMsg();
                                    }
                                    
                                    $model = $_GET['Model'];

                                    $sql = "SELECT * from Carinfo WHERE Model=$model;";

                                    $ret1 = $db->query($sql);
                                    while($row = $ret1->fetchArray(SQLITE3_ASSOC) ) {?>

                            <img class="d-block w-100" src="<?php echo $row['Img1']; ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo $row['Img2']; ?>" alt="Second slide">
                            </div>

                            <?php }?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselCar" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCar" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 pt-4 pt-lg-2 pl-lg-4">
                    <?php 
                        $ret1 = $db->query($sql);
                        while($row = $ret1->fetchArray(SQLITE3_ASSOC) ) {?>
                            <h2><?php echo $row['Model']?>&nbsp;<span class='badge badge-primary'>new</span></h2>
                            <h5><?php echo $row['Price']?></h5>
                            <div class="row pt-3 pt-lg-4">
                                <div class="col-3">
                                    <p class="title-text">Engine: </p>
                                    <p class="title-text">Body: </p>
                                    <p class="title-text">Cylinder: </p>
                                    <p class="title-text">Lease: </p>
                                    <p class="title-text">Features: </p>
                                </div>
                                <div class="col-9">
                                    <p class="title-text"><?php echo $row['Engine'];?></p>
                                    <p class="title-text"><?php echo $row['Body'];?></p>
                                    <p class="title-text"><?php echo $row['Cyl'];?></p>
                                    <p class="title-text"><?php echo $row['Lease'];?></p>
                                    <p class="title-text"><?php echo $row['Features'];?></p>
                                </div>
                            </div>
                    
                    <a href="#" class="btn btn-primary my-3 w-100" onclick="myFunction()">Buy</a>
                    
                </div>
                <?php }?>

            </div>

        </main>

        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>

</html>