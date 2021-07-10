<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <!-- Main CSS -->
     <link rel="stylesheet" href="signin.css">
    <title>ASKHERE/Signup</title>
</head>

<body>

    <?php
    include 'signup_handle.php';
    if($showAlret){
        echo '<div class="alert alert-danger alert-dismissible fade show " style="margin-top:56px; margin-bottom:0px;" role="alert">
     <strong>Alread exist</strong> 
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if($error){
        echo '<div class="alert alert-danger alert-dismissible fade show " style="margin-top:56px; margin-bottom:0px; role="alert">
     <strong>Invalid Username/password</strong> 
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <?php include 'head.php'; ?>
    <div class="container ">
        <div class="child">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Create Username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Create Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    <footer class="footer text-center text-white" style="background-color: #f1f1f1;">
            <!-- Section: Social media -->
            <div class="social-media d-flex align-item-center flix-row">
                <div class="icon">
                    <a href=""> <i class="bi bi-whatsapp"></i></a>
                </div>
                <div class="icon"><a href=""><i class="bi bi-instagram"></i></a></div>
                <div class="icon"><a href=""><i class="bi bi-facebook"></i></a></div>
                <div class="icon"><a href=""><i class="bi bi-github"></i></a></div>
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">askhere.site</a>
            </div>
            <!-- Copyright -->
    </footer>
    -->
</body>

</html>