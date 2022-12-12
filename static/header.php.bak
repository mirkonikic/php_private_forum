<!-- trebace za session_start, da prikazemo ko je ulogovan npr -->
<?php
require_once "dbBroker.php";

if(!isset($_SESSION)) session_start();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Radi?</title>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
    </head>
    <body>

        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand mt-2 mt-lg-0" href="#"> 
                        <p style="margin:0px">MN Forum</p>
                    </a>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
<?php if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == ''):?>
                        <li class="nav-item"> <a class="nav-link" href="index.php">Main</a> </li> 
                        <!-- <li class="nav-item"> <a class="nav-link" href="#" onclick="javascript:alert('You must first log in!');return false;">Forum</a> </li> -->
<?php else:?>
                        <li class="nav-item"> <a class="nav-link" href="forum.php">Forum</a> </li> 
                        <li class="nav-item"> <a class="nav-link" href="new_post.php">NewPost</a> </li> 
                        <li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li> 
<?php endif;?>                        
                        <li class="nav-item"> <a class="nav-link" href="about.php">About</a> </li>
                    </ul>
                </div>
                
<?php if (empty($_SESSION['loggeduser']) || $_SESSION['loggeduser'] == ''):?>
                <div class="d-flex align-items-center">
                    <a href="index.php">
 
<!-- todo: javascript tab se otvori i ako prodje refreshuje se stranica -->

                        <p style="margin:0px">Login/Register</p>
                    </a> 

                </div>
<?php else:?>
            <div class="d-flex align-items-center">
                <div class="btn-group dropstart">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/default_pfp.jpg" class="rounded-circle" height="25"     alt="Black and White Portrait of a Man" loading="lazy" />
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="profile.php">My profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
                </div>
            </div>              
<?php endif;?>
            </div>
            </nav>
        </header>













