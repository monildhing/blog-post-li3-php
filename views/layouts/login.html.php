<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body class="lithified">
    <div class="container-narrow">
        <div class="masthead" style="background-color: black;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: flex; justify-content: space-between;">
                <div class="" style="display: flex;">
                    <div class="" style="margin: 5px">
                    <img src="http://127.0.0.1:8080/uploads/logo.png" height='30px' width='30px'>
                    </div>
                    <a class="navbar-brand" href="/posts/index" id="post">Posts</a>
                    <a class="navbar-brand" href="/people/index" id="user">Users</a>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php

                        use lithium\security\Auth; ?>
                        <?php if (Auth::check('user')['image']) : ?>
                            <img src="http://127.0.0.1:8080/uploads/<?= Auth::check('user')['image'] ?>" height='30px' width='30px'>
                        <?php endif ?>
                        <?php if (!Auth::check('user')['image']) : ?>
                            <i class="fa fa-user"></i>
                        <?php endif ?>
                        <?php echo Auth::check('user')['name']; ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                        <a class="dropdown-item" href="/users/update">Profile</a>
                    </div>
                    <div>
                    </div>
            </nav>
        </div>
        <div class="content">
            <?php echo $this->content(); ?>
        </div>
    </div>
</body>

</html>
<style>
    .navbar-brand {
        padding-top: 10px;
        padding-right: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        border-radius: 5px;
        margin-right: 0px;
    }
</style>

<script>
    $(window).on('load', function() {
        var pathname = window.location.pathname
        console.log(pathname);
        if (pathname.includes("posts")) {
            $("#post").css("background-color", "lightgrey");

        } else if (pathname.includes("people")||pathname.includes("users")) {
            $("#user").css("background-color", "lightgrey");
        }
    });
</script>