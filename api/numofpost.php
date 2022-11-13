<?php
require "../dbBroker.php";
require  "../model/post.php";
session_start();

$resp = "You posted ".Post::getPostByUserId($_SESSION['user_id'], $conn)->num_rows." posts!";
echo $resp;

?>