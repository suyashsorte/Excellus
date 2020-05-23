<?php 
    include 'inc/session.php';
    include 'inc/db.php';
    session_start();

    $thisPage="newCar"; $fileName='new-car.php';

    if(isset($_POST['submit'])) {
        if(!empty($_POST['sort']))
            {$_SESSION['sort'] = $_POST['sort'];}
    }

    if(!empty($_POST['search']))
        {$_SESSION['search'] = $_POST['search'];}
    
    if(!empty($_POST['type1']))
        {$_SESSION['type1'] = $_POST['type1'];}

?>
<!DOCTYPE html>


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
            <div class="offset-md-1"><h1>New Car</h1></div>

            

            <div class="row justify-content-md-center">

                 <div class="col-md-2 mb-4 d-none d-xl-block" id="filter">

                    <div class="card mb-2 p-3" id="brandFilter">
                       <p>Brand</p>
                       <form method="POST">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort" value="asc" id="asc"  <?php if (isset($_POST['sort']) && $_POST['sort']=="asc") echo "checked";?>>
                                <label class="form-check-label" for="asc">
                                    From A To Z
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort" value="desc" id="desc" <?php if (isset($_POST['sort']) && $_POST['sort']=="desc") echo "checked";?>>
                                <label class="form-check-label" for="desc">
                                    From Z To A
                                </label>
                            </div>
                            <div class=" row justify-content-md-center">
                                <input type="submit" class="btn btn-primary px-3 mt-3" value="Sort by Name">
                            </div>
                       </form>
                       
                   </div>

                   <div class="card p-3 mb-2">
                        <p>Price</p>
                        <?php 
                            $db = new Carinfo();
                            if(!$db) {
                                echo $db->lastErrorMsg();
                            }
                            
                            ?>
                            <form method='POST'>
                            
                                <div class="form-check">
                                    <input class='form-check-input' name='type1'  type='radio' value='Below$19000' id="Below$19000" <?php if (isset($_POST['type1']) && $_POST['type1']=='Below$19000') echo "checked";?>>  
                                    <label class="form-check-label" for="Below$19000">
                                        &lt;&nbsp;$19000
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class='form-check-input' name='type1'  type='radio' value='Between$19001and$24000' id="Between$19001and$24000" <?php if (isset($_POST['type1']) && $_POST['type1']=='Between$19001and$24000') echo "checked";?>>  
                                    <label class="form-check-label" for="Between$19001and$24000">
                                        $19000 - $24000
                                    </label>
                                </div>
                                    
                                <div class="form-check">
                                    <input class='form-check-input' name='type1'  type='radio' value='Above$24001' id="Above$24001" <?php if (isset($_POST['type1']) && $_POST['type1']=='Above$24001') echo "checked";?>>  
                                    <label class="form-check-label" for="Above$24001">
                                        &gt; $24001
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class='form-check-input' name='type1'  type='radio' value='All' id="All" <?php if (isset($_POST['type1']) && $_POST['type1']=='All') echo "checked";?>>  
                                    <label class="form-check-label" for="All">
                                        All
                                    </label>
                                </div>

                            
                                <input type="submit" class="btn btn-primary px-3 mt-3" value="Sort by Price">
                            </form>
                    </div>

                    <div class="card p-3">
                        <p>Type</p>
                        <?php 
                            $db = new Carinfo();
                            if(!$db) {
                                echo $db->lastErrorMsg();
                            }
                        
                            $sql = "SELECT DISTINCT Body from Carinfo;";
                            $ret = $db->query($sql);
                            $i=1;
                            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                                $model = $row['Body'];
                                echo "<div class='form-check'>";             
                                echo "<input class='form-check-input' type='checkbox' value='' id='".$i."'>";
                                echo "<label class='form-check-label' for='".$i."'>"; 
                                echo $model;
                                echo "</label>
                                </div>";
                                $i=$i+1;
                            }

                        ?>
                        <a href="#" class="btn btn-primary px-3 mt-3">Search</a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-10 mb-5">

                    <?php 
                    $sort=$_POST['sort'] ;
                    $search=$_SESSION['search'];
                    if(strlen($search==0)){
                        unset($_SESSION['search']);
                    }
                    else{
                        $search=$_SESSION['search'];
                    }
                    $price=$_POST['type1'];
                    if (strlen($search) != 0)
                    {
                        
                        if($sort=="asc"){
                            $sql = ("SELECT * FROM Carinfo WHERE (Model LIKE '%".$search."%') OR (Body LIKE '%".$search."%') ORDER BY Model ASC" ) ;
                        }
                        else if($sort=="desc"){
                            $sql = $sql = ("SELECT * FROM Carinfo WHERE (Model LIKE '%".$search."%') OR (Body LIKE '%".$search."%') ORDER BY Model DESC" ) ;
                        }


                        else{
                            $sql = ("SELECT * FROM Carinfo WHERE (Model LIKE '%".$search."%') OR (Body LIKE '%".$search."%')") ;
                        }
                    }

                    else{
                    
                        if($sort=="asc"){
                            $sql = "SELECT * from Carinfo ORDER BY Model ASC;";    
                        }
                        else if($sort=="desc"){
                            $sql = "SELECT * from Carinfo ORDER BY Model DESC;";  
                        }
                        else if($price=='Below$19000'){
                            $sql = "SELECT * from Carinfo WHERE Price BETWEEN 0 AND 19000;";  
                        }
                        else if($price=='Between$19001and$24000'){
                            $sql = "SELECT * from Carinfo WHERE Price BETWEEN 19001 AND 24000;";  
                        }
                        else if($price=='Above$24001'){
                            $sql = "SELECT * from Carinfo WHERE Price BETWEEN 24001 AND 99999999;";  
                        }

                        else{
                            $sql = "SELECT * from Carinfo;";  
                        }

                    }

                    $ret1 = $db->query($sql);
                    while($row = $ret1->fetchArray(SQLITE3_ASSOC) ) {?>
                        <div class="mb-3">
                            <div class="card">
                                <div class="row no-gutters">

                                    <div class="col-lg-6 imgContainer">
                                        <img src="<?php echo $row['Img1']; ?>" class="img-fluid" alt="" />
                                    </div>

                                    <div class="col textContainer">

                                        <form method="POST" action="new-car.php">

                                            <div class="card-block py-3 px-3">

                                                <?php $model = $row['Model'];
                                                str_replace("_"," ",$model);?>
                                                <?php $url = rawurlencode($row['Model']); ?>

                                                <h4 class="card-title mb-1"><a href="carInfo.php?Model='<?php echo $url;?>'"><?php echo $model;?></a></h4>
                                                <h5><?php echo $row['Price'] ?></h5>

                                                <div class="row mt-2 mb-3">
                                                    <div class="col-3">
                                                        <p class="card-text">Engine: </p>
                                                        <p class="card-text">Body: </p>
                                                    </div>
                                                    <div class="col-9">
                                                        <p class="card-text"><?php echo $row['Engine'];?></p>
                                                        <p class="card-text"><?php echo $row['Body'];?></p>
                                                    </div>
                                                </div>
                                            
                                            
                                                <a href="" class="btn btn-primary px-5 addToCart" onclick="myFunction()">Buy</a>
                                                <!-- <button class="btn btn-primary px-5 addToCart" type="submit">Buy</button> -->
                                            
                                            </div>

                                        </form>

                                        <!-- </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php }?>

                </div>

            </div>
        </main>

        <footer>
            <?php include($path.'assets/inc/footer.php'); ?>
        </footer>

        <?php include($path.'assets/inc/footer-element.php'); ?>
    </body>

</html>