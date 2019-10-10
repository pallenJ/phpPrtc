<?php
include("../include/header.php");

?>
<div class="container" align="center">
    <div class="card border-primary lg-5" style="max-width: 50rem;">
        <div class="card-header bg-primary text-light">
            <h3 class="card-title">회원가입</h3>
        </div>
        <div class="card-body">
            <form action="register_post.php" method="post">
                <div class="form-group text-left">

                    <label for="register_id">ID</label>
                    <div class="">
                    <input type="id" class="form-control" id="register_id" placeholder="Enter ID " name = "register_id" required>
                    
                    <div class="valid-feedback idFeedText"></div>
                    <div class="invalid-feedback idFeedText"></div>
                    <a class="btn btn-success btn-sm text-white" id="id_check">ID체크</a>

                    </div>
                </div>
                <div class="form-group text-left">
                    <label for="register_name">name</label>
                    <input type="name" class="form-control" id="register_name" placeholder="name" name = "register_name" required>
                </div>
                <div class="form-group text-left">
                    <label for="register_email">E-mail</label>
                    <input type="email" class="form-control" id="register_email" placeholder="email" name = "register_email" required>
                </div>
                <div class="form-group text-left">
                    <label for="register_pw">Password</label>
                    <input type="password" class="form-control reg-pw" id="register_pw" placeholder="Password" name = "register_pw" required>
                    <div class="valid-feedback pwFeedText"></div>
                    <div class="invalid-feedback pwFeedText"></div>
                </div>
                <div class="form-group text-left">
                    <label for="register_pw_check">Password Check</label>
                    <input type="password" class="form-control reg-pw" id="register_pw_check" placeholder="Password" name = "register_pw_check" required>
                </div>
                <button hidden id = "submit_real"></button>
            </form>
            <button class="btn btn-info btn-lg" id = "member_register">회원가입</button>
        </div>
    </div>
</div>

<script>

$(function () {

    $("#member_register").click(function () { 
        var register_id = $("register_id").val();
        var register_pw = $("register_pw").val();
        var register_email = $("register_email").val();
        var register_name  = $("#register_name").val();
        if(!$("#register_id").hasClass("is-valid")){
            alert("아이디를 확인 해주세요");
            return;
        }/*
        else if(register_name==null||register_name=""){
            alert("이름을 입력해 주세요");
            return;
        }else if(register_email==null||register_email=""){
            alert("이메일을 입력해 주세요");
            return;
        }*/
        else if(!$("#register_pw").hasClass("is-valid")){
            alert("비밀번호를 확인해 주세요");
            return;
        }

        $("#submit_real").click();
    });
    $(".reg-pw").keyup(function () { 
        var reg_pw = $("#register_pw").val();
        var regExpPw = /(?=.*\d{1,50})(?=.*[~`!@#$%\^&*()-+=]{1,50})(?=.*[a-zA-Z]{2,50}).{8,50}$/;
        var pw_selector = $(".reg-pw");
        if(!regExpPw.test(reg_pw)){
            isValid(false,pw_selector);
            $(".pwFeedText").text("비밀번호는 숫자와 특수문자를 포함한 8자리 이상의 문자열이어야 합니다.");
        }else if($("#register_pw").val()!=$("#register_pw_check").val()){
            isValid(false,pw_selector);
            $(".pwFeedText").text("비밀번호가 일치하지 않습니다.");
        }else{
            isValid(true,pw_selector);
            $(".pwFeedText").text("사용가능한 비밀번호 입니다.");
        }
    });



    $("#id_check").click(function () { 
        var id_selector = $("#register_id");
        var id_regex =  /^[A-Za-z0-9+]{4,20}$/; 
        var msg = "";
        if(!(id_regex.test($("#register_id").val()))){
            msg = "아이디는 최소 4자, 최대 20자의 영문 숫자 조합이어야 합니다.";
            alert(msg);
            isValid(false,id_selector);
            $(".idFeedText").text(msg);
            return;
        }

        $.ajax({
            type: "post",
            url: "id_check.php",
            data: {"register_id":$("#register_id").val()},
            dataType: "json",
            success: function (response) {
                msg = response.cnt == 0?"사용가능한 아이디 입니다":"이미 사용중인 아이디 입니다";
                isValid(response.cnt == 0,id_selector)
                alert(msg);
                $(".idFeedText").text(msg);
                
            }
        });
        
    });

    function isValid(flag,selector) {
        if(flag){
            selector.removeClass("is-invalid")
            selector.addClass("is-valid")
        }else{
            selector.removeClass("is-valid")
            selector.addClass("is-invalid")
        }
    }

})

</script>