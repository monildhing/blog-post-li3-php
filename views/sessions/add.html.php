
<?= $this->form->create(null) ?>
<?php
if ($data['error']) :
?>
    <div class="alert alert-danger" role="alert">
        Invalid Username and password
    </div>
<?php endif ?>

<div class="form">
    <div class="form-head">
        LOGIN
    </div>
    <div class="form-element" style="width: 100%">
        <div class="form-group" style="margin-bottom: 20px;">
            <?= $this->form->field('username', ["class" => "form-control", "id" => "username"]) ?>
            <label class="errorMsg" id="eName">Username Required</label>
        </div>
        <div class="form-group">
            <?= $this->form->field('password', ['type' => 'password', 'class' => "form-control", "id" => "password"]) ?>
            <label class="errorMsg" id="ePass">Password Required.</label>
        </div>
        <?= $this->form->submit('LOGIN', ['onClick' => "return Validate()", "class" => "button"]) ?>
    </div>
    <div style="margin: 2% 33%; width:100% "> 
    Need Account? <a href="/users/add"> Sign Up </a></div>
</div>
<?= $this->form->end() ?>

<style>
    .form {
        width: 30rem;
        margin: auto;
        margin-top: 70px;
    }

    .form-control {
        border: none;
        border-radius: 0px;
        border-bottom: 1px solid darkgrey;
        color: darkgrey;
    }

    .button {
        border: 3px solid cornflowerblue;
        background: none;
        padding: 6px 26px;
        margin: 0% 39%;
        margin-top: 19%;
    }

    .error {
        font-size: small !important;
        color: red !important;
    }

    .errorMsg {
        display: none;
        color: Red;
        font-size: small !important;
        width: 100%;
    }

    .form-head {
        text-align: center;
        font-size: xx-large;
        color: cornflowerblue;
        margin-bottom: 90px;
    }
</style>
<script>
    $("#username").on("blur", function() {
        if ($(this).val().trim().length == 0) {
            $("#eName").show();
        } else {
            $("#eName").hide();
        }
    });
    $("#password").on("blur", function() {
        if ($(this).val().trim().length == 0) {
            $("#ePass").show();
        } else {
            $("#ePass").hide();
        }
    });

    function Validate() {
        if (!document.getElementById("username").value && !document.getElementById("password").value) {
            $("#eName").show();
            $("#ePass").show();
            return false;
        } else if (!document.getElementById("username").value) {
            $("#eName").show();
            return false;
        } else if (!document.getElementById("password").value) {
            $("#ePass").show();
            return false;
        }
    }
</script>