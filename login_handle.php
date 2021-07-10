<?php
error_reporting(0);
$showAlret = false;
$Showerror = false;
if(isset($_POST['login_submit']))
{
    include ('connection.php');
    $username = $_POST["username"];
    // echo $username;
    $password = $_POST["password"];
    // echo $password;

    // Check User login or not
    $getsql = "SELECT * FROM `logindata` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$getsql);
    $matchrow = mysqli_num_rows($result);
    if( $matchrow == 1)
    {
        $row = mysqli_fetch_assoc($result);
        $showAlret = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['sno'] = $row['SerialNumber'];
        $_SESSION['username'] = $username;
        header ("location: index.php");
    }
    else
    {
        $Showerror = true;

    }
}
?>