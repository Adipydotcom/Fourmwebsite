<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="login.css">
    <title>ASKHERE/Login</title>
  </head>
  <body>
   <?php
   include 'head.php';
   include 'login_handle.php';
   if ($showAlret){
   echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
   <strong>Login Successfull</strong> 
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
   }

   if ($Showerror){
    echo '<div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
    <strong>Failed</strong> Username or Password Incorrecct!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    }
   ?>
  

  <form class="mx-auto " action="" method="POST" style="width: 50%; margin-top:80px;" onsubmit="return val()">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="pass">
  </div>
  <button type="submit" name="login_submit" class="btn btn-primary">Submit</button>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script type="text/javascript">
      function val()
      {
          var user = document.getElementById('username').value;
          // var pass = document.getElementById('password').value;

        // Username condition
        if ((user == "") && (user.length == 0)) {
          alert ("Please Fill the username");
          return false;
        }
        if((user.length <=4) || (user.length >=10))
        {
          alert ("Username can,t less than 4 character and grater than 10 character");
          return false;
        }
        // Password Condition
        if ((pass == "") && (pass.length == 0)) {
          alert ("Please Fill password");
          return false;
        }
        if ((pass.length <=5) && (pass.length >=15)) {
          alert ("Password should be munimum 5 and maximum 15");
          return false;
        }
      }
    </script>

<footer class="footer text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
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
  </body>
</html>