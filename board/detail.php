<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include("../include/header.php");
    $bno = $_GET["bno"];
    $query = "SELECT A.writer_id, A.title, A.content, A.regDate, A.updateDate, A.viewCnt FROM board_free A WHERE bno =".$bno;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_NUM);
    ?>
</head>

<body>
    <?php
    
    ?>
    <div class="container">
        <div class="card">
                <fieldset>
                    <legend class="btn-primary"><h3 class="text-center">글</h3></legend>
                    
                    <div class="form-group">
                        <label for="boardID">writer</label>
                        <div class="form-control"> <?php echo $result[0][0] ?> </div>
                    </div>
                    <div class="form-group">
                        <label for="boardTitle">제목</label>
                        <div class="form-control"> <?php echo $result[0][1] ?> </div>
                    </div>
                    <div class="form-group">
                        <label for="boardContent">본문</label>
                        <div class="form-control"> <?php echo $result[0][2] ?> </div>
                    </div>
                  
       
                  
                    <button type="submit" class="btn btn-warning">수정</button>
                    <button type="submit" class="btn btn-secondary" onclick="history.back();">뒤로</button>
                </fieldset>
 
        </div>
    </div>
</body>

</html>