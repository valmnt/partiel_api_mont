# partiel_api_mont

## Qu'est-ce qu'un DTO et à quoi sert-il ?

Un DTO = Objet de transfert de données. C'est une sortie de format qui va permettre d'afficher des 
des informations contenue ou non contenue par l'entité (qui va être soit calculer, ajouter...) car conceptuellement
elle n'a pas à stocker ça.

## Quelle est la différence entre un listener et un subscriber dans Symfony ?

Les Subscibers connaissent l'évennement auquel ils écoutent.
Les Listeners lorsqu'ils sont renseigné dans le container de service il faut préciser
l'évenement qu'ils écoutent ainsi que la méthode qui sera déclanchée.

## Qu'est-ce qu'un JWT ? Pourquoi l'utilise-t-on plutôt que les sessions PHP ?

JWT = JSON Web Tokens
C'est un token (une clé) qui permet de protéger notre application par un système d'authentification.
On utilise un JWT plutot qu'une session car la session est public et donc accessible à tous les user de notre application.
De plus le token est hasher ce qui fait qu'il impossible de le déchiffrer, donc c'est sécurisé.

## Qu'est-ce que CORS ?

C'est un mécanisme qui limite l'accés aux ressources aux applications qui exploitent nos ressources.

## Quelle est la différence entre JSON et JSON-LD ?

Json-Ld est un json plus enrichit (link data).