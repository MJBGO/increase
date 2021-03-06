![Increase logo](http://open-beer.kobject.net/img/Increase.png "Increase logo")
# increase
A Phalcon web application to manage the progress of projects, and improve communication with the customer

# Installation

Ne pas oublier de modifier le baseUri dans le fichier config.php

```php
'application' => array(
  [...]
  'baseUri'        => '/increase/',
)
```

# Répartition des tâches

## Jean-Baptiste
- ![done](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/11-24.png) 1- Models
- ![done](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/11-24.png) 3- Projet d'un client
- ![done](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/11-24.png) 5.0- Projet client vu par un author
- ![done](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/11-24.png) 5.1- Liste des tâches
- ![todo](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/17-24.png) 6- Connexion/droits (configuré mais page blanche)

## Alexandre
- ![done](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/11-24.png) 2- Liste des projets d'un client
- ![todo](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/17-24.png) 4- Liste des projets d'un "Author"
- ![todo](https://cdn2.iconfinder.com/data/icons/free-basic-icon-set-2/300/17-24.png) 5.2- Modification/ajout de tâche

# Parties bonus ajoutées

- Formulaire de connexion à l'application (affichage)


## Commentaire

Nous avons ajouté un formulaire de connexion sur la page d'accueil utilisant le système de formulaire de Phalcon mais nous n'avons pu le faire marcher. En effet, le système de droits a été installé et configuré mais une page blanche persiste lors de son activation ...

La plupart des fonctions ont été implémentées mais nous n'avons pu finir par manque de temps.

Les requêtes AJAX utilise la bibliothèque Phalcon-JQuery.

# Liens

Accès à la liste des projets de l'utilisateur : /user/projects/1

Accès à un projet d'un utilisateur : /user/project/1/1

Accès à la liste des projets d'un auteur : /author/projects/2

Accès à un projet d'un auteur : /author/project/1/2

# Capture d'écran

Page de connexion (affichage)

![connexion](http://img11.hostingpics.net/pics/305589Capture1.png)

Liste des projets de l'utilisateur

![projetsuser](http://img11.hostingpics.net/pics/537715Capture2.png)

Aperçu d'un projet d'un utilisateur

![projetuser](http://img11.hostingpics.net/pics/126968Capture3.png)

Affichage des messages (AJAX)

![messages](http://img11.hostingpics.net/pics/167136Capture4.png)

Lorsque le projet n'existe pas

![noproject](http://img11.hostingpics.net/pics/201613Capture5.png)

Liste des projets de l'auteur

![projetsauthor](http://img11.hostingpics.net/pics/437227Capture6.png)

Aperçu d'un projet par un auteur

![projetauthor](http://img11.hostingpics.net/pics/854604Capture7.png)

Affichage des usecases (AJAX)

![usercases](http://img11.hostingpics.net/pics/526467Capture8.png)
