<?php

 class user{
 	static public function login($data){
 		$username = $data['username'];
 		 try{
         
            $stmt = DB::connect()->prepare('SELECT * FROM user WHERE username=:username' );
            $stmt->execute(array(':username' => $username));
            $users = $stmt->fetch(PDO::FETCH_OBJ);
            return $users;
            if($stmt->execute()){
  	    	return 'ok';}
            
  	        }catch(PDOException $ex){
  	     	echo 'erreur' . $ex->getMessage();

  	  }
  	
  }
 	
 	static function CreateUser($data){
 	   $stmt = DB::connect()->prepare('INSERT INTO user(fullname,username,password) VALUES (:fullname,:username,:password)');
  	   $stmt->bindParam(':fullname',$data['fullname']);
  	   $stmt->bindParam(':username',$data['username']);
  	   $stmt->bindParam(':password',$data['password']);
  	  
  	   if($stmt->execute()){
  	    	return 'ok';

  	    }else
  	    {
  	    	return 'erreur';
  	    }
  	    $stmt->close();
  	    $stmt=null;
  	   
 }
}
?>