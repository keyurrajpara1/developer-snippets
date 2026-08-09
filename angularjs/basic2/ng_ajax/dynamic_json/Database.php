<?php

class Databse {
    
    private $link;
    private $hostname;
    private $username;
    private $password;
    private $database;
    
    // constructor
    public function __construct() {
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "ajax";
    }
    
    // Get Database Connection
    public function getConnection(){
        $this->link = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        
        // Check if connection established or not
        if ( $this->link->connect_error ) {
            // Stop PHP Script
            die("Error: " . $this->link->connect_error);
        }
    }
    
    // Close Database Connection
    public function closeConnection(){
        // Check if there is a active databse connection
        if ( $this->link ){
            //Stop database connection
            $this->link->close();
        }
    }
    
    // Execute SQL Select type queries and return result
    public function executeRead($query){
        // Execute query
        $result = $this->link->query($query);
        
        // check error
        if ( !$result ){
            // STOP PHP Script show error
            die("Error: " . mysqli_error($this->link));
        }
        
        // return result
        return $result;
    }
    
}

