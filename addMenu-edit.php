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
                    <a class="nav-link" href="addMenu-inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Manage</a>
                </li>

            </ul>

            <div>
                <h3>Update Quantity</h3>

                <?php         
            
                    $db = new Carinfo();
                    if(!$db) {
                        echo $db->lastErrorMsg();
                    }
                
                    $sql = "SELECT * from Carinfo;";

                    
                    // Execute the query
                    $ret = $db->query($sql);

                echo "

                <form class=\"col-lg-8\" method=\"POST\" action=\"addExisting.php\">
                    <div class=\"form-group row\">
                        <label for=\"modelSelect\" class=\"col-sm-2 col-form-label\">Model</label>
                        <div class=\"col-sm-10\">
                            <select class=\"form-control\" id=\"modelSelect\" name=\"cars\">
                        
                ";
                while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                    $model = $row['Model'];
                    str_replace("_"," ",$model); //should replace an underscore with a space coz a space cant be used in url
                    echo "<option value=\"".$model."\">".$model."</option>"; 
                    
                }

                echo "
                        
                            </select>
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"addQty\" class=\"col-sm-2 col-form-label\">Quantity</label>
                        <div class=\"col-sm-10\">
                            <input class=\"form-control\" id=\"addQty\" type=\"text\" name=\"qty\" value=\"1\">
                        </div>
                    </div>

                    <button class=\"btn btn-primary px-5\" type=\"submit\">Update Quantity</button>

                </form>

                ";
            
                echo "

                <hr/>

                <h3>Add A New Model</h3>

                <form  class=\"col-lg-8\" method=\"POST\" action=\"addNew.php\">

                    <div class=\"form-group row\">
                        <label for=\"modelInput\" class=\"col-sm-2 col-form-label\">Model</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"car\" class=\"form-control\" id=\"modelInput\" value=\"Lamborghini Diablo\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"engineInput\" class=\"col-sm-2 col-form-label\">Engine</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"engine\" class=\"form-control\" id=\"engineInput\" value=\"6.0\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"priceInput\" class=\"col-sm-2 col-form-label\">Price</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"price\" class=\"form-control\" id=\"priceInput\" value=\"350000\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"bodyInput\" class=\"col-sm-2 col-form-label\">Body</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"body\" class=\"form-control\" id=\"bodyInput\" value=\"coupe\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"qtyInput\" class=\"col-sm-2 col-form-label\">Quantity</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"qty\" class=\"form-control\" id=\"qtyInput\" value=\"1\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"cylInput\" class=\"col-sm-2 col-form-label\">Cylinder</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"cyl\" class=\"form-control\" id=\"cylInput\" value=\"1\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"leaseInput\" class=\"col-sm-2 col-form-label\">Lease</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"lease\" class=\"form-control\" id=\"leaseInput\" value=\"1\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"featuresInput\" class=\"col-sm-2 col-form-label\">Features</label>
                        <div class=\"col-sm-10\">
                            <input type=\"text\" name=\"features\" class=\"form-control\" id=\"featuresInput\" value=\"window blinds, BOSE surround system\">
                        </div>
                    </div>
                    
                    <div class=\"form-group row\">
                        <label for=\"img1Input\" class=\"col-xl-2 col-form-label\">Image Link 1</label>
                        <div class=\"col-xl-10\">
                            <input type=\"text\" name=\"img1\" class=\"form-control\" id=\"img1Input\" value=\"https://www.wsupercars.com/wallpapers/Lamborghini/1994-Lamborghini-Diablo-SE30-V1-1080.jpg\">
                        </div>
                    </div>

                    <div class=\"form-group row\">
                        <label for=\"img2Input\" class=\"col-xl-2 col-form-label\">Image Link 2</label>
                        <div class=\"col-xl-10\">
                            <input type=\"text\" name=\"img2\" class=\"form-control\" id=\"img2Input\" value=\"https://www.wsupercars.com/wallpapers/Lamborghini/1994-Lamborghini-Diablo-SE30-V7-1080.jpg\">
                        </div>
                    </div>

                    

                    <div>
                    
                        <button class=\"btn btn-primary px-5 mb-4\" type=\"submit\">Add A New Model</button>
                    </div>
                </form>

            </div>

            ";

            $db->close();
            ?>
        </main>
        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>
</html>