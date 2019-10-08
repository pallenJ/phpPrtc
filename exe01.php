<?php

?>
<?php
namespace date1;
class date1{

    function datenow(){
        echo "현재 날짜 : ". date("Y-m-d")."<br>";
        echo "현재 시간 : ". date("H:i:s")."<br>";
    }
}


?>
<?php
echo "<h1> PHP 연습 </h1>";
namespace date2;

function datenow(){
    echo "현재 일시 : ". date("Y-m-d H:i:s")."<br>";//mysql과 java와 거의 동일
}
use \date1\date1 as d1;
$date_1 = new d1;
$date_1->datenow();
\date2\datenow();
echo "<h3> 문자열 </h3>";
echo "addslashes() : ".addslashes("I'm a Boy")."<br>";//보통 역슬래시가 필요한 문자열 앞에 자동으로 넣음
echo "stripslashes() : ".stripslashes(addslashes("A'B'C'D'\\"))."<br>";//역슬래시 제거
echo "implode() : ".implode("&",array("true","false",1,0,"success","fail"))."<br>";//배열을 문자열로, 각 값 사이에 들어갈 특정 값을 정할 수 있음
echo "explode() : [".implode(" , ",explode("&","true&false&1&0&success&fail"))."]";//split과 같다고 보면 됨
?>