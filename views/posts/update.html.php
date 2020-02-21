<?= $this->form->create($post) ?>
<div class="form">
    <div class="form-head">
    UPDATE POST
    </div>
    <div class="form-element" style="width: 100%">
        <div class="form-group" style="margin-bottom: 20px;">
        <?= $this->form->field('title', ['class' => "form-control", 'id' => "title"]) ?>
        <label class="errorMsg" id="eName">Title Required</label>
        </div>
        <div class="form-group">
        <?= $this->form->field('content', ['type' => 'textarea','class' => "form-control", "id" => "content"]) ?>
        <label class="errorMsg" id="eCont">Content Required</label>
        </div>
        <?= $this->form->submit('POST', ['onClick' => "return Validate()", "class" => "button"]) ?>
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
    // $("#title").on("blur", function() {
    //     if ($(this).val().trim().length == 0) {
    //         $("#eName").show();
    //     } else {
    //         $("#eName").hide();
    //     }
    // });
    // $("#content").on("blur", function() {
    //     if ($(this).val().trim().length == 0) {
    //         $("#eCont").show();
    //     } else {
    //         $("#eCont").hide();
    //     }
    // });
    // function Validate() {
    //     if (!document.getElementById("title").value && !document.getElementById("content").value) {
    //         $("#eName").show();
    //         $("#eCont").show();
    //         return false;
    //     } else if (!document.getElementById("title").value) {
    //         $("#eName").show();
    //         return false;
    //     } else if (!document.getElementById("Content").value) {
    //         $("#eCont").show();
    //         return false;
    //     }
    // }
</script>