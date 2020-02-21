<?= $this->form->create(null) ?>
<div class="form">
    <div class="form-head">
        Forgot Password
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <?= $this->form->field('username', ['class' => "form-control", "id" => "username"]) ?>
        <label class="errorMsg" id="eName">Username Required</label>
    </div>

    <div class="form-group" style="margin-bottom: 20px;">
        <?= $this->form->field('email', ['class' => "form-control", "id" => "password"]) ?>
    </div>

    <?= $this->form->submit('Forget Password', ['class' => 'button', 'onClick' => "return Validate()"]) ?>
</div>
<a href="/login" style="margin: 8% 46%;">Login</a>
</div>
<?= $this->form->end() ?>


<script>
    $("#username").on("blur", function() {
        if ($(this).val().trim().length == 0) {
            $("#eName").show();
        } else {
            $("#eName").hide();
        }
    });
    $("#name").on("blur", function() {
        if ($(this).val().trim().length == 0) {
            $("#Name").show();
        } else {
            $("#Name").hide();
        }
    });
    $("#confirmpassword").on("blur", function() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmpassword").value;
        if (password != confirmPassword) {
            $("#eCPass").show();
        } else {
            $("#eCPass").hide();
        }
    });
</script>

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
        margin-top: 15%
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
</style>