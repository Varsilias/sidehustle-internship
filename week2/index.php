<?php

    if (isset($_SESSION['isLoggedIn'])) {
        unset($_SESSION);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <title>Login System</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center px-4">
            <div class="col-md-4 col-sm-12 justify-content-center px-4 mt-4 py-5 bg-white shadow-lg">
                <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            <a href="register.php" class="text-dark">
                                Register
                            </a>
                        </button>

                        <button class="btn btn-primary px-4 ml-5" type="submit">
                            <a href="login.php" class="text-dark">
                                Login
                            </a>
                        </button>

                   </div>
            </div>    
        </div>
    </div>
</body>
</html>