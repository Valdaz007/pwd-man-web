<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./inc/css/index.css">
    <title>PWD-MAN</title>
</head>
<body>
    <header>
        <h1>PWD-MAN</h1>
    </header>

    <main>
        <div class="login-form-wrapper">
            <form class="form-control" action="./inc/phpmods/signinmod.php" method="POST">
                <h2 class="mt-2">Login</h2>
                <input class="form-control mb-2" type = "text" name = "uname" placeholder="Username" required>
                <input class="form-control mb-2" type = "password" name = "upwd" placeholder="Password" required>
                <input class="btn btn-primary" type = "submit" name = "Sumit">
                <a href="./signup.php">I don't have an account</a>
            </form>
        </div>
    </main>

    <footer>
        <p>&copyValdazMedia</p>
    </footer>
</body>
</html>