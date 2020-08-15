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

function first_folder(){
    $folders = read_dir('projects');
    $dates = [];
    for($i = 0; $i < count($folders); $i++){
    
        array_push($dates, filemtime('projects/' . $folders[$i]));
    }
    arsort($dates, SORT_REGULAR); // Tries du plus grand au plus petit
	reset($dates); // On place le pointeur au début
    $recent = $folders[key($dates)];
    var_dump($recent);
    $dates = "";
}

function is_project_dir(){
    $first_folder = first_folder();
    $is_dir = is_dir('projects/' . $first_folder);
    return $is_dir;
}

function get_first_content($field){
    $first_folder = first_folder();
    $is_dir = first_folder();
    if($is_dir){
        $handle = opendir('projects/' . $first_folder);
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