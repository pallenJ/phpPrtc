<?php
//header('Content-Type: text/html; charset=utf-8');
include("dbconnect.php");
  function tdValueTrs($variable,$tdValue){
    $result = $tdValue;
    $tdTime = strtotime($tdValue);
    
    switch ($variable) {
      case 3:
      case 4:

        
        $tdDay = strtotime(date("Y-m-d",$tdTime));
        $nowDay = strtotime(date("Y-m-d"));
        $nowTime = strtotime(date("Y-m-d H:i:s"));
        $dayDiff = ($nowDay-$tdDay);
        

        if(($dayDiff)>=60*60*24*7){
          $result = date("Y - m - d",$tdTime);
        }else if($dayDiff>=60*60*24){
          $result = ($dayDiff/(60*60*24))."일 전";
        }else {
          if($nowTime-$tdTime<3600&&$nowTime-$tdTime>=60){
            $result = floor(($nowTime-$tdTime)/60)."분 전";
          }else if(60>$nowTime-$tdTime&&$nowTime-$tdTime>=0){
            $result = "방금전";
          }else{
            $result = date("H:i",strtotime($tdValue));
          }
        }
        break;
        default:
        return $tdValue;
    }


    return $result;
  }




?>


<script src="/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" id="b-css" href="https://bootswatch.com/4/sketchy/bootstrap.css">
<link rel="stylesheet" id="b-min-css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
<link rel="stylesheet" id="v-scss" href="https://bootswatch.com/4/sketchy/_variables.scss">
<link rel="stylesheet" id="b-scss" href="https://bootswatch.com/4/sketchy/_bootswatch.scss">

<!-- 합쳐지고 최소화된 최신 자바스크립트 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<br>
<h1 class="text-center"><a href="../board/list.php">자유게시판</a></h1>
<div align="right" class="container"> 
<a class = "btn btn-outline-primary btn-sm" href="../member/register.php">회원가입</a>
<a class = "btn btn-outline-info btn-sm" href="../member/login.php">로그인</a>
</div>
<hr>