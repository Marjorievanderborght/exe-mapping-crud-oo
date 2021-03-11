# Exercice PHP / OO
## La correction de l'exercice se trouve à cette adresse:

https://github.com/WebDevCF2m2020/php-oo/tree/main/05-exe-mapping-crud-oo

## Préambule
Vous pouvez déjà vous connecter avec les logins et mots de passe se trouvant dans la DB, et la structure du site est quasiment complète.

Des vues et le routage sont déjà présents, ainsi que les modèles du mapping de la table theuser et de son manager.

Cette base MVC en PHP OO va vous servir de base pour l'exercice.

Vous trouverez en haut des pages déjà existantes des instructions vous permettant de mieux comprendre vos objectifs.

## Objectifs
Arriver à créer un site fonctionnel en suivant mes demandes.

Vous devez arriver à créer depuis cette base un mapping de la table "thenews" et son contôleur "thenewsManager", pour pouvoir effectuer un CRUD complet de cette table en utilisant judicieusement les modèles, les contrôleurs et les vues.
#### Partie public
- Dans la partie publique ou plusieurs articles peuvent s'afficher, affichez "pas encore d'article" si c'est le cas, ou la liste des articles avec les champs demandés (voir les vues existantes). Ces articles n'affichent que les 150 premiers caractères du texte (les mots ne doivent pas être coupés)
- Si un seul article ne peut être affiché, affichez "Cet article n'existe plus", sinon affichez l'article tel que demandé.
#### Partie admin
- Lorsqu'on est connecté, on ne peut voir que ses articles classés par date descendante, sinon on affiche "pas encore d'article". Ces articles n'affichent que les 150 premiers caractères du texte (les mots ne doivent pas être coupés)
- On peut cliquer sur le détail d'un article pour l'afficher de manière complète et afficher modifier/supprimer l'article
- Dans la partie modification, on ne doit pouvoir modifier que le titre, le texte et la date de l'article, ces champs doivent être aux formats acceptés par la table "thenews". On ne peut modifier QUE ses propres articles !
- Dans la partie suppression, on doit voir le titre de l'article que l'on souhaite supprimer. Il nous faut un lien de confirmation ou d'annulation de suppression. On ne peut supprimer QUE ses propres articles !

##### ! Quelque soit l'action effectuée dans le manager, vous devez toujours utiliser une ou des instances de "Thenews" pour que les setters sécurisent vos données !

## Instructions
Créez un fork de ce dépôt Github, et utilisez les branches et des commits réguliers.

C'est ce fork que vous m'enverrez pour que je puisse le corriger !
### Installation de la DB

Importez dans MariaDB (via PHPMyAdmin ou autre) le fichier

    datas/exe_oo_1_table-import-datas.sql

#### Schéma de la table:

![Schéma de la table](https://github.com/WebDevCF2m2020/php-oo/raw/b05/05-exe-mapping-crud-oo/datas/exe_00_1_table_schema.png)

Des utilisateurs sont déjà créés, mais pas d'articles:

**idtheUser** | int(10)

**theUserLogin** | varchar(60)

**theUserPwd** | varchar(60)

#### Contenu de la table theuser

|1|Mattia|Mattia - 
|2|Bryan|Bryan -
|3|Rocio|Rocio -
|4|Audrey|Audrey -
|5|Marjorie|Marjorie -
|6|Jessica|Jessica -
|7|Alain|Alain -
|8|Chihab|Chihab -
|9|Kieran|Kieran -
|10|Adrien|Adrien -
|11|Clovis|Clovis -
|12|Saadallah|Saadallah -
|13|Virgile|Virgile -
|14|Michaël|Michaël - 


#### Structure de fichiers
Au début de l'exercice:
![Structure de fichiers](https://github.com/WebDevCF2m2020/php-oo/raw/b05/05-exe-mapping-crud-oo/datas/Capture.PNG)

##### Le front controller
se trouve à cette adresse:

    public/index.php

### Modifiez le fichier config.php
Pour qu'il corresponde au lien avec votre table MariaDB (le port par exemple)
### Modifiez les "model"
#### Modifiez le mapping de thenews
Sans effacer l'attribut déjà ajouté (ni son getter et son setter) :

Ajoutez les attributs, le constructeur, l'hydratateur et les getters et setters en prenant modèle de la table thenews dans:

        model/thenews/Thenews.php
N'oubliez pas de sécuriser les setters !
#### Modifiez ThenewsManager.php
- Pour pouvoir vous connecter à notre connexion SQL MyPDO
- Pour pouvoir faire les multiples méthodes nous permettant de gérer les articles
- Prévoir un CRUD complet de thenews UNIQUEMENT des articles de l'utilisateur connecté
  
        model/thenews/ThenewsManager.php
### Modifiez les contrôleurs et les vues
- Aussi bien les parties "public" que "admin"
- N'oubliez pas de charger (et instancier) les classes dans le contrôleur frontal  
- Pour charger, changer ou supprimer les données de thenews depuis les modèles de manière sécurisée
- Dans l'administration, un utilisateur connecté peut afficher, modifier ou supprimer QUE ses news (utilisez la variable de session en lien avec la clef étrangère de la table thenews)
### Ajouter des vues dans l'administration
- Pour effectuer l'update et le delete d'une news
- L'update devra vérifier qu'on modifie avec des champs corrects la news sélectionnée de l'utilisateur connecté
- Le delete aura une page de confirmation avec l'affichage du titre et le choix "supprimer"/"annuler"

## Bon travail !
