  
<?php


class ThenewsManager
{
    // EXERCICE créez le manager complet avec la connexion MyPDO en argument et toutes les méthodes nécessaires au CRUD des "thenews"
    
    // Attribut
    private MyPDO $db;

    // Method
    public function __construct(MyPDO $connect){
        $this->db = $connect;
    }
    //fonction pour sélectionner le login utilisateur
    public function selectTheUserLog($id){
        $query = "SELECT idtheUser, theUserLogin FROM theuser WHERE idtheUser= ?";
        $request = $this->db->prepare($query);
        try {
            $request->execute([$id]);
            if ($request->rowCount()) {
                $login = $request->fetch(PDO::FETCH_ASSOC);
                return $login['theUserLogin'];
            }
            return [];
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


// Lecture de toutes les News
public function readAllTheNews(): Array {
    $query = "SELECT * FROM thenews ORDER BY theNewsDate DESC";
    $recupAll = $this->db->query($query);
    if($recupAll->rowCount()) {
        return $recupAll->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return [];
    }
}
// Sélection d'une News par son id
public function UniqNewsById(int $id): Array{
    // préparation de la requête
    $query = "SELECT * FROM thenews WHERE idtheNews=?";
    $prepare = $this->db->prepare($query);
    $prepare->bindValue(1,$id,PDO::PARAM_INT);
    $prepare->execute();
    // on a une ligne de résultat
    if($prepare->rowCount()){
        return $prepare->fetch(PDO::FETCH_ASSOC);
    }
    // pas de résultats
    return [];
}
//Sélection d'une News par son auteur
public function selectTheNewsByAuthor($id): array {
    $query = "SELECT * FROM thenews WHERE theUser_idtheUser = $id ORDER BY theNewsDate DESC";
    $read = $this->db->query($query);
    if ($read->rowCount()) {
        return $read->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}
// insertion dans la table thenews
public function insertNews(Thenews $datas){
    $query = "INSERT INTO thenews (theNewsTitle, theNewsText, theNewsDate, theUser_idtheUser) VALUES (?,?,?,?); ";
    $request = $this->db->prepare($query);
    try {
        $request->execute([
            $datas->getTheNewsTitle(),
            $datas->getTheNewsText(),
            $datas->getTheNewsDate(),
            $datas->getTheUser_idTheUser()]
        );
        return true;
    } catch (Exception $e){
            return $e->getMessage();
    }


    
}
//Suppression d'une News par son ID
public function deleteTheNewsById(int $id) {
    $query = "DELETE FROM thenews WHERE idtheNews = ?";
    $prepare = $this->db->prepare($query);
    try{
        $prepare->execute([$id]);
        return true;
    }catch(PDOException $exception){
        return $exception->getMessage();
    }
}
//Mise à jour d'une news par son ID
public function updateTheNewsById(Thenews $theNews, int $idTheNews){
    if($idTheNews == $theNews->getIdTheNews()){
        $query = "UPDATE thenews SET theNewsTitle = :theNewsTitle,theNewsText= :theNewsText,theNewsDate= :theNewsDate,theUser_idtheUser= :theUser_idtheUser WHERE idtheNews :idTheNews";
        $prepare= $this->db->prepare($query);
        $prepare->bindValue("idTheNews",$theNews->getIdTheNews(),PDO::PARAM_INT);
        $prepare->bindValue("theNewsTitle",$theNews->getTheNewsTitle(),PDO::PARAM_STR);
        $prepare->bindValue("theNewsText",$theNews->getTheNewsText(),PDO::PARAM_STR);
        $prepare->bindValue("theNewsDate",$theNews->getTheNewsDate(),PDO::PARAM_STR);
        $prepare->bindValue("theUser_idtheUser",$theNews->getTheUser_idTheUser(),PDO::PARAM_STR);
        try{
            $prepare->execute();
            return true;
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }else{
        return "Pas touche à mes articles, non mais !";
    }
}
// function qui va permettre de couper les x premiers caractères sans couper de mots, le mot clef static va permettre d'utiliser cette méthode sans devoir instancier la classe ThenewsManager
public static function cutTheText(string $text, int $nbChars): string{
    $cutText = substr($text,0,$nbChars);
    return $cutText = substr($cutText,0,strrpos($cutText," "));
}

public static function nl2br(string $text): string {
    return nl2br($text);
}
    }
    
     