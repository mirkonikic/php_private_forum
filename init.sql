/*
:register, :login, :Create_own_post, :Read_posts, :Update_own_post, :Delete_own_post, :like_posts, :comment, :reply_to_comment

*/

-- User -> UserID
CREATE TABLE `Users` 
(
	`userID` INT(16) NOT NULL UNIQUE AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,                                                -- -> bcrypt hash of password
    `admin` BIT DEFAULT 0,
    `email`	VARCHAR(50) NOT NULL
);

-- Post -> PostID, ..., UserID(author)
CREATE TABLE `Posts` 
(
	`postID` INT(16) NOT NULL UNIQUE AUTO_INCREMENT,
    `postTitle` VARCHAR(50) NOT NULL,
    `postTime` DATETIME NOT NULL,
    `NumOfLikes` INT(16) NOT NULL,
    `postContents` VARCHAR(500) NOT NULL,
    `postAuthor` INT(16) FOREIGN KEY User(userID),
);

-- Like -> UserID, PostID (userID liked postID)
CREATE TABLE `Likes` 
(
    -- najbolje da njih dva budu i prim key jer onda ne moze da se ponavlja
    `likedBy` INT(16) FOREIGN KEY User(userID),
    `likedPost` INT(16) FOREIGN KEY Post(postID),
);

-- Comm -> CommID, UserID, PostID, Time, Content, ReplCommID(replied to)
CREATE TABLE `Comments` 
(
	`commentID` INT(16) NOT NULL UNIQUE AUTO_INCREMENT,
    `commentContents` VARCHAR(200) NOT NULL,
    `commentTime` DATETIME NOT NULL,
    `commentAuthor` INT(16) FOREIGN KEY User(userID) NOT NULL,
    `commentPost` INT(16) FOREIGN KEY Post(postID) NOT NULL,
    `commentReply` INT(16) FOREIGN KEY Comment(commentID)       -- can be null, ako nije odgovor
);

