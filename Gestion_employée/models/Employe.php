<?php
class  Employe
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM employes');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
  }
    static public function getEmploye($data){
  	     $id = $data['id'];
  	     try{
         
            $stmt = DB::connect()->prepare('SELECT * FROM employes WHERE id =:id' );
            $stmt->execute(array(':id' =>$id));
            $employe = $stmt->fetch(PDO::FETCH_OBJ);
            return $employe;

  	     }catch(PDOException $ex){
  	     	echo 'erreur' . $ex->getMessage();

  	     }
  	}
  static public function add($data){
  	  $stmt = DB::connect()->prepare('INSERT INTO  employes(nom,prenom,matricule,depart,poste,date_emp,statut) VALUES (:nom,:prenom,:matricule,:depart,:poste,:date_emp,:statut)');
  	   $stmt->bindParam(':nom',$data['nom']);
  	   $stmt->bindParam(':prenom',$data['prenom']);
  	   $stmt->bindParam(':matricule',$data['matricule']);
  	   $stmt->bindParam(':depart',$data['depart']);
  	   $stmt->bindParam(':poste',$data['poste']);
  	   $stmt->bindParam(':date_emp',$data['date_emp']);
  	   $stmt->bindParam(':statut',$data['statut']);
  	    if($stmt->execute()){
  	    	return 'ok';

  	    }else
  	    {
  	    	return 'erreur';
  	    }
  	    $stmt->close();
  	    $stmt= null;
  }
  static public function update($data){
  	  $stmt = DB::connect()->prepare('UPDATE employes SET nom = :nom,prenom =:prenom,matricule=:matricule,depart=:depart,poste=:poste,date_emp=:date_emp,statut=:statut WHERE id=:id'); 
       $stmt->bindParam(':id',$data['id']);
  	   $stmt->bindParam(':nom',$data['nom']);
  	   $stmt->bindParam(':prenom',$data['prenom']);
  	   $stmt->bindParam(':matricule',$data['matricule']);
  	   $stmt->bindParam(':depart',$data['depart']);
  	   $stmt->bindParam(':poste',$data['poste']);
  	   $stmt->bindParam(':date_emp',$data['date_emp']);
  	   $stmt->bindParam(':statut',$data['statut']);
  	   
  	   if($stmt->execute()){
  	    	return 'ok';

  	    }else
  	    {
  	    	return 'erreur';
  	    }
  	    $stmt->close();
  	    $stmt= null;
  }
  static function delete ($data){
  	 $id = $data['id'];
  	     try{
         
            $stmt = DB::connect()->prepare('DELETE FROM employes WHERE id =:id' );
            $stmt->execute(array(':id' =>$id));
            if($stmt->execute()){
  	    	return 'ok';}
            
  	     }catch(PDOException $ex){
  	     	echo 'erreur' . $ex->getMessage();

  	  }
  	
  }
  static public function find($data){
    $search=$data['search'];
   
     try{
         
            $stmt = DB::connect()->prepare('SELECT * FROM employes WHERE nom LIKE ? OR prenom LIKE ?');
            $stmt->execute(array('%'.$search.'%','%'.$search.'%'));

            $employes=$stmt->fetchAll();
            return $employes;
            
         }catch(PDOException $ex){
          echo 'erreur' . $ex->getMessage();

      }
  }

}
