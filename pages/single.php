<?php
    
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
                <div class="single_title">
                <h1><?= get_content('title') ?></h1>
                <h2><?= get_content('tag') ?></h2>
                </div>
            </header>
        </section>
        <section class="single">
            <p>
            <?= get_content('description') ?>
            </p>
        </section>
           
    </div>