
<?php

    

    
    $acc_aval = true;
    $loggedin = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // connect to database
        include "parts/_db_connect.php";
        // taking thing from form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // user credentials check

        $sql_aval = "SELECT * FROM  Login  WHERE `username` = '$username'";

        $rejult_aval = mysqli_query($conn,$sql_aval);

        $num_user_same_cred = mysqli_num_rows($rejult_aval);

        if($num_user_same_cred == 1)
        {

            // check password with hash password stored in database 
            while($row = mysqli_fetch_assoc($rejult_aval))
            {
                if(password_verify($password,$row['password']))
                {
                    $acc_aval  = true;
                    $loggedin = true;

                    // succesfully logged in 

                    session_start();

                    $_SESSION['loggedIn'] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;

                    // Go to welcome page

                    header("location:/MyLoginSystem/welcome.php");
                }
                else
                {
                    $acc_aval  = false;
                    $loggedin = false;
                }
            }
        }
        else
        {
            $acc_aval  = false;
            $loggedin = false;
        }
    }



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body>

    <!-- Navbar  -->
    <?php include 'parts/_nav_login.php' ?>

    <div class="container my-4 ">

        <div class="bg-dark text-secondary px-4 py-5  my-4">

                <h1 class="display-7 fw-bold text-white my-4 text-center">Login  </h1>

                <form action="/MyLoginSystem/login.php" method="post">
                    <div class="mb-3">
                        <label for=username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                        
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>

                    <button type="submit" class="btn btn-primary" >Login</button>
                </form>

        </div>

    </div>

    <!-- Showing message as per detail -->
    
    <?php
    
        if(!$acc_aval){
            echo '
                <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Failed !</strong> Invalid credentials.
                            <strong><a href="signup.php">SignUp</a></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
                ';
        }
    ?>

    <!-- bottom -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,64L60,69.3C120,75,240,85,360,106.7C480,128,600,160,720,149.3C840,139,960,85,1080,69.3C1200,53,1320,75,1380,85.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z" ></path></svg>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>