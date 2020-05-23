<?php 
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();
?>
<!DOCTYPE html>

<?php $thisPage="login"; $fileName='login.php';?>
<?php
    // If the user is logged in already, forward to "products.php"
    if (hasSession()) {
        header('Location: index.php');
        exit();
    }

    // If the request was a POST, process the login
    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        // Create a DB instance
        $db = new Carinfo();
        // Check to see if the user authenticates
        $authenticated = $db->authenticateUser($_POST['username'], $_POST['password']);
        // Close the database
        $db->close();

        if ($authenticated) {
            // User is authenticated
            if($_POST['username']=="admin" and $_POST['password']=="admin"){
                startSession($_POST['username']);
                $_SESSION["username"] = $_POST['username'];
                // Redirect to "products.php"
                header('Location: addMenu-inventory.php');    
                exit();
            }
            // Start the session (place the "username" into the session)
            else{
            startSession($_POST['username']);
            $_SESSION["username"] = $_POST['username'];
            // Redirect to "products.php"
            header('Location: new-car.php');
            exit();
            }
        } else {
            //User is NOT authenticated
            //
            // Redirect to the login page and append a message for the user
            // Redirects are GET's
            header('Location: login.php?message=Invalid username or password');
            exit();
        }
    }
?>


<html lang="en">
    <head>
        <title>Login</title>
            <!-- // Include the common head elements -->
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
        <!-- //Show the common header -->
  
        <?php
            // If a "message" parameter exists, display the value
            if (isset($_GET['message'])) {
                echo "<div>$_GET[message]</div>";
            }
        ?>

        <!-- The login form; notice the method is POST and the action is THIS PAGE-->
        <main class="container">

                <form class="form-signin" method="POST" action="login.php">

                    <div class="text-center" id="login"><h1>Login</h1></div>

                    <label for="inputUsername" class="sr-only">Username</label>
                    <input name="username" type="text" id="inputUsername" class="form-control mt-5" placeholder="Username" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                    <?php
                        // If a "message" parameter exists, display the value
                        if (isset($_GET['message'])) {
                            echo "<small class=\"form-text text-muted\" id=\"errorMsg\">$_GET[message]</small>";
                        }
                    ?>
                    
                    <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Log in</button>
                    <small class="form-text text-muted">Not Registered? <a href="signup.php">Sign Up</a></small>
                </form>

                
        </main>

        <!-- // Include the common footer -->
        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <!-- // Include the common script elements -->
        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>
</html>
