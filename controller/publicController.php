<?php
/*
 * Contrôleur public
 */

// Vue de la connexion
if(isset($_GET['connect'])){
    // cliquez pour envoyer
    if(!empty($_POST)){
        // créez une instance et hydratez Theuser
        $recupUser = new Theuser($_POST);
        // Essayer de se connecter
        $connectUser = $userManager->connectUser($recupUser);
        // connexion ok (strict true)
        if($connectUser===true){
            header("Location: ./");
            exit();
        }
        // connexion non ok sans erreur SQL (false)
        if(!$connectUser){
            $message = "Login et/ou mot de passe incorrect";
        // sql error
        }else{
            $message = $connectUser;
        }
    }
    require_once "../view/public/connectPublicView.php";
    exit();
}

// article detail view
if(isset($_GET['idarticle'])&&ctype_digit($_GET['idarticle'])){
    // exercice's action
$recupUniqNews = $ThenewsManager->UniqNewsById($_GET['idarticle']);
if(empty($recupUniqNews)){
    $error = "cette news n'existe pas ou n'existe plus";
}else{
    $theNews[] = new Thenews($recupUniqNews);
}
    // view
    require_once "../view/public/articlePublicView.php";
    exit();
}

// author detail view
if(isset($_GET['idauteur'])&&ctype_digit($_GET['idauteur'])){
    // select author
    $iduser = (int) $_GET['idauteur'];
    $recup = $userManager->selectOneUserById($iduser);
    // no sql error
    if(is_array($recup)){
        // user exist
        if(!empty($recup)){
            $user = new Theuser($recup);
        }else{
            $message = "Cet utilisateur n'existe plus";
        }
    }else{
        $message = $recup;
    }


    // exercice's action
    $recupAllNewsByAuthor = $ThenewsManager->selectTheNewsByAuthor($iduser);
    if(empty($recupAllNewsByAuthor)){
        $error= "pas de news existantes pour cet auteur";
    }else{
        foreach($recupAllNewsByAuthor as $datas){
            $afficherAllTheNewsByAuthor[] = new Thenews($datas);
        }
    }

    // view
    require_once "../view/public/auteurPublicView.php";
    exit();
}
$recupAllTheNews = $ThenewsManager->readAllTheNews();
if(empty($recupAllTheNews)){
    $error = "Pas de news existantes";
}else{
    foreach($recupAllTheNews as $datas){
        $afficherAllTheNews[] = new Thenews($datas);
    }
}
// home view
require_once "../view/public/indexPublicView.php";