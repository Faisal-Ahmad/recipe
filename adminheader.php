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
        <a class="navbar-brand" href="admin.php">MyReciepe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav" style="margin-left:20px">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="profileLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="profileLink">
                        <a class="dropdown-item" href="admin.php">View</a>
                        <a class="dropdown-item" href="adminpasschange.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="postlink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                       Posts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="postlink">
                        <a class="dropdown-item" href="approve.php">Approve</a>
                        <a class="dropdown-item" href="delete.php">Delete</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="postlink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Chatagory
                    </a>
                    <div class="dropdown-menu" aria-labelledby="postlink">
                        <a class="dropdown-item" href="addcategory.php">Add New</a>
                        <a class="dropdown-item" href="categoryupdate.php">Edit</a>
                    </div>
                </li>
            </ul>
        </div>
        <button class="btn btn-primary" onclick="location.href='sclose.php'">Logout</button>
    </nav>
