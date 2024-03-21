<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./inc/css/index.css">
    <title>PWD-MAN - Reset Password</title>
</head>
<body>
    <header>
        <h1>PWD-MAN</h1>
    </header>
    
    <main>
        <?php 
        if(isset($_SESSION['reset_status'])){ echo $_SESSION['reset_status'];?>
            <form action="./inc/phpmods/resetpwdmod.php" method="post" class="rst-mail form-control">
                <h4 class="mb-3">Enter the Verification Code sent to your Email</h4>
                <input class="form-control mb-2" type="text" name="code" placeholder="Enter Code">
                <input class="btn-sm btn-primary" type="submit" name="verify">
                <input class="btn-sm btn-warning" type="submit" name="resetpwdcancel" value="Cancel">
            </form>
        <?php }
        elseif(isset($_SESSION['reset_pwd'])){
            ?>
            <form action="./inc/phpmods/resetpwdmod.php" method="post" class="rst-mail form-control">
                <h4 class="mb-3">Enter New Password</h4>
                <input class="form-control mb-2" type="text" name="pwd" placeholder="New Password">
                <input class="btn-sm btn-primary" type="submit" name="resetpwd">
                <input class="btn-sm btn-warning" type="submit" name="resetpwdcancel" value="Cancel">
            </form>

            <?php
        }
        else {
            if(isset($_SESSION['reset_fail'])) { ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>!</strong> <?php echo $_SESSION['reset_fail']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        
                <?php
                    unset($_SESSION['reset_fail']);
                }
            ?>
            <form action="./inc/phpmods/resetpwdmod.php" method="post" class="rst-mail form-control">
                <h4 class="mb-3">Email Reset</h4>
                <input class="form-control mb-2" type="email" name="email" placeholder="Enter Email" required>
                <input class="btn-sm btn-primary" type="submit" name="send">
                <a class="btn-sm btn-warning" href="./index.php">Cancel</a>
            </form>
        <?php } ?>

        </main>
    <footer>
        <p>&copyValdazMedia</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>