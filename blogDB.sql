drop database if exists blogDB;
drop user if exists 'bloguser'@'localhost';

create database blogDB;
use blogDB;

create table users(
   userID int AUTO_INCREMENT,
   username varchar(30) not null, index(username),
   lastname varchar(50),
   firstname varchar(30),
   passwd varchar(30),
   email varchar(255),
   urole varchar(30),
   lastModified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   primary key(userID)
)engine=innodb;

CREATE TABLE posts (
    postID INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    publication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    userID INT,
    FOREIGN KEY (userID) REFERENCES users(userID)
    photoSeqNum INT AUTO_INCREMENT KEY
);

create user 'bloguser'@'localhost' identified by 'blogpass';
grant all privileges on blogDB.* to 'bloguser'@'localhost';

insert into users(username,lastname,firstname,passwd,email,urole)
   values('jsmith','Smith','Joe','buddy','jsmith@gmail.com','admin');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('bwilliams','Williams','Brian','pass123','bwilliams@gmail.com','user');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('mjones','Jones','Mike','pass1234','mjones@gmail.com','user');

insert into users(username,lastname,firstname,passwd,email,urole)
   values('mjohnson','Johnson','Monica','password','mjohnson@gmail.com','user');

INSERT INTO posts (title, content, userID) VALUES
    ('First Post', 'This is the content of the first post.', 1),
    ('Second Post', 'This is the content of the second post.', 2),
    ('Third Post', 'This is the content of the third post.', 1);
