<?php
require "../dbBroker.php";
require  "../model/post.php";
session_start();

Post::deleteByUserId($_SESSION['user_id'], $conn);
echo Post::getPostByUserId($_SESSION['user_id'], $conn)->num_rows;
?>