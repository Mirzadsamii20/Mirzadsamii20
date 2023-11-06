<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sami";


$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
    echo 'not connected';
}




?>