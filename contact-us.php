<?php 
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();

    if(!empty($_POST['search']))
        {$_SESSION['search'] = $_POST['search'];}
?>
<!DOCTYPE html>
<?php $thisPage="contactUs"; $fileName='contact-us.php';?>

<html lang="en">
    <head>
        <title>Contact Us</title>
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
            <h1>Contact Information</h1>

            <div class="row mt-3">
                <div class="row col-md-5 mb-3 justify-content-md-center">
                    <div class="font-weight-bold col-4">
                        <p>Phone: </p>
                        <p>Tax: </p>
                        <p>Address: </p>
                    </div>

                    <div class=" col-8 px-0">
                        <p>392-194-9298</p>
                        <p>530-844-2744</p>
                        <p>3532 Della Fork Suite 823<br/>Lake Chasity, MD</p>
                    </div>
                </div>

                <div class="col-md-7 pl-lg-5" id="map"></div>

            </div>

            <h1 class="mt-0 mx-0 pt-5">Get in touch with us</h1>

                <form id="contact-form" name="contact-form" method="POST">
                    <div class="form-group row col-md-6 mx-0 px-0">
                        <input type="text" name="contactName" class="form-control mx-0 w-100" id="nameInput" placeholder="Name" required>
                    </div>

                    <div class="form-group row col-md-6 mx-0 px-0">
                        <input type="text" name="subject" class="form-control mx-0 w-100" id="subjectInput" placeholder="Subject" required>
                    </div>

                    <div class="form-group row col-md-6 mx-0 px-0">
                        <textarea name="contactMsg" class="form-control mx-0 w-100" id="msgInput" rows="4" placeholder="How can we help you?" required></textarea>
                    </div>

                    <div class="form-group row col-md-6 mx-0 px-0">
                        <a class="btn btn-primary w-100" id="sendEmail" href="mailto:anyi.dai.law@gmail.com">Send message to us</a>
                    </div>

                </form>
  
        </main>

        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>

        <script>
            $(function() {
                $('#sendEmail').click(function() {
                    var emailLink = $('#sendEmail');
                    emailLink.attr('href', 'mailto:person1@rit.edu,person2@rit.edu,person3@rit.edu?subject=' + $('#subjectInput').val() + '&body=' + $('#msgInput').val() + ' from ' + $('#nameInput').val() );
                })
            });
        </script>
        
    </body>

</html>