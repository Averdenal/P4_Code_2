<?php 

class RangManager extends Model{
    public function getAllRang()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * From rang');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'Rang');
    }
}