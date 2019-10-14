<?php
//header('Content-Type: text/html; charset=utf-8');
session_start();
include("dbconnect.php");

class Criteria{
    public $page;
    public $amt = 15;

    public function setPage($pg){
      $this->page = $pg;
    }
    public function setAmt($amount){
      $this->amt = $amount;
    }
    public function getStart(){
      return ($this->page-1)*($this->amt);
    }

}

class Pagenation{
  public $startNum = 1;
  public $endNum = 10;
  public $next = true;
  public $prev = false;

  public function pagingCal(Criteria $cri, $allCnt, $showPage){
    $maxPage = ceil($allCnt/(real)$cri->amt) ;
    $this->startNum = 1+ floor(($cri->page-1)/$showPage)*$showPage;
    $this->endNum   = min($this->startNum+$showPage-1, $maxPage);
    $this->prev = !($this->startNum==1);
    $this->next = $maxPage>($this->endNum);
  }
}

function htmlDecode($str){
  return 
  str_replace("&lt;","<",
  str_replace("&gt;",">",
  str_replace("&quot;","\"",
  str_replace("&#034;","\"",
  str_replace("&#039;","\'",
  str_replace("&nbsp;"," ",
  str_replace("&amp;","&",

  $str
  )))))));
}

function tdValueTrs($variable, $tdValue)
{
  
  $result = $tdValue;
  $tdTime = strtotime($tdValue);

  switch ($variable) {
    case 3:
    case 4:


      $tdDay = strtotime(date("Y-m-d", $tdTime));
      $nowDay = strtotime(date("Y-m-d"));
      $nowTime = strtotime(date("Y-m-d H:i:s"));
      $dayDiff = ($nowDay - $tdDay);


      if (($dayDiff) >= 60 * 60 * 24 * 7) {
        $result = date("Y - m - d", $tdTime);
      } else if ($dayDiff >= 60 * 60 * 24) {
        $result = ($dayDiff / (60 * 60 * 24)) . "일 전";
      } else {
        if ($nowTime - $tdTime < 3600 && $nowTime - $tdTime >= 60) {
          $result = floor(($nowTime - $tdTime) / 60) . "분 전";
        } else if (60 > $nowTime - $tdTime && $nowTime - $tdTime >= 0) {
          $result = "방금전";
        } else {
          $result = date("H:i", strtotime($tdValue));
        }
      }
      break;
    default:
      return $tdValue;
  }


  return $result;
}
$theme_Array = array(
  "cerulean", "cosmo", "cyborg", "darkly", "flatly", "journal", "litera",
  "lumen", "lux", "materia", "minty", "pulse", "sandstone", "simplex", "sketchy", "slate", "solar",
  "spacelab", "superhero", "united", "yeti"
);
$this_theme = $theme_Array[15];


$login_user_id = "";
$login_flag = isset($_SESSION['loginID']) && !empty($_SESSION['loginID']);

?>


  <script src="/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" id="b-css" href="https://bootswatch.com/4/<? echo $this_theme; ?>/bootstrap.css">
  <link rel="stylesheet" id="b-min-css" href="https://bootswatch.com/4/<? echo $this_theme; ?>/bootstrap.min.css">
  <link rel="stylesheet" id="v-scss" href="https://bootswatch.com/4/<? echo $this_theme; ?>/_variables.scss">
  <link rel="stylesheet" id="b-scss" href="https://bootswatch.com/4/<? echo $this_theme; ?>/_bootswatch.scss">

  <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <br>
  <h1 class="text-center"><a href="../board/list.php">자유게시판</a></h1>
  <div align="right" class="container">
    <div class="panel-default">

      <?php


      ?>
    </div>
    <? if ($login_flag) {
      $login_user_id = $_SESSION['loginID'] ?>
      <div class="" style='max-width: 10rem'>
        <p class="" style="display: inline;">user : <p class="h5 text-info" style="display: inline;"> <? echo $login_user_id; ?></p>
        </p>
        <a class="btn btn-outline-warning btn-sm" href="../member/login.php">로그아웃</a>
      </div>
    <? } else { ?>
      <a class="btn btn-outline-<?echo ($this_theme == "slate")?"light":"primary"; ?> btn-sm" href="../member/register.php">회원가입</a>
      <a class="btn btn-outline-info btn-sm" href="../member/login.php">로그인</a>
    <? } ?>
  </div>
  <hr>