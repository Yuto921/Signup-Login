create database データベース名;

grant all on データベース名.* to ユーザー名@localhost identified by 'パスワード';

use データベース名

create table users (
  id int not null auto_increment primary key,
  email varchar(255) unique,
  password varchar(255),
  created datetime,
  modified datetime
);

desc users;