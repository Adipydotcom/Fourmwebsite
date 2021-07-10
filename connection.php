<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "loginsystem";


$conn = mysqli_connect($server,$username,$password,$dbname);

if($conn)
{
    // echo "kaam ho gya guru";
}
else{
    echo "Somthingh wrong";
}
?>