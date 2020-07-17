<?php
    $project = $_GET['project'];

    $folders = read_dir('projects');
    $is_dir = is_dir('projects/' . $project);

    if($is_dir && file_exists('projects/' . $project) && isset($_GET['project'])){
        $handle = opendir('projects/' . $project);
        $files = scandir('projects/' . $project);
        $files = array_diff($files, [".", "..", ".DS_Store"]);
        $json = file_get_contents("projects/" . $project . "/project.json");
        $content = json_decode($json);
     } else {
        error_404();
    }
?>

    
    <div class="content">
        <section class="home">
            <h1><?= $content->project->title ?></h1>
            <h1><?= $content->project->description ?></h1>
        </section>
    </div>
