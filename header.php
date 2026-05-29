<?php
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Date: Tue, 03 Apr 2018 19:03:12 GMT');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Web App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container">
                <a class="navbar-brand" href="#">CRUD Web-App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="db.php?index">Home</a></li>
                  <?php if(isset($_SESSION['id']))
                   { ?>
                          <li class="nav-item"><a class="nav-link <?php if($page=='myprofile') echo 'active'?>" href="db.php?profile">My Profile</a></li>
                          <li class="nav-item"><a class="nav-link" href="db.php?logout">Logout</a></li>
                 <?php  } 
                 else
                { ?>
                
                    <li class="nav-item"> <a class="nav-link <?php if($page=='login') echo 'active'?>" href="login.php">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($page=='signup') echo 'active'?>" href="signup.php">Sign Up</a></li>
                       
                 <?php   }
                     ?>
                        
                        
                </ul>
                </div>
            </div>
            </nav>
        </div>
    </div>