<?php

    // connect to database

    include "parts/_db_connect.php";

    session_start();
    // ager user logged in nhii hai to login page per bhej do
    if(!isset($_SESSION['loggedIn'])){

        header("location:/MyLoginSystem/login.php");
        exit;
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Welcome Page</title>
</head>

<body>

    <!-- Navbar  -->

    <?php include 'parts/_nav_welcome.php' ?>

    <div class="container my-4 ">

        <div class="bg-dark text-secondary px-4 py-5  my-4">

            <div class="container">
                <h1 class="display-7 fw-bold text-white my-4 text-center">Welcome </h1>
                <h2 class="display-7 fw-bold text-white my-4 text-center"  ><?php echo $_SESSION['username']?></h2>
                
                <h1 class="display-7 fw-bold text-white my-4 text-center">
                    <img src="/MyLoginSystem/parts/welcome.png" alt="" width="300px" height="300px">
                    <img   class="text-center" src="/MyLoginSystem/parts/selfie.png" alt="" width="300px" height="300px">
                    <img   class="text-center" src="/MyLoginSystem/parts/reading.png" alt="" width="300px" height="300px">
                </h1>

                
                <h1 class="display-7 fw-bold text-white my-4 text-center"><a href="logout.php"><button type="button" class=" btn btn-outline-light btn-lg px-4 text-center" >Logout</button></a></h1>
            </div>
            
        </div>

    </div>

    <!-- bottom -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,106.7C480,128,600,160,720,149.3C840,139,960,85,1080,69.3C1200,53,1320,75,1380,85.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" ></path></svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>