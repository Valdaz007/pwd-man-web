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
    <link rel="stylesheet" href="./inc/css/dashboard.css">
    <script src="./inc/js/script.js" defer></script>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="head-wrapper">
            <h1>Passwd Dashboard</h1>
            <h3>
                <form action="./inc/phpmods/signoutmod.php">
                    <input class="btn-sm btn-warning fw-700" type = "submit" value="Sign Out">
                </form>
            </h3>
        </div>
    </header>

    <main>
        <?php
        if(isset($_SESSION['entry_status'])) {
        ?>
            
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>!<?php echo $_SESSION['entry_status']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
            unset($_SESSION['entry_status']);
        }
        
        elseif(isset($_SESSION['delete_status'])) {
        ?>
            
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>!</strong> <?php echo $_SESSION['delete_status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
            unset($_SESSION['delete_status']);
        }
        ?>

        <div class="pwds mt-3 mb-5">
            <div class="pwd">
                <h2>ENTRIES</h2>
                <a href="./addentry.php"><img src="./inc/img/add.png" alt=""></a>
            </div>

            <?php
                //? Get Pwd Entries From DB
                $sql = "SELECT * FROM `tbl_accounts` WHERE `acct_uid` = '".$_SESSION['uid']."';";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="pwd">
                <form class="title-cont" action="./inc/phpmods/entrymod.php" method="POST">
                    <h3 class="pwd-title fs-4"><?php echo $row['acct_title']; ?></h3>
                    <button type="submit" name="delete" value="<?php echo $row['acct_id']; ?>">
                        <img src="./inc/img/delete.png" alt="delete icon">
                    </button>
                </form>
                <p class="pwd-uname-text fs-6">Username</p>
                <input class="form-control mb-3" type="text" value="<?php echo $row['acct_uname']; ?>" readonly>
                <p class="pwd-text fs-6">Password</p>
                <input class="form-control mb-3" type="password" value="<?php echo $row['acct_upwd']; ?>" readonly>
                <input class="radio" type="checkbox" onclick="viewPwd()">
                <p>Show Password</p>
            </div>

            <?php
                    }

                    mysqli_close($conn);
                }
                else {
                    echo "<h2>No Pwd Entry!";
                }
            ?>
        </div>
    </main>

    <footer>
        <p>&copyValdazMedia</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>