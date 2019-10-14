<!DOCTYPE html>
<html lang="en">

<head>
    <title>자유게시판</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include("../include/header.php");
    $boardPageNum = 1;
    if (isset($_GET['pg']) && !empty($_GET['pg'])) {
        $boardPageNum = $_GET['pg'];
    }
    $amount = 15;
    //echo "<script>alert('".$boardPageNum."');</script>";
    $cri = new Criteria();
    $cri->setPage($boardPageNum);
    $cri->setAmt($amount);
    
    $query = "SELECT COUNT(*) FROM board_free";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    $listAllCNT = $result[0][0];

    $pagenation = new Pagenation();
    $pagenation->pagingCal($cri,$listAllCNT,10); 

   // echo "<script>alert('" . $listAllCNT . "');</script>";
    ?>

</head>

<body>

    <div class="container">
        <? if ($login_flag) {
            echo "<a class='btn btn-primary' href='register.php'> 새글 </a>";
        } ?>

        <div class="card">

            <div class="card-body">
                <table class="table">

                    <thead>
                        <tr class="table-info">
                            <th> 게시글 번호
                            <th> 제목
                            <th> 글쓴이 아이디
                            <th> 게시일
                            <th> 수정일
                            <th> 조회수


                    </thead>
                    <tbody>

                        <?php

                        $query = "SELECT A.bno, A.title, A.writer_id, A.regDate,A.updateDate,A.viewCnt"
                            . " FROM board_free A ORDER BY A.bno DESC" . " LIMIT {$cri->getStart()},{$amount}";
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_NUM);

                        for ($i = 0; $i < count($result); $i++) {
                            echo "<tr>";
                            for ($j = 0; $j < count($result[$i]); $j++) {
                                # code...
                                $tdValue = $result[$i][$j];
                                if ($j == 1) {
                                    printf("<td><a href='detail.php?bno=" . $result[$i][0] . "' class = 'text-success'>" . tdValueTrs($j, $tdValue)) . "</a>";
                                } else {
                                    printf("<td>" . tdValueTrs($j, $tdValue));
                                }
                            }
                        }
                        ?>



                    </tbody>


                </table>
            </div>

            <div class="card-footer">

                <div align="center" class="pull-center">
                    <ul class="pagination">
                        <?if($pagenation->prev){ ?>
                        <li class="page-item">
                            <a class="page-link" href="list.php?pg=<? echo $pagenation->startNum-1; ?>">&laquo;</a>
                        </li>
                        <?} ?>
                        <? for ($i = $pagenation->startNum; $i <= $pagenation->endNum; $i++) { ?>
                            <li class="page-item <? if ($boardPageNum == $i) echo 'active'; ?>">
                                <a class="page-link" href="list.php?pg=<? echo $i ?>"><? echo $i; ?></a>
                            </li>
                        <? } ?>
                        <?if($pagenation->next){ ?>
                        <li class="page-item">
                            <a class="page-link" href="list.php?pg=<? echo $pagenation->endNum+1; ?>">&raquo;</a>
                        </li>
                        <? } ?>
                    </ul>
                </div>



            </div>

        </div>
    </div>
</body>

</html>