    <?php
        $folders = read_dir('projects');
        $firstKey = array_key_first($folders);
        $first_folder = $folders[$firstKey];
        $is_dir = is_dir('projects/' . $first_folder);

        if($is_dir){
            $handle = opendir('projects/' . $first_folder);
            $files = scandir('projects/' . $first_folder);
            $files = array_diff($files, [".", "..", ".DS_Store"]);
            $json = file_get_contents("projects/" . $first_folder . "/project.json");
            $content = json_decode($json);
        }
    ?>
    
    
    <div class="content">
        <section class="home">
            <header>
                <nav>
                    <a href="index.php" class="logo">
                        <img src="assets/img/logo.svg" alt="Le logo du site">
                    </a>
                    <div class="button">
                        <i class="fa fa-arrow-left"></i>
                    </div>
                </nav>
                <div class="title">
                    <h1><?= colorize_names(get_profil('names'))?></h1>
                    <h2><?= get_profil('statut')?></h2>
                    <hr>
                </div>
            </header>
            <div class="projects">
            <?= first_folder() ?>
                <a href="index.php?p=single&project=" class="project">
                    <span class="tag"><?= get_first_content('tag') ?></span>
                    <span class="title"><?= get_first_content('title') ?></span>
                </a>
            </div>
        </section>
    </div>
