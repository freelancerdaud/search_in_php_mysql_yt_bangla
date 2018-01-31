<?php
$con = new PDO('mysql:dbname=search;host=localhost', 'root', '');
$con->query("
  create table people (
    id int(11) auto_increment primary key,
    name varchar(30) not null,
    email varchar(30) not null
  ) 
");