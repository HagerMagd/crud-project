<?php
$servername='localhost';
$username='root';
$password='';
$dbname='crud';
//creat connection 
$conn=mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("connection falid : " . mysqli_error($conn));
}
