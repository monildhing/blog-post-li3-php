<?php

use lithium\security\Auth; ?>
<?= $this->form->create($user, ["enctype" => "multipart/form-data"]) ?>
<style>
    .error {
        font-size: small !important;
        color: red !important;
    }

    .errorMsg {
        display: none;
        font-size: small;
        color: red;
    }

    .form {
        width: 30rem;
        margin: auto;
        margin-top: 3%;
        margin-bottom: 8%;
        border-radius: 25px;
    }

    .form-head {
        text-align: center;
        font-size: xx-large;
        color: cornflowerblue;
        margin-bottom: 80px;
    }

    .form-control {
        border: none;
        border-radius: 0px;
        margin-bottom: 10px;
        border-bottom: 1px solid darkgrey;
        color: darkgrey
    }

    .button {
        border: 3px solid cornflowerblue;
        background: none;
        padding: 6px 26px;
        margin: 10% 39%;
    }
</style>
<div class="form">
    <div class="form-head">
        Update User
    </div>
    <div class="form-element" style="width: 100%;margin-bottom:10px;">
    <?= $this->form->field('username',['class' => "form-control"]) ?>
        <?= $this->form->field('name',['class' => "form-control"]) ?>
        <div class="form-group" style="margin-bottom: 20px;">
            <?= $this->form->field('email', ['type' => 'email', 'class' => "form-control", "id" => "email"]) ?>
            <label class="errorMsg" id="eInEmail">Invalid Email</label>
        </div>
        <div class="form-group" style="margin-bottom: 20px;">
        <?= $this->form->field('image', ['type' => "file", 'class' => "form-control", "id" => "image"]) ?>
        <label class="errorMsg" id="eFile">Invalid File</label>
        <?= $user->image ?>
        </div>
        <?= $this->form->submit('Update', ['class' => "button"]) ?>
    </div>
</div>
<?= $this->form->end() ?>
<script>
    $("#email").on("blur", function() {
        if (isEmail($(this).val())) {
            $("#eInEmail").hide();
        } else {
            $("#eInEmail").show();
        }
    });
    $("#image").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            $("#eFile").show();
        }
    });
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>