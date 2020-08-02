<?php
require 'core/includes/header_single.php';


?>
    <main data-state="closed">
		<nav class="menu">
	        <ul>
	            <li><a href="">Accueil</a></li>
	            <li><a href="index.php?p=about">Qui suis-je ?</a></li>
	            <li><a href="">Mes créations</a></li>
	            <li><a href="">On reste en contact ?</a></li>
	        </ul>
	    </nav>
        <?= $content ?>
    </main>

<?php
require 'core/includes/footer_single.php';
?>