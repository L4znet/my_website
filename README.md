# Mon site

## J'ai voulu tenter une approche différente pour mon site, en utilisant uniquement des fichiers JSON et un peu de PHP pour la gestion de l'ensemble du contenu de mon site, aucune données sensible n'est évidemment présente dans ces fichiers JSON.

# 💻 TODO

* Styliser la page single. 

* Coder le CV statique sur une page web et rendre le téléchargement du cv statique possible.

* Inclure Codepen, quora et medium.

* Faire le responsive

* Fixer le bug de la page home

* Rendre possible la personnalisation de certains éléments graphique avec du CSS custom, déplacer le CSS "core", modulariser les différents style pour permettre une modification simplifié.

# 🔨 Mettre en place le site chez vous.

* Vous pouvez modifier votre **image de profil** en remplaçant l'image **"avatar.PNG"** par la vôtre, pensez bien à renommer votre fichier avec le nom **"avatar"**.

* Vous pouvez modifier vos informations personnnelles en modifiant le fichier **.json** nommé **"profile.json"**

* Pensez à installer composer sur votre machine si ce n'est pas déjà faitet à lancer un ``` composer install ``` dans le projet pour setup les dépendances.

* Pour ajouter vos projets créé les dans le dossier **projects**, un dossier par projet, avec dedans vos fichiers / sources de site si vous les avez et obligatoirement un fichier project.json où vous décrivez votre projet.

* Grâce à un peu de PHP j'ai pu définir un système de marquage pour certains de mes textes, par exemple dans le fichier **profile.json** vous pouvez mettre en gras les morceaux de phrases que vous désirez en les entourants de [], pour souligner, il suffit d'encadrer de : /le mot/, cette syntaxe ne s'appuit sur aucune syntaxe existante.

* Si vous souhaitez modifier le style du site, j'utilise SASS pour plus de simpliciter, pensez-donc à l'utiliser vous aussi.

# 🔎 Pistes pour la mise en place de Quora, Codepen et de Medium

## Codepen
Il existe des moyens d'inclure l'API, à tester lequel est le plus pertinent.

## Quora
Continuer les recherches

## Medium
Récupération des articles via mon flux rss.

# Structure d'un fichier "project.json".
Ces fichiers permettent de présenter mes projets, et de définir les informations qui seront présente sur le site, ils s'écrivent ainsi :
```
{
    "project": {
        "id": "42",
        "title": "Lorem ipsum dolor sit amet",
        "tag": "consectetur",
        "description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip",
        "languages": [
            { "language": "consectetur" },
            { "language": "nostrud" },
            { "language": "exercitation"},
            { "language": "adipiscing"}
        ],
        "picture":"Lorem_ipsum_dolor_sit.jpg",
        "picture_alt":"incididunt ut labore",
        "thumbnail":"ipsum_consectetur_lorem.jpg",
        "thumbnail_alt":"ut exercitation labore",
        "url_available":true,
        "url":"www.example.com"
    }
}
```
* id : Ça reste plutôt explicite, vous définissez l'id du projet.
* title : Le nom du projet
* tag : La catégorie du projet
* description : Description du projet
* languages : Alors, même si il y a écrit languages, vous pouvez évidemment y écrire toutes les technologies / choses que vous avez utilisés pour créer votre projet, pas uniquemnet les langages web. 
* picture : le lien vers l'image de présentation du projet (facultatif, si il n'y pas de lien, une image par défaut sera mise à place).
* picture_alt : le texte qui sera mis dans la balise alt
Même principe pour la thumbnail ainsi que le thumbnail alt, une image d'aperçu et son texte.
* url_available : deux paramètres possible : true ou false, true signfie qu'il y a une url pour accéder à votre projet.
* url : c'est un paramètre qui ne doit être défini que dans le cas où url_available est a true, dans le cas contraire le paramètre url sera tout simplement ignoré même si vous y mettez du texte.


# Changelogs

* [Début de l'écriture du changelogs, le projet a débuté bien avant]16 Aout 2020 - Maintenant il est possible, de mettre en gras des morceaux de texte en utilisant une fonction.