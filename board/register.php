    <?php
    include("../include/header.php");
    if(!$login_flag){    
        echo "<script>"
        ."alert('로그인 후에 사용가능한 기능입니다.');"
        ."history.back();"
        ."</script>";
        }
    
    ?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="container">
        <div class="card">
            <form action="register_post.php" method="post">
                <fieldset>
                    <legend class="btn-primary"><h3 class="text-center">새 글</h3></legend>
                    <input type="hidden" class="" id="boardID" name="id" aria-describedby="" placeholder="Enter ID" value="<? echo $login_user_id; ?>">
                    
                    <!-- <div class="form-group">
                        <label for="boardPW">Password</label>
                        <input type="password" class="form-control" id="boardPW" name="pw" placeholder="Password" required>
                    </div> -->
                    <div class="form-group">
                        <label for="boardTitle">제목</label>
                        <input type="text" class="form-control" id="boardTitle" name="title" placeholder="title" required>
                    </div>
                    <div class="form-group">
                        <label for="boardContent">본문</label>
                        <textarea class="form-control" id="boardContent" rows="5" name="content" required></textarea>
                    </div>
                  
       
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>