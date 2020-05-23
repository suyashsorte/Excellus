<?php 
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();
?>
<!DOCTYPE html>
<?php $thisPage="aboutUs"; $fileName='about-us.php';?>

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
            <h1>About Us</h1>
            <div class="row">
                <div class="col-md-7 mb-3">
                    <p class="aboutUsTxt">At Excellus we strive to make your car researching and buying/leasing 
                        experience with you and only you, the customer, in mind. We have 4 brands and 8 vehicles to 
                        choose from, more than any other dealership in the area! Our pricing beats our competition 
                        in the city. And we value our customers – the relationship only begins when you drive the car 
                        out of the showroom. Our after sales support network will take care of you like no other. We 
                        also offer courtesy rides while you get your vehicle serviced/repaired and as a premium customer 
                        you can also get a temporary vehicle from us while your vehicle is serviced with us.


                    </p>
                </div>

                <div class="col-md-5 pl-lg-5">
                    <img class="w-100" alt="about us" src="assets/media/automobile02.jpg"/>
                </div>

            </div>

            <div class="row pt-5">
                <div class="col-md-5 order-2 order-md-1 mb-3">
                    <img class="w-100" alt="about us" src="assets/media/automobile03.jpg"/>
                </div>

                <div class="col-md-7 pl-lg-5 mb-3 order-1 order-md-2">
                    <p class="aboutUsTxt">What makes us different is how our salesmen are free of commission related 
                        biases while pitching the different brands we sell, and focus on getting the customer a vehicle 
                        that is tailored to exactly his/her needs. In addition to manufacturer warranty, we provide a 
                        dealership warranty on certain brands – so that you drive on town or on the highway with a total 
                        peace of mind!
                    </p>
                </div>

            </div>
            
        </main>

        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>

</html>