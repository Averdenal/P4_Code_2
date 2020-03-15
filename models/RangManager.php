<?php 

class RangManager extends Model{
    public function getAllRang()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * From rangs');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'Rang');
    }
    public function getRangById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * From rangs WHERE id = :id');
        $req->bindParam(':id', $id , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('Rang');
    }
}