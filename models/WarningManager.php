<?php

class WarningManager extends Model
{
    private $_userManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
    }
    public function countWarning() :int
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT COUNT(*)  FROM warning' );
        $req->execute();
        return (int) $req->fetch()[0];
    }
    public function getAllWarning()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM warning');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'warning');
    }
    public function addWarning($id)
    {
        $date = date('Y-m-d H:i:s');
        $autor = $this->_userManager->getUserConnecte();
        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO `warning` (`id`, `message`, `commentaire`, `user`, `date`) 
        VALUES (NULL, 'warning', :id, :autor, :newDate)");
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':autor',$autor,PDO::PARAM_INT);
        $req->bindParam(':newDate',$date);
        $req->execute();
    }
    /**
     * @param {int} id du commentaire.
     */
    function deleteWarningByComment($id):void
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('DELETE FROM warning WHERE commentaire = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
        
    }
    public function isWarningBy($id)
    {
        
    }
}