<?php

require_once CLASSES.DS.'db.php';

class EmployeeModel {
    public function construct(){}
    public function listAll(){
      $sql='select *
      from utilisateur 
      ';
      try {
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
          die();
      }
    }
    public function listOne($id){
      $sql='select E.*, C.*,E.Title as ETitle, C.Title as CTitle, EM.Title as EMTitle, CM.Title as CMTitle, CM.FirstName as CMFirstName, CM.MiddleName as CMMiddleName, CM.LastName as CMLastName
      from employee as E
      inner join contact as C on E.ContactID=C.ContactID
      left join employee as EM on E.ManagerID=EM.EmployeeID
      left join contact as CM on EM.ContactID=CM.ContactID
      where E.EmployeeID=:id';
      try {
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
       
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
          die();
      }
    }
}
?>