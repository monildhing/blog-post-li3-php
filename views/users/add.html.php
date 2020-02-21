<?php

use lithium\security\Auth;
$check=Auth::Check('user');
?>
<?php
if ($data['error']) :
?>
    <div class="alert alert-danger" role="alert">
        Username taken alreday
    </div>
<?php endif ?>
<?PHP if ($data['success']) :
?>
    <div class="alert alert-success" role="alert">
       <?= $data['success']?> <a href="/login">Login</a>
    </div>
<?php endif ?>
<style>
    .errorMsg {
        display: none;
        font-size: small;
        color: red;
    }

    .form-group {
        margin-bottom: 20px;
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
        margin: 0% 33%;
        margin-top: 10%
    }

    .form-head {
        text-align: center;
        font-size: xx-large;
        color: cornflowerblue;
    }

    .form {
        width: 30rem;
        margin: auto;
    }

    .error {
        font-size: small !important;
        color: red !important;
    }
</style>


<?= $this->form->create($user) ?>
<div class="form">
<?php if (!$check) : ?>
    <div class="form-head">
        SIGNUP
    </div>
<?php endif ?>
<?php if ($check) : ?>
    <div class="form-head">
        ADD USER
    </div>
<?php endif ?>
    <div class="form-element" style="width: 100%">
        <div class="form-group">
            <?= $this->form->field('name', ['class' => "form-control", "id" => "name"]) ?>
            <label class="errorMsg" id="Name">Name Required</label>
        </div>
        <div class="form-group">
            <?= $this->form->field('username', ['class' => "form-control", "id" => "username"]) ?>
            <label class="errorMsg" id="eName">Username Required</label>
        </div>
    </div>
    <div class="form-group">
        <?= $this->form->field('email', ['type' => 'email', 'class' => "form-control", "id" => "email"]) ?>
        <label class="errorMsg" id="eEmail">Email Required</label>
        <label class="errorMsg" id="eEmail">Invalid Email</label>
    </div>
    <div class="form-group">
        <?= $this->form->field('password', ['type' => 'password', 'class' => "form-control", "id" => "password"]) ?>
        <div class="error"><?=($errors['password'][0])?></div>
        <label class="errorMsg" id="ePass">Password Required</label>
    </div>
    <div class="form-group">
        <?= $this->form->field('confirm password', ['type' => "password", 'class' => "form-control", 'id' => "confirmpassword"]) ?>
        <div class="error"><?=($errors['confirmpassword'][0])?></div>
        <label class="errorMsg" id="eCPass">Confirm password doesn't match</label>
    </div>
<?php if (!$check) : ?>
<?= $this->form->submit('SIGNUP', ['onClick' => "return Validate()", 'class' => "button"]) ?>
</div>
<a href="/login" style="margin: 8% 46%;">Login?</a>
</div>
<?php endif ?>
<?php if ($check) : ?>
<?= $this->form->submit('ADD', ['onClick' => "return Validate()", 'class' => "button"]) ?>
<?php endif ?>
<?= $this->form->end() ?>



<script>
    // $("#username").on("blur", function() {
    //     if ($(this).val().trim().length == 0) {
    //         $("#eName").show();
    //     } else {
    //         $("#eName").hide();
    //     }
    // });
    // $("#email").on("blur", function() {
    //     if ($(this).val().trim().length == 0) {
    //         $("#eEmail").show();
    //     } else {
    //         $("#eEmail").hide();
    //     }
    //     if (isEmail($(this).val())) {
    //         $("#eInEmail").hide();
    //     } else {
    //         $("#eInEmail").show();
    //     }
    // });

    // function Validate() {
    //     if (!document.getElementById("username").value && !document.getElementById("password").value &&
    //         !document.getElementById("name").value && !document.getElementById("email").value && !document.getElementById("confirmpassword").value) {
    //         $("#eName").show();
    //         $("#ePass").show();
    //         $("#Name").show();
    //         $("#eCPass").show();
    //         $("#eEmail").show();
    //         return false;
    //     } else if (!document.getElementById("username").value) {
    //         $("#eName").show();
    //         return false;
    //     } else if (!document.getElementById("password").value) {
    //         $("#ePass").show();
    //         return false;
    //     } else if (!document.getElementById("confirmpassword").value) {
    //         $("#eCPass").show();
    //         return false;
    //     } else if (!document.getElementById("email").value) {
    //         $("#eEmail").show();
    //         return false;
    //     } else if (!document.getElementById("password").value) {
    //         $("#eName").show();
    //         return false;
    //     }

    // }

    // function isEmail(email) {
    //     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    //     return regex.test(email);
    // }
    // $("#name").on("blur", function() {
    //     if ($(this).val().trim().length == 0) {
    //         $("#Name").show();
    //     } else {
    //         $("#Name").hide();
    //     }
    // });
    $("#confirmpassword").on("blur", function() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        if (password != confirmPassword) {
            $("#eCPass").show();
        } else {
            $("#eCPass").hide();
        }
    });
    // $("#password").on("blur", function() {
    //     if ($(this).val().trim().length == 0) {
    //         $("#ePass").show();
    //     } else {
    //         $("#ePass").hide();
    //     }
    // });
</script>