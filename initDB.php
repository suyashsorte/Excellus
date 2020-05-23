<html>
    <head>
        <!-- // Include the common head elements -->
        <?php include 'partials/head-elements.php'?>
    </head>

    <body>
        <?php

            // Include the database class
            include 'inc/db.php';

            // Instantiate the database
            $db = new Carinfo();
            if (!$db) {
                echo '<div>Could not create database!</div>';
                exit();
            }

            // Check to see if the database should be initialized
            echo "
                <div>Steps</div>
                <div>
                    <ul>
                ";
            echo '<li>initializing database</li>';

            // Code to initialize the database
            $db->initialize();

            echo '<li>adding users</li>';
            $db->addUser('jghidiu', 'p@ssw0rd');
            $db->addUser('a', 'a');
            $db->addUser('admin', 'admin');

            echo '<li>adding products</li>';
            $db->addProduct('Toyota Camry', 2.4, 24000, 'long sedan',
            'https://www.toyota.com/imgix/responsive/images/gallery/photos-videos/2019/camry/CAM_MY19_0015_V001.png?w=1440&q=90&fm=jpg&fit=max&cs=strip&bg=fff&auto=compress',
            'https://www.toyota.com/imgix/responsive/images/gallery/photos-videos/2019/camry/CAM_MY19_0016_V001.png?w=1440&q=90&fm=jpg&fit=max&cs=strip&bg=fff&auto=compress',10,4,300,'heated seats, reverse camera');

            $db->addProduct('Toyota Corolla', 1.8, 18000, 'sedan',
            'https://www.toyota.com/imgix/responsive/images/gallery/photos-videos/2020/corolla/COR_MY20_0023_V001.png?w=1440&q=90&fm=jpg&fit=max&cs=strip&bg=fff&auto=compress',
            'https://www.toyota.com/imgix/responsive/images/gallery/photos-videos/2020/corolla/COR_MY20_0039_V001.png?w=1440&q=90&fm=jpg&fit=max&cs=strip&bg=fff&auto=compress',10,4,225,'central locking, anti-lock brakes');
            
            $db->addProduct('Nissan Altima', 2.5, 23000, 'long sedan',
            'https://www.nissanusa.com/content/dam/Nissan/us/vehicles/altima/l42p/Launch/360/ray/19tdi-altpace067_005.png.ximg.c1h.360.png',
            'https://www.nissanusa.com/content/dam/Nissan/us/vehicles/altima/l42p/Launch/360/ray/19tdi-altpace067_008.png.ximg.c1h.360.png',10,4,275,'alloy wheels, traction control');    

            $db->addProduct('Nissan Maxima', 3.6, 28000, 'long sedan',
            'https://www.nissanusa.com/content/dam/Nissan/us/vehicles/maxima/a36/1_carryover/360s/1-exterior/nbm/19tdi-maxpace026_008.png.ximg.c1h.360.png',
            'https://www.nissanusa.com/content/dam/Nissan/us/vehicles/maxima/a36/1_carryover/360s/1-exterior/nbm/19tdi-maxpace026_005.png.ximg.c1h.360.png',10,6,350,'window blinds, BOSE surround system');    


            $db->addProduct('Honda Civic', 1.8, 21000, 'sedan',
            'https://car-pictures.cars.com/images/?IMG=USC90HOC024C021003.jpg&HEIGHT=600',
            'https://car-pictures.cars.com/images/?IMG=USC90HOC024E021001.jpg&HEIGHT=600',10,4,200,'heads up display, 7 speed auto grearbox');


            $db->addProduct('Honda CR-V', 2.4, 24000, 'SUV',
                'https://car-pictures.cars.com/images/?IMG=USC80HOS022A021001.jpg&HEIGHT=600',
                'https://car-pictures.cars.com/images/?IMG=USC80HOS021A021002.jpg&HEIGHT=600',10,4,250,'4 wheel drive, hill descent control');
            
            $db->addProduct('Chevy Cruze', 1.8, 19000, 'hatchback',
                'https://www.chevrolet.com/content/dam/chevrolet/na/us/english/index/vehicles/2018/cars/cruze/gallery/exterior/01-images/2018-cruze-gal-ext-01.jpg?imwidth=1200',
                'https://www.chevrolet.com/content/dam/chevrolet/na/us/english/index/vehicles/2018/cars/cruze/gallery/exterior/01-images/2018-cruze-gal-ext-03.jpg?imwidth=1200',10,4,190,'cruise control, automatic climate control');
                
            $db->addProduct('Chevy Spark', 1.6, 14000, 'hatchback',
                'https://www.chevrolet.com/content/dam/chevrolet/na/us/english/index/vehicles/2019/cars/spark/gallery/exterior/2019-spark-ext-gal-08.jpg?imwidth=1200',
                'https://www.chevrolet.com/content/dam/chevrolet/na/us/english/index/vehicles/2019/cars/spark/gallery/exterior/2019-spark-ext-gal-09.jpg?imwidth=1200',10,4,150, 'SRS airbags, Android auto');
            
            
            
            
            
            echo '<li>done</li>';

            echo "
                    </ul>
                </div>
                ";

            $db->close();
        ?>

         <!-- // Include the common footer -->
         <?php include 'partials/footer.php'?>

        <!-- // Include the common script elements -->
        <?php include 'partials/script-elements.php'?>

    </body>
</html>