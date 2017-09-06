<?php

require_once "start.php";

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

get_template('head'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><?php echo translate('admin_login'); ?></h1>
        </div>
    </div>
<?php if(!empty($session->message)) : ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $session->message; ?>
        </div>
    </div>
<?php endif;

    if($session->is_logged_in() && User::checkRights($session->user_id, 'index.php')) {
        reDirectTo('index.php');
    }
    $btn = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

    if (isset($btn) && $btn == 'login') {
    $errors = [];

    //kontroll kasutajanimele, et ei ole tühi
    $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL);
    if(empty($username)) {
    $errors['username'] = "Kasutajanimi ei tohi olla tühi!";
    }

    //kontroll paroolile, et ei ole tühi
    $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if(empty($pass)) { //kontroll paroolile, et ei ole tühi ja vähemalt X väärtust pikad => X=3
    $errors['password'] = "Parool ei tohi olla tühi";
    }

    if(empty($errors)) {
    //kontroll baasi, kas kasutja salasõna ja kasutajanimi klapivad
    if($user = User::auth($username, $pass)) {
    //kui kõik okei, siis suuname index.php lehel
    $session->login($user);
    $session->message('<div class="alert alert-success">Login oli edukas!</div>');
    reDirectTo('index.php');
    }

    $session->message('<div class="alert alert-danger">Kasutajanimi ja parool ei klapi!</div>');
    reDirectTo('admin.php');
    }

    $session->message('<div class="alert alert-danger"><ul><li>'. join("</li><li>", $errors).'</li></ul></div>');
    reDirectTo('admin.php');


    //kui probleeme, siis väljastame vead
    }
    ?>
    <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-6">
            <h3 class="page-header text-center"><?php echo translate('login_header'); ?></h3>
            <form method="post">
                <input name="username" class="form-control" placeholder="<?php echo translate('add_username_text'); ?>"><br>
                <input name="password" class="form-control" type="password" placeholder="<?php echo translate('add_password_text'); ?>"><br>
                <button type="submit" name="action" value="login" class="btn btn-success"><?php echo translate('login_btn'); ?></button>
            </form>
        </div>
        <div class="col-lg-6">
            <h3 class="page-header text-center"><?php echo translate('register_header'); ?></h3>
            <form method="post">
                <input name="username" class="form-control" placeholder="<?php echo translate('add_email_text'); ?>"><br>
                <input name="password" class="form-control" type="password" placeholder="<?php echo translate('add_password_text'); ?>"><br>
                <input name="password2" class="form-control" type="password" placeholder="<?php echo translate('add_password2_text'); ?>"><br>
                <button type="submit" name="action" value="register" class="btn btn-primary"><?php echo translate('register_btn'); ?></button>
            </form>
        </div>
    </div>
</div>

<?php get_template('footer');