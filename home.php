
<?php

    // connect to database
    include "parts/_db_connect.php"
    
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home Page</title>
</head>

<body>

    <!-- Navbar  -->
    <?php include 'parts/_navbar.php'?>

    <div class="container my-4 " >

        <div class="bg-dark text-secondary px-4 py-5 text-center my-4" >
            <div class="py-5">
                <h1 class="display-5 fw-bold text-white">Welcome Welcome </h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mb-4">Welcome to This page. This is home page of my website.Your are most welcome.Thanku for visiting the  page. </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="login.php"><button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Login</button></a>
                        <a href="signup.php"><button type="button" class="btn btn-outline-light btn-lg px-4">SignUp</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- bottom -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,106.7C480,128,600,160,720,149.3C840,139,960,85,1080,69.3C1200,53,1320,75,1380,85.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" ></path></svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>