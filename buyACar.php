<?php
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();

    if (!hasSession()) {
        header('Location: login.php');
        exit();
    }
?>
<html>
    <body>
        <?php
            $qty = $_POST['qty'];
            $cars = $_POST['cars']; 
            echo $_POST['qty'];
            echo $_POST['cars'];

            
            
            $db = new Carinfo();
            if(!$db) {
                echo $db->lastErrorMsg();
            }
        
            $sql = "Update Carinfo set Qty = Qty-1 where Model = '$cars' ;";
            $db->query($sql);

            echo "<meta http-equiv=\"refresh\" content=\"0;URL=addMenu-inventory.php\" />";
            $db->close();

        ?>
    </body>    
</html>