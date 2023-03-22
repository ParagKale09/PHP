<?php
//Neccessary Details needed for to connect a database.
$servername = "localhost"; 
$username = "root";
$password ="";                    
$database="postbox";

//connecting to database
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    //If connection fails
    die("Error". mysqli_connect_error());
}