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
            </header>
        </section>
        <section class="profil">
            <img src="<?= get_profil('profil_pict')?>" alt="<?= get_profil('profil_alt')?>">
            <div class="text">
                <strong><?= get_profil('names')?></strong>
                <span><?= get_profil('age')?> ans</span>
                <span><?= get_profil('statut')?></span>
            </div>
        </section>
        <section class="text_about_me">
            <p class="quote_left"><?= stylizer(get_profil('quote_1'), 'bold')?></p>
            <p class="quote_right"><?= stylizer(get_profil('quote_2'), 'bold')?></p>
        </section>
        <section class="watch_word"></section>
    </div>
