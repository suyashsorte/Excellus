<?php

    /**
     * Custom class for the database. Provides some basic CRUD functionality for product and user management.
     */
    class Carinfo extends SQLite3
    {

        /**
         * Constructor. Uses "Carinfo.db" as the file.
         */
        function __construct()
        {
            $this->open('Carinfo.db');
        }

        /**
         * Initializes the database. Will drop existing tables!
         */
        public function initialize() {
            $this->exec("
            DROP TABLE IF EXISTS Users;
            CREATE TABLE Users (
                UserID INTEGER PRIMARY KEY,
                Username VARCHAR(60) UNIQUE NOT NULL,
                Salt VARCHAR(30) NOT NULL,
                Hash VARCHAR(30) NOT NULL
            );

            DROP TABLE IF EXISTS Carinfo;
            CREATE TABLE Carinfo (
                Model VARCHAR(60) PRIMARY KEY,
                Engine REAL,
                Price INTEGER,
                Body VARCHAR(20),

                Img1 VARCHAR(250),
                Img2 VARCHAR(250),
                Qty INTEGER,
                Cyl INTEGER,
                
                Lease INTEGER,
                Features VARCHAR(100)
            );

           
            ");
        }
        // public function getuserid($userid){
        //     return $this->query("SELECT * FROM USERS WHERE UserID=$userid");
        // }
        // public function getuserids($username){
        //     return $this->query("SELECT * FROM USERS WHERE Username=$username");
        // }
        // public function id(){
        //     return $this->query("SELECT * FROM USERS");
        // }


        /**
         * Calculates a hash of a string.
         *
         * @param string $string the string to calculate the hash for
         * @return string calculated hash
         */
        private function calculateHash($string) {
            return hash('sha256', $string);
        }

        /**
         * Adds a product into the database.
         *
         * @param string $name the product name
         * @param string $description the product description
         * @param string $imageURL the product image URL
         * @param string $price the product price
         */
        public function addProduct($model, $engine, $price, $body,$img1,$img2,$qty, $cyl, $lease, $features) {
            $this->exec("INSERT INTO Carinfo (Model, Engine, Price, Body, Img1, Img2, Qty, Cyl, Lease, Features) VALUES ('$model', '$engine', '$price','$body','$img1','$img2','$qty', '$cyl', '$lease', '$features')");
            // return True;
        }

        /**
         * Gets the database rows which represent all the products.
         *
         * @return SQLite3Result representing the product rows
         */
        public function getProducts() {
            return $this->query("SELECT * FROM Carinfo");
        }

        /**
         * Gets a database row which represents a product.
         *
         * @return SQLite3Result representing the product row
         */
        public function getProduct($productID) {
            return $this->query("SELECT * FROM Carinfo WHERE Model='$productID'");
        }

        /**
         * Adds a user into the database.
         *
         * @param string $username the username to add
         * @param string $password the password for the user
         * @return {string} calculated hash
         */
        public function addUser($username, $password) {
            // Get the salt
            $salt = time();
            // Calculate the hash
            $hash = $this->calculateHash($salt.$password);
            // Insert the user into the database
            $this->exec("INSERT INTO Users (Username, Salt, Hash) VALUES ('$username', '$salt', '$hash')");
        }
       public function checkids($userid,$productid){
        return $this->query("SELECT * FROM ShoppingCart WHERE UserID = '$userid' AND ProductID = '$productid'");
       }
        /**
         * Checks to see if credentials authenticates.
         *
         * @param string $username the username to authenticate
         * @param string $password the password to authenticate with
         * @return boolean true if the supplied credentials authenticate, false otherwise
         */
        public function authenticateUser($username, $password) {
            // Get the results from the query
            $results = $this->query("SELECT Salt, Hash FROM Users WHERE Username = '$username'");

            // Get the first row in the results
            $result = $results->fetchArray(SQLITE3_ASSOC);

            // Check to see if any results are present
            if ($result) {
                // Get the salt from the database
                $salt = $result['Salt'];
                // Get the hash from the database
                $expectedHash = $result['Hash'];
                // Calculate the hash supplied by the user (using the salt from the database)
                $actualHash = $this->calculateHash($salt.$password);
                // Return a match (or not) (password is invalid)
                return $expectedHash === $actualHash;
            } else {
                // Invalid username
                return false;
            }
        }

    }

?>
