<?= $this->form->create($people) ?>
<div class="form">
    <div class="form-head">
    ADD PEOPLE
    </div>
    <div class="form-element" style="width: 100%">
        <div class="form-group" style="margin-bottom: 20px;">
        <?= $this->form->field('name', ['class' => "form-control", 'id' => "name"]) ?>
        <label class="errorMsg" id="eName">Name Required</label>
        </div>
        <div class="form-group">
        <?= $this->form->field('contact', ['class' => "form-control", "id" => "contact"]) ?>
        <label class="errorMsg" id="eCont">Contact Required</label>
        </div>
        <?= $this->form->submit('ADD', ['onClick' => "return Validate()", "class" => "button"]) ?>
    </div>
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
        margin-top: 10%;
    }

    .error {
        font-size: small !important;
        color: red !important;
        display: none;
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
    $("#name").on("blur", function() {
        if ($(this).val().trim().length == 0) {
            $("#eName").show();
        } else {
            $("#eName").hide();
        }
    });
    $("#contact").on("blur", function() {
        if ($(this).val().trim().length == 0) {
            $("#eCont").show();
        } else {
            $("#eCont").hide();
        }
    });
    function Validate() {
        if (!document.getElementById("name").value && !document.getElementById("contact").value) {
            $("#eName").show();
            $("#eCont").show();
            return false;
        } else if (!document.getElementById("name").value) {
            $("#eName").show();
            return false;
        } else if (!document.getElementById("contact").value) {
            $("#eCont").show();
            return false;
        }
    }
</script>