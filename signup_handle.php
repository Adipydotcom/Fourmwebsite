<?php
$showAlret = false;
$ShowDataInseret = false;
$error = false;
if (isset($_POST['submit'])) {
    include('connection.php');
    $username = $_POST["username"];
    $password = $_POST["password"];


    // Check User exist or not
    $getsql = "SELECT username FROM `logindata` WHERE username = '$username'";
    $result = mysqli_query($conn, $getsql);
    $exitsuser = mysqli_num_rows($result);
    if ($exitsuser > 0) {
        $showAlret = true;
        // echo 'phle se hi h';
    } else {
        // Insert Data 
        if (($username != "") && ($password != "")) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            var_dump($hash);
            $sql = "INSERT INTO `logindata` ( `username`, `password`) VALUES ('$username', '$password');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $ShowDataInseret = true;
                header("Location: index.php?signupsuccess=true");
                // echo 'ho gya';
                exit();
            }  
        }
        // echo 'nhi hua';
        $error = true;
    }
}

?>