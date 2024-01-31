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
        <h1>Passwd Dashboard</h1>
    </header>

    <main>
        <div class="categories mt-3">
            <input class="btn-sm btn-warning" type="button" value="Website"/>
            <input class="btn-sm btn-warning" type="button" value="Device"/>
            <input class="btn-sm btn-warning" type="button" value="Social Media"/>
        </div>

        <div class="pwds mt-3">
            <div class="pwd">
                <h2>ENTRIES</h2>
            </div>

            <div class="pwd">
                <h3 class="pwd-title fs-3">Facebook</h3>
                <p class="pwd-uname-text fs-6">Username</p>
                <input class="form-control mb-3" type="text" value="valdaz007">
                <p class="pwd-text fs-6">Password</p>
                <input class="form-control mb-3" type="password" value="valdaz007">
                <input class="radio" type="checkbox" onclick="viewPwd()">
                <p>Show Password</p>
            </div>

            <div class="pwd">
                <h3 class="pwd-title fs-3">LinkedIn</h3>
                <label class="pwd-uname-text fs-6">Username</label>
                <input class="form-control mb-3" type="text" value="valdaz007">
                <p class="pwd-text fs-6">Password</p>
                <input class="form-control mb-3" id="" type="password" value="valdaz007"/>
                <input class="radio" type="checkbox" onclick="viewPwd()">
                <p>Show Password</p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copyValdazMedia</p>
    </footer>
</body>
</html>