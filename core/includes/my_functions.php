<?php

function read_dir($path, $nb = 0)
{
    $folders = scandir($path, $nb);
    $folders = array_diff($folders, [".", "..", ".DS_Store"]);
    return $folders;
}

function error_404()
{
    require('pages/404.php');
    $content = ob_get_clean();
    require 'pages/templates/404_template.php';
    return $content;
}