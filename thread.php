<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Main CSS -->
    <link rel="stylesheet" href="coment.css">
    <title>ASKHERE/Thread</title>
</head>

<body>
    <?php include 'head.php'; ?>
    <!-- Insert comments  -->
    <?php
    include 'connection.php';
    $id = $_GET['thread_list_id'];
    $alret = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $alret = true;
        $coment = $_POST['comsec'];
        $coment = str_replace("<", "&lt;", $coment);
        $coment = str_replace(">", "&gt;", $coment);
        $sno = $_SESSION['sno'];
        $sql = "INSERT INTO `coments`(`com_content`, `que_id`, `com_by`) VALUES (' $coment','$id','$sno')";
        $result = mysqli_query($conn, $sql);
        if ($alret) {
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Coments Successfull!</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed!</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    ?>

<!-- <section class="main"> -->
    <?php
    include 'connection.php';
    $id = $_GET['thread_list_id'];
    $sql = "SELECT * FROM `queans` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($get_que = mysqli_fetch_assoc($result)) {
        $que = $get_que['qustions'];
        $dec = $get_que['description'];
        $user = $get_que['user_id'];
        $sql2 = "SELECT * FROM `logindata` WHERE SerialNumber = '$user'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo
        '<div class="container top">
            <div class="media d-flex justify-content-center mt-3 " >
                <div class="m_body my-1">
                    <strong> <h3>' . $que . '</h3> </strong>
                    ' . $dec . ' <p> <strong> Posted By- </strong> <em>' . $row2['username'] . '</em>  </p>
                </div>
            </div>
        </div>';
    }
    ?>




    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST" class="comentsarea">
            <label class="form-label text-center">Post Answer</label>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
                echo
                ' <div class="mb-3">
                        <div class="form-floating my-3">
                            <textarea class="form-control" name="comsec" id="floatingTextarea2" style="height: 100px"></textarea>
                            <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '">
                            <label for="floatingTextarea2">Leave a answer</label>
                        </div>
                    <button type="submit" name="submit" class="btn btn-success">Post</button>
                </div>';
            } 
            else {
                echo
                '<p> To post ans have to login</p>';
            }
            ?>
</form>
            <!-- Fetching coments -->
            <p class="text-center"> Available Answer</p>
            <div class="container com_list">

                <?php
                include 'connection.php';
                $data_not_found = true;
                $id = $_GET['thread_list_id'];
                $sql = "SELECT * FROM `coments` WHERE que_id = '$id'";
                $result = mysqli_query($conn, $sql);
                while ($get_res = mysqli_fetch_assoc($result)) {
                    $data_not_found = false;
                    $coment_content = $get_res['com_content'];
                    $ctime = $get_res['com_time'];
                    $user = $get_res['com_by'];
                    $sql2 = "SELECT * FROM `logindata` WHERE SerialNumber = '$user'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo
                    '<div class="com_list_child my-2">
                        <img src="user.png " style="width: 50px; height:50px;" alt="user_img">
                            <div class="content mx-4 items">
                                <h5>' . $row2['username'] . '</h5> 
                                <p class="mb-0" >' . $coment_content . '</p>
                                ' . $ctime . '
                            </div>   
                    </div>';
                }
                if ($data_not_found) {
                    echo '<div class="container py-3 px-3">
                            <p class="text-center"> Sorry! Answer not found. </p>';
                }
                ?>

</div>

<!-- </section> -->
<div class="ftr">
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

            </div>

</body>

</html>