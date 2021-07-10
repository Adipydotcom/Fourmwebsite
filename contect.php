
<!-- Insert Data into database -->
<?php 
include 'connection.php';

if(isset($_POST['submit']))
{
$name = $_POST['name'];
echo $name;
$mail = $_POST['email'];
$pass = $_POST['password'];
$textarea = $_POST['txt'];
$sql = "INSERT INTO `contect` (`name`, `mail`, `password`, `textarea`) VALUES ('$name', '$mail', '$pass', '$textarea')";
$result = mysqli_query($conn,$sql);
if($result){
    // echo 'It is all ok bro';
}
else{
    echo 'kuch to prblm h';
}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- main CSS -->
    <link rel="stylesheet" href="contect.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Contect</title>
</head>

<body>
    <div class="main_body">
    <?php include 'head.php';
    include 'connection.php';
    ?>
    <div class="container head_area">
        <h2 class="text-center text-uppercase head"> contact</h2>
        <hr class="text-light">
        <div class="head_item text-center para">
            <h5> We'd love to help</h5>
        </div>
    </div>

    <section class="main">
        <div class="container">
            <form class="form" action="#" method="POST" onsubmit="return val()">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" autocomplete="off">
                    <span id="username" class="text-danger font-weight-bold"> </span></span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" autocomplete="off">
                    <span id="emails" class="text-danger font-weight-bold"></span>
                </div>
                <div class="mb-3">
                    <label for="pswd" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="pswd" autocomplete="off">
                    <span id="password" class="text-danger font-weight-bold"></span>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Check me out</label>
                    <span id="chkd" class="text-danger font-weight-bold"> </span></span>
                </div>

                <div class="form-floating">
                <label class="form-check-label" for="check">Coment Here</label>
                    <textarea class="form-control  " placeholder="Leave a comment here" id="floatingTextarea" name="txt"> </textarea>
                    <label for="floatingTextarea"></label>
                </div>
                <div class="tytn">
                    <button type="submit" name="submit" class="btn btn-primary text-center">Submit</button>
                </div>
            </form>
        </div>
        <div class="con">
            <div class="item">
                <div class="fafa"><i class="fa fa-map-marker"></i></div>
                <p> C-56/F Block, Dayal Residency,Lucknow</p>
            </div>
            <div class="item">
                <div class="fafa"><i class="fa fa-mobile"></i></div>
                <p>+99517535500</p>
            </div>
            <div class="item">
                <div class="fafa"><i class="fa fa-envelope-o"></i></div>
                <p>adibhai266@gmail.com</p>
            </div>
            <hr class="text-light">
            <div class="icon">
                <div class="facon">
                    <a href=""> <i class="fa fa-facebook-official" aria-hidden="true"></i> </a>
                </div>
                <div class="facon"><a href=""><i class="fa fa-instagram" aria-hidden="true"></i> </a> </div>
                <div class="facon"> <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
            </div>
        </div>
    </section>


</div>




    <script type="text/javascript">
        function val() {
            // Name Varification
            let user = document.getElementById('name').value;
            if (user == "") {
                document.getElementById('username').innerHTML = "** Please Enter Name!";
                return false;
            }
            if (user.length <= 3) {
                document.getElementById('username').innerHTML = "** Name Should be grater than 3 character!";
                return false;
            }
            if (!isNaN(user)) {
                document.getElementById('username').innerHTML = "** Name can't start with number!";
                return false;
            }

            // Here Email Varification
            let emailid = document.getElementById('email').value;
            if (emailid == "") {
                document.getElementById('emails').innerHTML = " ** Please fill the email id field";
                return false;
            }
            if (emailid.indexOf('@') <= 0) {
                document.getElementById('emails').innerHTML = " ** @ Invalid Position";
                return false;
            }

            if ((emailid.charAt(emailid.length - 4) != '.') && (emailid.charAt(emailid.length - 3) != '.')) {
                document.getElementById('emails').innerHTML = " ** . Invalid Position";
                return false;
            }

            // Password correction

            let pass = document.getElementById('pswd').value;
            if (pass == "") {
                document.getElementById('password').innerHTML = "** Please Fill password!";
                return false;
            }
            if ((pass.length <= 5) || (pass.length >= 20)) {
                document.getElementById('password').innerHTML = "** Password must be less than 20 and greater than 5 characters!";
                return false;
            }

            // Checked or not 
            let chk = document.getElementById('check');
            if (chk.checked == false) {
                document.getElementById('chkd').innerHTML = "** Check is compulsory!";
                return false;
            }
        }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>