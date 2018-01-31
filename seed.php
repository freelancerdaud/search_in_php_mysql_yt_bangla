<?php 
$con = new PDO('mysql:host=localhost;dbname=search', 'root', '');
$statement = $con->prepare(" 
insert into people (name, email)
values ('sumon', 'sumon@gmail.com'),
('sarwar', 'sarwar@gmail.com'),
('tasnia', 'tasnia@yahoo.com'),
('tofael', 'tofael@yahoo.com'),
('kayes', 'kayes@outlook.com'),
('palash', 'palash@live.com'),
('milky', 'milky@gmail.com')
 ");

$statement->execute();



