<?php


class Thenews
{
    // cet attribut est ajouté depuis la table theuser, il sera utile pour instancier des news lorsqu'on aura besoin du le login de l'utilisateur, ceci pour permettre les jointures dans les méthodes de ThenewManager sans à avoir à utiliser des sous-requêtes ou de multiples objets.
    private string $theUserLogin;

    // EXERCICE créez les autres attributs (noms des champs dans le table "thenews")
    private int $idtheNews;
    private string $theNewsTitle;
    private string $theNewsText;
    private string $theNewsDate;
    private int $theUser_idtheUser;


    // EXERCICE créez le constructeur
    // constructeur de thenews (Appelé lors de l'instanciation par new Article($param)), le tableau $param est obligatoire
    public function __construct(Array $ma_param){
        // hydratation de l'instance avec les valeurs dans le tableau
        $this->hydrate($ma_param);
    }

    // EXERCICE créez l'hydratateur
    private function hydrate(Array $ma_datas){
        foreach($ma_datas as $key => $ma_value){
            $methodSetters = "set".ucfirst($key);
            if(method_exists($this,$methodSetters)){
                $this->$methodSetters($ma_value);
            }
        }
    }
    // EXERCICE créez les getters et setters des attributs propre à cette table, n'oubliez pas de protéger les champs avec les setters !
    public function getIdTheNews(): int
    {
        return $this->idtheNews;
    }

    public function getTheNewsTitle(): ?string
    {
        return $this->theNewsTitle;
    }

    public function getTheNewsText(): ?string
    {
        return $this->theNewsText;
    }

    public function getTheNewsDate(): string
    {
        return $this->theNewsDate;
    }

    public function getTheUser_idTheUser(): int
    {
        return $this->theUser_idtheUser;
    }

    // Getters et Setters utiles pour theUserLogin
    /**
     * $theUserLogin's getter
     * @return string
     */
    public function getTheUserLogin(): string
    {
        return $this->theUserLogin;
    }

    /**
     * $theUserLogin's setter
     * @param string $theUserLogin
     */
    public function setTheUserLogin(string $theUserLogin): void
    {
        $theUserLogin = strip_tags(trim($theUserLogin));
        if(strlen($theUserLogin)<3 || strlen($theUserLogin)>60){
            trigger_error("Le login doit être plus grand que 2 et plus petit que 60 caractères!",E_USER_NOTICE );
        }else {
            $this->theUserLogin = $theUserLogin;
        }
    }
    
    public function setIdTheNews(int $idtheNews): void
    {
        $this->idtheNews= $idtheNews;
    }

    public function setTheNewsTitle(string $theNewsTitle): void
    {
         $title = strip_tags(trim($theNewsTitle));
        if(empty($title)){
            trigger_error("Votre titre ne peut être vide",E_USER_NOTICE);
        }elseif (strlen($title)>180){
            trigger_error("Votre titre ne peut pas dépasser 180 caractères",E_USER_NOTICE);
        }else{
            $this->theNewsTitle = $title;
        }

        
    }

    public function setTheNewsText(string $theNewsText): void
    {
        $text = strip_tags(trim($theNewsText),"<br>,<p>,<div>,<a>,<img>");
        if(empty($text)){
            print("Votre texte ne peut être vide");
        }else {
            $this->theNewsText = $theNewsText;
        }
    }

    public function setTheNewsDate(string $theNewsDate): void {
        $newDate = new DateTime($theNewsDate);
        if(!(is_object($newDate))){
            print("Le format de la date n'est pas valide");
        }else {
            $this->theNewsDate = $theNewsDate;
        }
    }
    public function setTheUser_idTheUser(int $theUser_idtheUser): void
    {
        $this->theUser_idtheUser = $theUser_idtheUser;
        ;
    }


}