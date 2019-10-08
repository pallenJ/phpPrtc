<?php

$dsn = "mysql:host=localhost;port=3306;dbname=php_prtc;charset=utf8";
try {
    $db = new PDO($dsn, "pjm", "pjmpjm");
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "데이터베이스 연결 성공!!<br/>";
} catch (PDOException $e) {
    echo $e->getMessage();
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
<h1 class="text-center">자유게시판</h1>
<hr>