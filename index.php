<?php

require_once "start.php";

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

get_template('head'); ?>


<?php get_template('footer');