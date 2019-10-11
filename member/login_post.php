<?php
include("../include/header.php");

$prevPage = $_SERVER['HTTP_REFERER'];

$login_id = $_POST["login_id"];
$login_pw = $_POST["login_pw"];

$query = "SELECT A.pw, A.mno, A.email, A.name FROM members A WHERE A.id = '{$login_id}'";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_NUM);
if(count($result)==0){
    echo "<script>alert('없는 아이디 입니다')</script>";
    header('location:'.$prevPage);
}else if($result[0][0]!=md5($login_pw) ){
    echo "<script>alert('비밀번호가 틀렸습니다.')</script>";
    header('location:'.$prevPage);
}else{
    
    $_SESSION['loginID'] = $login_id;
    $_SESSION['loginMno'] = $result[0][1];
    $_SESSION['loginEMAIL'] = $result[0][2];
    $_SESSION['loginNAME'] = $result[0][3];

    //echo "id: ".$login_id."<br/>"."pw:".$login_pw;
    header("Location:../board/list.php");
}


