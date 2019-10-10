<?php
include("../include/header.php");

$flag = true;

$login_id = $_POST["login_id"];
$login_pw = $_POST["login_pw"];

echo "id: ".$login_id."<br/>"."pw:".$login_pw;

header("Location:../board/list.php");
