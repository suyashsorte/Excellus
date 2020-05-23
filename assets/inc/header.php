
    <nav class='navbar navbar-expand-lg navbar-dark bg-indigo'>
        <a class='navbar-brand' href='#'>Excellus</a>

        <button id='menuBtn' class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExample05' aria-controls='navbarsExample05' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarsExample05'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item row' id='searchBarRow'>

                <?php 
                    echo " <form class='collapse col-xl-4' id='searchBar'  ";
                    echo ($thisPage=='preOwned' ? " action='pre-owned.php' " : " action='new-car.php' ");
                    echo " method='POST'>";
                
                ?>

                    <input class='form-control' type='text' name='search' placeholder='Search' value= '<?php if (isset($_SESSION["search"])) {echo $_SESSION["search"];}?>'>
                    <input type='submit' style='display:none'>
                </form>
                    <button class='nav-link d-none d-lg-block searchBtn-toggler' id='searchBtn' type='button' data-toggle='collapse' data-target='#searchBar' aria-expanded='false' aria-controls='searchBar'>
                        <i class='material-icons'>search</i>
                    </button>
                </li>



    <?php 

                echo "<li ";
                echo ($thisPage=='Home' ? " class='nav-item activeItem' " : " class='nav-item' ");
                echo "><a class='nav-link' href='index.php'>Home</a></li>";

                echo "<li ";
                echo ($thisPage=='newCar' ? " class='nav-item activeItem' " : " class='nav-item' ");
                echo "><a class='nav-link' href='new-car.php'>New Car</a></li>";

                echo "<li ";
                echo ($thisPage=='preOwned' ? " class='nav-item activeItem' " : " class='nav-item' ");
                echo "><a class='nav-link' href='pre-owned.php'>Pre-owned</a></li>";

                echo "<li ";
                echo ($thisPage=='contactUs' ? " class='nav-item activeItem' " : " class='nav-item' ");
                echo "><a class='nav-link' href='contact-us.php'>Contact Us</a></li>";

                echo "<li ";
                echo ($thisPage=='aboutUs' ? " class='nav-item activeItem' " : " class='nav-item' ");
                echo "><a class='nav-link' href='about-us.php'>About Us</a></li>";

                

        echo "
                <li class='nav-item dropdown' id='logInMenu'>
                    <a class='nav-link dropdown-toggle' href='http://example.com' id='dropdown05' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='material-icons' id='faceIcon'>face</i><br/>
                        User Portal
                    </a>
                    <div class='dropdown-menu' aria-labelledby='dropdown05'>
            
                    ";


            // Get the username from the session
            // $username = getUsername();

            if (hasSession()) {
                $username = getUsername();

                if($username=='admin'){
                    echo "<a class='dropdown-item' href='addMenu-inventory.php'>Inventory&nbsp;&nbsp;<span class='badge badge-primary'>Admin</span></a>";
                }
                echo "<a class='dropdown-item' id='logout' href='logout.php'>Log Out</a>";
            }else{
                echo "<a class='dropdown-item' href='login.php'>Log In</a>";
            }
                
            echo "
                                </div>
                            </li>
                        </ul>   
                    </div>
                </nav>";
        

?>