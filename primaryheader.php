<!doctype html>
<html lang="en">

<head>
    <title>Reciepe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/insidestyles.css">
    <script src="./assets/js/functions.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top  justify-items-between">
        <a class="navbar-brand" href="user.php">MyReciepe</a>
        <div class="collapse navbar-collapse" id="navbarNav">
                <form  class="form-inline">
                    <input class="form-control mr-sm-2" id="searchkey" type="search" onkeyup="search()" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="button" onclick="location.href='home.php'">Search</button>
                </form>
        </div>
        <button class="btn btn-success" onclick="location.href='signup.php'">Signup</button>
    </nav>
