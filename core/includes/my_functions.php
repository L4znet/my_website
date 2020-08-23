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


function error_404_redirect()
{
    header('location:index.php?p=file_not_found');
}

function get_content($content_wanted)
{
    $project = $_GET['project'];
    $folders = read_dir('projects');
    $is_dir = is_dir('projects/' . $project);

    if($is_dir && file_exists('projects/' . $project) && isset($_GET['project'])){
        $handle = opendir('projects/' . $project);
        $files = scandir('projects/' . $project);
        $files = array_diff($files, [".", "..", ".DS_Store"]);
        $json = file_get_contents("projects/" . $project . "/project.json");
        $content = json_decode($json);
        return $content->project->$content_wanted;
     } else {
        error_404();
    }
}

function get_profil($field_wanted)
{
    $file = 'profile.json';
    if(file_exists('pages/' . $file)){
        $json = file_get_contents('pages/'. $file);

        $content = json_decode($json);
        return $content->$field_wanted;
     } else {
        error_404_redirect();
    } 
}

function colorize_names($names)
{
    $names = explode(" ", $names);
    $names_table = [];
    for($i = 0; $i < count($names); $i++){
        $letter = substr($names[$i], 0, 1);
        $name = str_replace($letter, "<span>" . $letter . "</span>", $names[$i]);
        array_push($names_table, $name);
    }
   $names = implode(' ', $names_table);
   return $names;

}




function first_folder()
{
    $dir_nom = 'projects'; 
    $dir = scandir($dir_nom) or die("Le dossier projects n'existe pas, vous devez le créer et y mettre vos dossiers de projets"); 

    $date = array();
    $nom = array();
    foreach ($dir as $element) {
        if($element != '.' && $element != '..' && $element != ".DS_Store") {
            $stat = stat($dir_nom . '/' .$element);
            array_push($nom, $element);
            array_push($date, $stat['mtime'] . '***' . $element);
            $data = array_combine($nom, $date);
        }
    }
    asort($data);
    $data = explode("***", end($data));
    return $data[1];
}



function is_project_dir($first_folder)
{
    return is_dir('projects/' . $first_folder);
}

function get_first_content($field)
{
    $first_folder = first_folder();
    $is_dir = is_project_dir($first_folder);
    if($is_dir){
        $files = scandir('projects/' . $first_folder);
        $files = array_diff($files, [".", "..", ".DS_Store"]);
        $json = file_get_contents("projects/" . $first_folder . "/project.json");
        $content = json_decode($json);
        return $content->project->$field;
    }
}

function stylizer($text, $style){
    switch($style){
        case 'bold':
            $text = str_replace('[', ' <b> ', $text);
            $text = str_replace(']', ' </b> ', $text);
        break;
    }
    return $text;
}