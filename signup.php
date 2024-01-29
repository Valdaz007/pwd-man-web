<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./inc/css/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <header>
        <h1>PWD-MAN</h1>
    </header>

    <main>
        <?php 
            if(isset($_SESSION['status'])) {

            ?>
            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
                unset($_SESSION['status']);
            }
        ?>
        <div class="login-form-wrapper">
            <form class="form-control" action="./inc/phpmods/signupmod.php" method="POST">
                <h2 class="mt-2">Sign Up</h2>
                <input class="form-control mb-2" type = "text" name = "uemail" placeholder="Email" required>
                <input class="form-control mb-2" type = "text" name = "fname" placeholder="First Name" required>
                <input class="form-control mb-2" type = "text" name = "lname" placeholder="Last Name" required>
                <input class="form-control mb-2" type = "text" name = "uname" placeholder="Username" required>
                <input class="form-control mb-2" type = "password" name = "upwd" placeholder="Password" required>
                <input class="btn btn-primary" type = "submit" name = "Sumit">
                <a class="btn btn-warning" href="./index.php">Cancel</a>
            </form>
        </div>
    </main>

    <footer>
        <p>&copyValdazMedia</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>