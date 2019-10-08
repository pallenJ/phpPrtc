<!DOCTYPE html>
<html lang="en">

<head>
    <title>자유게시판</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include("../include/header.php");
    ?>

</head>

<body>
    
    <div class="container">
    <a class="btn btn-primary" href="register.php"> 새글 </a>
        <div class="card">
           
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
                  
                            $query = "SELECT A.bno, A.title, A.writer_id, A.regDate,A.updateDate,A.viewCnt FROM board_free A ORDER BY A.bno DESC";
                            $stmt = $db->prepare($query);
                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_NUM);

                            for ($i = 0; $i < count($result); $i++) {
                                echo "<tr>";
								for ($j = 0; $j < count($result[$i]); $j++) {
									# code...
                                    $tdValue = $result[$i][$j];
                                        if($j==1){
                                            printf("<td><a href='detail.php?bno=".$result[$i][0]."' class = 'text-success'>".tdValueTrs($j,$tdValue))."</a>";
                                        }else{
                                            printf("<td>".tdValueTrs($j,$tdValue));
                                        }
								}

							}
                            ?> 



                </tbody>


            </table>
        </div>
    </div>
</body>

</html>