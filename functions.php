<?php

function get_template($template_part) {
    $template_part_with_path = TEMPLATE_PATH . $template_part . ".php";
    if(file_exists($template_part_with_path)) {
        require_once $template_part_with_path;
    }
}

?>