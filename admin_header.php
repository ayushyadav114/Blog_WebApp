<?php
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Date: Tue, 03 Apr 2018 19:03:12 GMT');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crud Web App</title>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<div class="container-fluid">
        <div class="row">

            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="db.php?index">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?profile">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?vu">Verified users</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?nvu">Non-Verified users</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?vb">Verified blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?nvb">Non-Verified blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?analysis">Blog Analysis</a></li>
                    <li class="nav-item"><a class="nav-link" href="db.php?logout">Logout</a></li>
                </ul>
                </div>
            </div>
            </nav>
    </div>
</div>