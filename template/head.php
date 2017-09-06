<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <style>
        @media screen and (min-width: 420px) {
            .navbar-divide {
                padding-right: 1%;
                border-right: solid white 1px;
            }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand navbar-divide" href="index.php">Auto24</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><?php echo translate('nav_home_text'); ?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo translate('nav_home_text'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo translate('nav_home_text'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo translate('nav_home_text'); ?></a>
            </li>
            <!-- Hide if user is not Admin -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php"><?php echo translate('nav_admin_text'); ?></a>
            </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo translate('nav_login_text'); ?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo translate('nav_language_text'); ?></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#"><?php echo translate('nav_english_text'); ?></a>
                    <a class="dropdown-item" href="#"><?php echo translate('nav_estonian_text'); ?></a>
                </div>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" style="margin-left: 1%">
            <input class="form-control mr-sm-2" type="text" placeholder="<?php echo translate('nav_search_text'); ?>" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo translate('nav_search_text'); ?></button>
        </form>
    </div>
</nav>
