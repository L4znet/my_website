
    
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
                <a href="index.php?p=single&project=<?= get_first_content('slug') ?>" class="project">
                    <span class="tag"><?= get_first_content('tag') ?></span>
                    <span class="title"><?= get_first_content('title') ?></span>
                </a>
            </div>
        </section>
    </div>
