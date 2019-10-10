<?php
include("../include/header.php");

?>
<div class="container" align="center">
    <div class="card border-primary mb-5" style="max-width: 40rem;">
        <div class="card-header bg-primary text-light">
            <h3 class="card-title">로그인</h3>
        </div>
        <div class="card-body">
            <form action="login_post.php" method="post">
                <div class="form-group text-left">
                    <label for="login_id">ID</label>
                    <input type="id" class="form-control" id="login_id" placeholder="Enter ID " name = "login_id" required>
                </div>
                <div class="form-group text-left">
                    <label for="login_pw">Password</label>
                    <input type="password" class="form-control" id="login_pw" placeholder="Password" name = "login_pw" required>
                </div>
                <button class="btn btn-success btn-lg">로그인</button>
            </form>

        </div>
    </div>
</div>

