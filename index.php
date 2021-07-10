<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- css  -->
    <link rel="stylesheet" href="index.css">
    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">



    <!-- font link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <title>ASKHERE</title>
</head>

<body>

    <!-- navbar section -->

    <?php include 'head.php'; ?>

    <!-- carosul aection -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner text-uppercase">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x900/?coding,laptop" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5>We are here to help you</h5>
                    <p>Learn and grow up india with us</p>
                </div>
            </div>
            <div class="carousel-item ">
                <img src="https://source.unsplash.com/1600x900/?,cyberworld,hacking" class="d-block w-100" alt="...">
                <div class="carousel-caption  d-md-block">
                    <h5>Cyber World make you anonymous</h5>
                    <p>Learn cyber security and ethical hacking</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x900/?tech,technology" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5>Explore the tech world </h5>

                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- services section -->

    <section class="service-section">
        <div class="text-center">
            <h2>Our Services</h2>
        </div>
        <div class="services d-flex justify-content-center align-item-center flex-wrap mt-4 ">
            <div class="row">
                <!-- Fetching data from data base -->
                <?php
                include 'connection.php'; 
                $sql = "SELECT * FROM `category`";
                $result = mysqli_query($conn, $sql);
                
                while ($getrecord = mysqli_fetch_assoc($result)) 
                {
                    $get_tittle = $getrecord['cat_tittle'];
                    $get_dec = $getrecord['cat_des'];
                    $get_id = $getrecord['catid'];
                    echo '
                <div class="col-lg-4 col-md-4 d-flex justify-content-center" id="service_child">
                    <div class="card servicescard" style="width: 18rem;">
                        <img src="https://source.unsplash.com/1600x900/?'.$get_tittle.',ccoding" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title title"> <a href="queans.php?catid='.$get_id.'">' .$get_tittle.'</a> </h5>  
                            <p class="card-text">'.$get_dec.'
                            </p>
                            <div class="butt">
                            <a href="queans.php?catid='.$get_id.'"> <button class="btn btn-success servicesbtn" type="submit">Let\'s Start</button> </a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
                    <!-- Fetching completed -->
            </div>
        </div>
    </section>

    <!-- footer section -->
    <footer class="footer text-center text-white" style="background-color: #f1f1f1;">
        <!-- Section: Social media -->
        <div class="social-media">
            <div class="icon">
                <a href=""> <i class="bi bi-whatsapp"></i></a>
            </div>
            <div class="icon"><a href=""><i class="bi bi-instagram"></i></a></div>
            <div class="icon"><a href=""><i class="bi bi-facebook"></i></a></div>
            <div class="icon"><a href=""><i class="bi bi-github"></i></a></div>
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="copy_right text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="https://mdbootstrap.com/">askhere.site</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>