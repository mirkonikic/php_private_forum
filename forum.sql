CREATE TABLE `comments` (
  `commentID` int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `commentContents` varchar(200) NOT NULL,
  `commentTime` datetime(5) NOT NULL,
  `commentAuthor` int(16) NOT NULL,
  `commentPost` int(16) NOT NULL,
  `commentReply` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `likes` (
  `likedBy` int(16) NOT NULL,
  `likedPost` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `posts` (
  `postID` int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `postTitle` varchar(50) NOT NULL,
  `postTime` datetime NOT NULL,
  `postContents` varchar(500) NOT NULL,
  `postAuthor` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `userID` int(16) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `comments`
  ADD KEY `author_user_fk` (`commentAuthor`),
  ADD KEY `post_commented_fk` (`commentPost`),
  ADD KEY `replied_to_fk` (`commentReply`);

ALTER TABLE `likes`
  ADD KEY `user_fk_liked_by` (`likedBy`),
  ADD KEY `posts_fk_liked_post` (`likedPost`);

ALTER TABLE `posts`
  ADD KEY `foreign_key` (`postAuthor`);

ALTER TABLE `comments`
  ADD CONSTRAINT `author_user_fk` FOREIGN KEY (`commentAuthor`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `post_commented_fk` FOREIGN KEY (`commentPost`) REFERENCES `posts` (`postID`),
  ADD CONSTRAINT `replied_to_fk` FOREIGN KEY (`commentReply`) REFERENCES `comments` (`commentID`);

ALTER TABLE `likes`
  ADD CONSTRAINT `posts_fk_liked_post` FOREIGN KEY (`likedPost`) REFERENCES `posts` (`postID`),
  ADD CONSTRAINT `user_fk_liked_by` FOREIGN KEY (`likedBy`) REFERENCES `users` (`userID`);

ALTER TABLE `posts`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`postAuthor`) REFERENCES `users` (`userID`);
COMMIT;