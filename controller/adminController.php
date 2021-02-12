<?php
/*
 * Admin's controller
 */

// Disconnect
if (isset($_GET['disconnect'])) {
    if (TheuserManager::disconnectUser()) {
        header("Location: ./");
        exit();
    }
}

// create News
if (isset($_GET['create'])) {

    // exercice's action
    if (!empty($_POST)) {
        $insert = new Thenews($_POST);

        $recup = $thenewsManager->insertNews($insert);

        var_dump($recup);
        if ($recup === true) {
            header("Location: ./");
        }
    }

    // form view
    require_once "../view/admin/createAdminView.php";
    exit();
}
// update News
if (isset($_GET['update']) && ctype_digit($_GET['update'])) {

    $theNewsUniq = $thenewsManager->UniqNewsById($_GET['update']);
    $theNews = new Thenews($theNewsUniq);

    if ($theNews->getTheUser_idtheUser() != $_SESSION['idtheUser']) {
        header("Location: ./");
    }

    if (!empty($_POST)) {
        //var_dump($_POST);
        $UpdateTheNews = new Thenews($_POST);
        $update = $thenewsManager->updateTheNewsById($UpdateTheNews, $_GET['update']);

        if ($update === true) {
            header("Location: ./");
            exit();
        }
    }

    require_once "../view/admin/articleAdminUpdateView.php";
    exit();
}
// delete article
if (isset($_GET['delete']) && ctype_digit($_GET['delete'])) {

    $theNewsUniq = $thenewsManager->UniqNewsById($_GET['delete']);
    $theNews = new Thenews($theNewsUniq);

    if ($theNews->getTheUser_idtheUser() != $_SESSION['idtheUser']) {
        header("Location: ./");
    }

    if (isset($_GET['ok'])) {
        $delete = $thenewsManager->deleteTheNewsById($_GET['delete']);
        if ($delete === true) {
            header("Location: ./");
            exit();
        }
    }

    require_once "../view/admin/articleAdminDeleteView.php";
    exit();
}

// detail admin article
if (isset($_GET['idarticle']) && ctype_digit($_GET['idarticle'])) {

    // exercice's action
    $recupUniqNews = $thenewsManager->UniqNewsById($_GET['idarticle']);
    if (empty($recupUniqNews)) {
        $error = "Cette news n'existe pas ou n'existe plus";
    } else {
        $theNews = new Thenews($recupUniqNews);
    }

    if ($theNews->getTheUser_idtheUser() != $_SESSION['idtheUser']) {
        header("Location: ./");
    }

    // form view
    require_once "../view/admin/articleAdminView.php";
    exit();
}

$newsForTheUser = $thenewsManager->selectTheNewsByAuthor($_SESSION['idtheUser']);
if (!empty($newsForTheUser)) {
    foreach ($newsForTheUser as $item) {
        $newsOfUser[] = new Thenews($item);
    }

} else {
    $error = "Pas encore de news";
}

// homepage admin view
require_once "../view/admin/indexAdminView.php";
