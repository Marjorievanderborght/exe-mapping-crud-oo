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

// Read all from News
public function readAllNews(): Array {
    $sql = "SELECT * FROM thenews ORDER BY theNewsDate DESC";
    $recupAll = $this->db->query($sql);
    if($recupAll->rowCount()) {
        return $recupAll->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return [];
    }
}
// select one News by id
public function readOneNewsById(int $id): Array{
    // prepare request
    $sql = "SELECT * FROM thenews WHERE idtheNews=?";
    $prepare = $this->db->prepare($sql);
    $prepare->bindValue(1,$id,PDO::PARAM_INT);
    $prepare->execute();
    // on a une ligne de résultat
    if($prepare->rowCount()){
        return $prepare->fetch(PDO::FETCH_ASSOC);
    }
    // pas de résultats
    return [];
}

// insert into table Article
public function insertNews(News $item){
    $sql = "INSERT INTO thenews (theNewsTitle,theNewsText,theNewsDate) VALUES (?,?,?)";
    $request = $this->db->prepare($sql);
    // essai d'insertion
    try {
        $request->execute([
                $item->getArticleTitle(),
                $item->getArticleSlug(),
                $item->getArticleText(),
                $item->getArticleAuthor()]
        );
        return true;
    // si erreur d'insertion
    }catch (Exception $e){
        // si c'est le slug qui est dupliqué (champs unique)
        if(strstr($e->getMessage(),"articleSlug_UNIQUE")){
            // on réinsert en changeant le nom du slug
            $request->execute([
                    $item->getArticleTitle(),
                    $item->getArticleSlug()."-".uniqid(),
                    $item->getArticleText(),
                    $item->getArticleAuthor()]
            );
            return true;

        }else{
            return $e->getMessage();
        }
    }

}
}