<?php

class Like{
    public $postID;
    public $userID;


    public function __construct($postID = null, $userID = null){
        $this->postID = $postID;
        $this->userID = $userID;
    }

    //Create post
    public static function add($postid, $userid, mysqli $conn)
    {

        $q = "INSERT INTO likes(likedPost, likedBy) values('$postid', '$userid')";
        return $conn->query($q);
    }

    //Read post
        //all posts
        public static function getLike($postid, $userid, mysqli $conn)
        {
            $q = "SELECT * FROM likes WHERE likedPost=$postid AND likedBy=$userid";
            return $conn->query($q);
        }
        //id post
        public static function getLikesByPostId($postid, mysqli $conn)
        {
            $q = "SELECT * FROM likes WHERE likedPost=$postid";
            $myArray = array();
            if ($result = $conn->query($q)) {

                # while ($row = $result->fetch_array(1)) {
                #     $myArray[] = $row;
                # }
            }
            return $result;
        }
        //users posts
        public static function getLikesByUserId($userid, mysqli $conn)
        {
            $q = "SELECT * FROM likes WHERE likedBy=$userid";
            $myArray = array();
            if ($result = $conn->query($q)) {

                # while ($row = $result->fetch_array(1)) {
                #    $myArray[] = $row;
                # }
            }
            return $result;
        }   
    //Delete post
        //by id
        public static function deleteById($postid, $userid, mysqli $conn)
        {
            //check if admin or if users post
            $q = "DELETE FROM likes WHERE likedPost=$postid AND likedBy=$userid";
            return $conn->query($q);
        }
}
?>