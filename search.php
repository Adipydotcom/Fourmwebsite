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
    <link rel="stylesheet" href="style.css">

    <!-- font link -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <title>ASKHERE/SEARCH</title>
    <style>
        .container {
            margin-top: 6rem;
            /* border: 2px solid red; */
        }

        .container h4 {
            text-align: center;
            margin-bottom: 0px;
        }
        #searchitem{
            /* border: 2px solid red; */
            display: flex;
            justify-content: center;

        }
    </style>
</head>

<body>

    <!-- navbar section -->

    <?php include 'head.php'; ?>
    <div class="container">
        <h4>Your Search Result for " <?php echo $_GET['search'] ?> "</h4>
        <div  id="searchitem">
            <div class="media d-flex  mt-3 ">
                <div class="m_body my-1">
                    <?php
                    $src_rst_not_found = true;
                    $src = $_GET['search'];
                    $sql = "select * from `queans` where match (qustions,description) against ('$src')";
                    $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            $src_rst_not_found = false;
                            $src_rst = false;
                            $que = $row['qustions'];
                            $des  = $row['description'];
                            $queid = $row ['id'];
                            echo
                            '<h6>
                                <a href="thread.php?thread_list_id='.$queid.'"> '.$que.'</a>
                            </h6>
                        <p> '.$des.' </p>';
                        }
                    if($src_rst_not_found)
                    {
                        echo
                        '<div class="container">
                            <h1> NO RESULT FOUND </h1>
                        </div>';
                    }
                   ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

