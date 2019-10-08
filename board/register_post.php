<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include("../include/header.php");

    ?>
</head>

<body>
    <div class="container">
        <div class="card">
          <h1>포스트</h1>
          <?php
          $brdId = $_POST["id"]; 
          $query = "INSERT INTO board_free(title,content,writer_id,writer_pw) VALUES(?,?,?,?)";
          $stmt = $db->prepare($query);
          $stmt->bindParam(1,$_POST["title"],PDO::PARAM_STR);
          $stmt->bindParam(2,$_POST["content"],PDO::PARAM_STR);
          $stmt->bindParam(3,$_POST["id"],PDO::PARAM_STR);
          $stmt->bindParam(4,$_POST["pw"],PDO::PARAM_STR);
          $stmt->execute();
          
          ?>
        </div>
    </div>
</body>
<script>
location.href = "../board/list.php"
</script>
</html>