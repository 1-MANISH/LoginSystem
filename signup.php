<?php

   // connect to database
   include "parts/_db_connect.php";

   $userExist = false;
   $userPassMatch = true;
   $AccCreated = false;


   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
    
        // getting things from form

        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];


        // User existance check
        $sql = "SELECT * FROM `Login` WHERE `username` = '$username'";
        $rejult = mysqli_query($conn,$sql);
        $num_of_user_same_name = mysqli_num_rows($rejult);

        if($num_of_user_same_name>0)
        {
            $userExist = true;
        }
        else
        {
            // now check for password and confirm password match
            if($password != $confirmpassword)
            {
                $userPassMatch = false;
            }
            else
            {
                // now insert data & show success

                // creating hash for password
                $hash = password_hash($password,PASSWORD_DEFAULT);

                $sql_insert = "INSERT INTO `Login` ( `username`, `password`, `curr_date`) VALUES ('$username', '$hash', current_timestamp());";

                $rejult_insert = mysqli_query($conn,$sql_insert);

                if($rejult_insert)
                {
                    $AccCreated = true;
                }
                else
                {
                    $AccCreated = false;
                }


            }

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

    <title>SignUp Page</title>
</head>

<body>

    <!-- Navbar  -->
    <?php include 'parts/_nav_signup.php' ?>

    <div class="container my-4 ">

        <div class="bg-dark text-secondary px-4 py-5  my-4">

                <h1 class="display-7 fw-bold text-white my-4 text-center">SignUp  </h1>

                <form action="/MyLoginSystem/signup.php" method="post">
                    <div class="mb-3">
                        <label for=username" class="form-label">Username</label>
                        <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                        
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" maxlength="25" class="form-control" id="password" name="password" >
                    </div>

                    <div class="mb-3">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>

        </div>

    </div>

    <!-- Showing messages as per details -->
    <?php

        if($AccCreated){
            echo '
                <div class="container">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success !</strong> Account created successfully .
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
                ';
        }
        if($userExist){
            echo '
                <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Failed !</strong> Username Already exist.Try with another username 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
                ';
        }
        if(!$userPassMatch){
            echo '
                <div class="container">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Failed !</strong> Password do not match. Type password correctly.
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