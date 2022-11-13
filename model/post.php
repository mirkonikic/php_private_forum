<?php

class Post{
    public $postID;
    public $title;
    public $time;
    public $numOfLikes;
    public $contents;
    public $author;


    public function __construct($id = null, $title=null, $time = null, $contents = null, $author = null){
        $this->postID = $id;
        $this->title = $title;
        $this->time = $time;
        $this->contents = $contents;
        $this->author = $author;
    }

    //Create post
    public static function add($title, $time, $contents, $author, mysqli $conn)
    {

        $q = "INSERT INTO posts(postTitle, postTime, postContents, postAuthor) values('$title', '$time', '$contents',  '$author')";
        return $conn->query($q);
    }

    //Read post
        //all posts
        public static function getPosts(mysqli $conn)
        {
            $q = "SELECT * FROM posts";
            return $conn->query($q);
        }
        //id post
        public static function getPost($postid, mysqli $conn)
        {
            $q = "SELECT * FROM posts WHERE postID=$postid";
            $myArray = array();
            if ($result = $conn->query($q)) {

                # while ($row = $result->fetch_array(1)) {
                #     $myArray[] = $row;
                # }
            }
            return $result;
        }
        //users posts
        public static function getPostByUserId($userid, mysqli $conn)
        {
            $q = "SELECT * FROM posts WHERE postAuthor=$userid";
            $myArray = array();
            if ($result = $conn->query($q)) {

                # while ($row = $result->fetch_array(1)) {
                #     $myArray[] = $row;
                # }
            }
            return $result;
        }
    //Update post
        //by id
        public static function update($title, $contents, $postid, mysqli $conn)
        {
            $q = "UPDATE posts set postTitle='$title', postContents='$contents' where postID=$postid";
            return $conn->query($q);
        }   
    //Delete post
        //by id
        public static function deleteById($postid, mysqli $conn)
        {
            //check if admin or if users post
            $q = "DELETE FROM posts WHERE postID=$postid";
            return $conn->query($q);
        }
        //by user id
        public static function deleteByUserId($user_id, mysqli $conn)
        {
            //check if admin or if users post
            $q = "DELETE FROM posts WHERE postAuthor=$user_id";
            return $conn->query($q);
        }
}
?>