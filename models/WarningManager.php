<?php

class WarningManager extends Model
{
    public function addWarning($id)
    {
        $date = date('Y-m-d H:i:s');
        $autor = $this->userManager->getUserConnecte();
        var_dump($id);
        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO `warning` (`id`, `message`, `commentaire`, `user`, `date`) 
        VALUES (NULL, 'warning', :id, :autor, :newDate)");
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':autor',$autor,PDO::PARAM_INT);
        $req->bindParam(':newDate',$date);
        $req->execute();
    }
    public function isWarningBy($id)
    {
        
    }
}