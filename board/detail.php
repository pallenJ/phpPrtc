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
    <?php
    $bno = $_GET["bno"];
    ?>
    <div class="container">
        <div class="card">
                <fieldset>
                    <legend class="btn-primary"><h3 class="text-center">글</h3></legend>
                    
                    <div class="form-group">
                        <label for="boardID">writer</label>
                        <div class="form-control"> <?php ?> </div>
                    </div>
                    <div class="form-group">
                        <label for="boardTitle">제목</label>
                        <input type="text" class="form-control" id="boardTitle" name="title" value="Title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="boardContent">본문</label>
                        <div class="form-control" id="boardContent" rows="5" name="content" disabled>Content</div>
                    </div>
                  
       
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
 
        </div>
    </div>
</body>

</html>