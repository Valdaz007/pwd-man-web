<?php
    session_start();
    if (!isset($_SESSION['uid'])) {
        header("Location: ./index.php");
        exit();
    }

    include './inc/phpmods/dbconnect.php';
    $conn = dbconxn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./inc/css/addentry.css">
    <title>PWD-MAN - Add Entry</title>
</head>
<body>
    <header>
        <h1>PWD-MAN</h1>
    </header>

    <main>
        <div class="login-form-wrapper">
            <form class="form-control" action="./inc/phpmods/entrymod.php" method="POST">
                <h2 class="mt-2">Add Entry</h2>
                <input class="form-control mb-2" type = "text" name = "title" placeholder="Title" required>
                <input class="form-control mb-2" type = "text" name = "uname" placeholder="Username">
                <input class="form-control mb-2" type = "text" name = "upwd" placeholder="Password" required>
                <input class="form-control mb-2" type = "text" name = "email" placeholder="Email">
                <input class="form-control mb-2" type = "text" name = "type" placeholder="Type" required>
                <input class="btn btn-primary" type = "submit" name = "submit">
                <a class="btn btn-warning" href="./index.php">Cancel</a>
            </form>
        </div>
    </main>

    <footer>
        <p>&copyValdazMedia</p>
    </footer>
</body>
</html>