<?php
    include 'inc/db.php';
    include 'inc/session.php';
    $thisPage="signUp"; $fileName='signup.php';

    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        // Create a DB instance
        $db = new Carinfo();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        $db->addUser($username,$password);
        ?>
            <meta http-equiv="refresh" content="0;URL=login.php" />
            <?
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <!-- // Include the common head elements -->
    <?php 
        include($path.'assets/inc/header-element.php');
    ?>
        
</head>
<body>
    <!-- //Show the common header -->
    <header>
        <?php 
            include($path.'assets/inc/header.php'); 

        ?>
    </header>
    

    

    <main class="container">

        <form class="form-signin" action="signup.php" method="POST">

            <div class="text-center" id="login"><h1>Sign Up</h1></div>

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
            
            <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Sign Up</button>
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

