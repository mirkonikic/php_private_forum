<?php
require "../dbBroker.php";
require  "../model/like.php";
session_start();

if(isset($_GET['id'])){

    if(Like::getLike($_GET['id'], $_SESSION['user_id'], $conn)->num_rows == 1)
    {   
        $resp = "Like: ";
        $clr = "lightgray";
        Like::deleteById($_GET['id'], $_SESSION['user_id'], $conn);
    }
    else
    {
        $resp = "Liked: ";
        $clr = "gray";
        Like::add($_GET['id'], $_SESSION['user_id'], $conn);
    }

    $rs = Like::getLikesByPostId($_GET['id'], $conn);
    echo $resp.$rs->num_rows.";".$clr;
}