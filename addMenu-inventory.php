<?php
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();

    if (!hasSession()) {
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<?php $thisPage="addMenu"; $fileName='addMenu.php';?>

<html>
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
            <h1>Welcome Admin</h1>

            <ul class="nav nav-tabs my-3">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addMenu-edit.php">Manage</a>
                </li>

            </ul>

            <table class='table'>
                <thead class='thead-light'>
                    <tr>
                        <th>Model</th>
                        <th class="d-none d-md-block">Engine</th>
                        <th>Price</th>
                        <th class="d-none d-md-block">Body</th>
                        <th>Quantity</th>
                        <th class="d-none d-md-block">Cylinder</th>
                        <th>Lease</th>
                    </tr>
                </thead>
                <tbody>

            <?php 
                $db = new Carinfo();
                if(!$db) {
                    echo $db->lastErrorMsg();
                }
            
                $sql = "SELECT * from Carinfo;";

                // Execute the query
                $ret = $db->query($sql);
                
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    echo "<tr>";
                    echo "<td>". $row['Model'] ."</td>";
                    echo "<td class=\"d-none d-md-block\" >". $row['Engine'] ."</td>";
                    echo "<td>". $row['Price'] ."</td>";
                    echo "<td class=\"d-none d-md-block\" >". $row['Body'] ."</td>";
                    echo "<td>". $row['Qty'] ."</td>";
                    echo "<td class=\"d-none d-md-block\" >". $row['Cyl'] ."</td>";
                    echo "<td>". $row['Lease'] ."</td>";
                    echo "</tr>";
                }
            
            
            ?>

                </tbody>
            </table>


        </main>
        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>
</html>