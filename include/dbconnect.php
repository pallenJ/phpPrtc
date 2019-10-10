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
