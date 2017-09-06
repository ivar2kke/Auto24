<?php

function get_template($template_part) {
    $template_part_with_path = TEMPLATE_PATH . $template_part . ".php";
    if(file_exists($template_part_with_path)) {
        require_once $template_part_with_path;
    }
}

function translate($translate) {
    global $t;

    return isset($t[$translate]) ? $t[$translate] : "[" . $translate . "]";
}

function reDirectTo($url) {

    if(empty($url)) {
        exit();
    }

    header('Location: ' . $url);
    exit();
}
?>