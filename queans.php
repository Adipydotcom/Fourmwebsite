<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="queans.css">
    <title>ASKHERE/Thread</title>
</head>

<body>
<?php include 'head.php'; ?>
    <!-- Insert data  -->
    <?php
    include 'connection.php';
    $alret = false;
    $id = $_GET['catid'];
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $alret = true;
        $que_title = str_replace("<", "&lt", $que_title);
        $que_title = str_replace(">", "&gt", $que_title);
        $que_title = $_POST['quetitle'];
        $que_dec = $_POST['quedesc'];
        $sno = $_SESSION['sno'];
        $sql = "INSERT INTO `queans` ( `qustions`, `description`, `user_id`, `thread_id`) VALUES ('$que_title', '$que_dec', ' $sno', '$id')";
        $result = mysqli_query($conn, $sql);
        if($alret){ echo'
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Question Asked</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
            else
            {
                echo'
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed!</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
    }
?>

    <?php
    include 'connection.php';
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE catid = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($get_res = mysqli_fetch_assoc($result)) {
        $cat_name = $get_res['cat_tittle'];
        $cat_dec = $get_res['cat_des'];
    }
    ?>

<!-- <section class="main"> -->
    <div class="parent container py-5 px-4 ">
        <h3>Welcome to <?php echo $cat_name; ?> Group</h1>
            <p><?php echo $cat_dec; ?></p>
            <hr class="">
            <p>
                Warn About Adult Content.
                Do not spam.
                Do Not Bump Posts.
                Do Not Offer to Pay for Help.
                Do Not Offer to Work For Hire.
                Do Not Post About Commercial Products.
                Do Not Create Multiple Accounts (Sockpuppets)
                When creating links to other resources.
            </p>
            <div class="butt">
                <button type="button" class="btn btn-primary">Learn More</button>
            </div>
    </div>
    
    <div class="container py-2">
        <h2>Ask Questions here...</h2>
        <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='true')
        { echo
        '<form action="'. $_SERVER['REQUEST_URI'].'" method="POST">
            <div class="mb-3">
                <label for="ques" class="form-label">Question Title</label>
                <input type="text" class="form-control" id="ques" name="quetitle" aria-describedby="queHelp">
                <div class="form-floating my-3">
                    <textarea class="form-control" name="quedesc" id="floatingTextarea2"
                        style="height: 100px"></textarea>
                        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                    <label for="floatingTextarea2">Title Description</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>';
        }
        else
        {    echo
            '<p> To ask questions have to login </p>';
        }
        ?>
    </div>



    <!-- Fetching data -->
    
        <h3 class="text-center my-3"> Browse your Problem here</h3>
        <?php
    include 'connection.php';
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `queans` WHERE thread_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $no_que_found = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $no_que_found = false;
        $id = $row ['id'];
        $samay = $row ['time'];
        $title = $row['qustions'];
        $desc = $row['description'];
        $user = $row['user_id'];
        $sql2 = "SELECT * FROM `logindata` WHERE SerialNumber = '$user'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        echo '<div class="container ">
                <div class="media d-flex  mt-3 " >
                        <img src="user.png " style="width: 50px; height:50px;" alt="user_img">
                        <div class="m_body my-1">
                        <h4>'.$row2['username'].'</h4>
                            <h6>
                                <a href="thread.php?thread_list_id=' . $id . '">' . $title . ' at '.$samay .'</a>
                            </h6>'
                            . $desc .'
                       </div>
                    </div>
                </div>';
    }

    if ($no_que_found) {
        echo '<div class="container py-3 px-3">
        <p class="text-center"> NO QUESTIONS FOUND </p>
    ';
    }
    ?>

    </div>

<!-- </section> -->
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
                    <div class="text-center text-dark p-3 footpara" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2020 Copyright:
                        <a class="text-dark" href="https://mdbootstrap.com/">askhere.site</a>
                    </div>
                    <!-- Copyright -->
            </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    -->
</body>

</html>