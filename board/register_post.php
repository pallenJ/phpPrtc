
          <?php
          include("../include/header.php");
          $brdId = $_POST["id"]; 
          $query = "INSERT INTO board_free(title,content,writer_id) VALUES(?,?,?)";
          $stmt = $db->prepare($query);
        //   $stmt->bindParam(1,$_POST["title"],PDO::PARAM_STR);
        //   $stmt->bindParam(2,$_POST["content"],PDO::PARAM_STR);
        //   $stmt->bindParam(3,$_POST["id"],PDO::PARAM_STR);

          $stmt->execute([$_POST["title"],$_POST["content"],$_POST["id"]]);
          header("Location:../board/list.php");