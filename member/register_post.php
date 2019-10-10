<?php

include("../include/dbconnect.php");

$register_id = $_POST["register_id"];
$register_name = $_POST["register_name"];
$register_email = $_POST["register_email"];
$register_pw   = $_POST["register_pw"];

//echo "<h1> ID:".$register_id."<br/>name:".$register_name."<br/>E-mail:".$register_email."<br/>password:".md5($register_pw)."<h1>";
$query = "INSERT INTO members(id,name,email,pw) VALUES(?,?,?,?)";
$stmt = $db->prepare($query);
$stmt->execute([$register_id,$register_name,$register_email,md5($register_pw)]);

header("Location:../board/list.php");