<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- css  -->
    <link rel="stylesheet" href="head.css">

    <!-- font link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <title>ASKHERE</title>
</head>

<body>

    <?php
include 'connection.php';
 include 'login_handle.php';
 session_start();
echo
'<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #fff;">AskHere</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #fff;" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contect.php">Contect Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

                            $sql2 = "SELECT cat_tittle,catid FROM `category`";
                            $result2 = mysqli_query($conn, $sql2);
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                echo
                                '<a class="dropdown-item" href="queans.php?catid='.$row2['catid'].'">'.$row2['cat_tittle'].'</a>';
                            }
                        echo
                        '</div>
                        
                    </li>
                </ul>';
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true')
                {
                    echo
                '<form class="d-flex" action="search.php" method="GET">
                     <h4 style="width:12rem;"> Welcome '. $_SESSION['username'].' </h4>

                    <input class="form-control mx-2" type="search" name="search" placeholder="Search" aria-label="Search" style="width:11rem;">

                  <button class="btn btn-danger mx-1" type="submit">Search</button>

                    <a href="logout.php"><button type="button" class="btn btn-danger ">Logout</button> </a>
                </form>';
                }
                else
                {
                    echo
                    '<form class="d-flex" action="search.php" method="GET">

                   
                    <a href="login.php"><button type="button" class="btn btn-danger ">Login</button> </a>
                    <a href="signin.php"><button type="button" class="btn btn-danger ">Signin</button> </a>
                   

                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">

                    <button class="btn btn-danger"  type="submit">Search</button>

                </form>';
                }
                echo'
            </div>
        </div>
    </nav>';
    
    include 'signup_handle.php';
   
     if (isset($_GET['signupsuccess']) && $_GET['signupsuccess']=='true')
     {
      echo '<div class="alert alert-success alert-dismissible fade show " style="margin-top:56px; margin-bottom:0px" role="alert">
      <strong>Sucessfully Signup</strong> Go to Login Page
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
     }
        

    ?>






        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
</body>

</html>