<?php
 class userController{
 	
 	public function register(){
 		if(isset($_POST['submit'])){
 			$options = [ 'cost '=> 12 ];
 		$password =password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
        $data = array(
        	    'fullname' => $_POST['fullname'],
    		    'username' => $_POST['username'],
    			'password' => $password,);
        $result =user::CreateUser($data);
        if($result === 'ok'){
    			session::set('success' ,'utilisateur crée');
    			redirect::to('login');

    		}else
    		{
    			echo $result;
    		}
    	}


 		}
 		public function auth(){
 		if(isset($_POST["submit"])){
 		   $data['username']=$_POST['username'];
    		$result = user::login($data);
    		 
            if($result->username === $_POST['username'] && password_verify($_POST["password"] , $result->password)){
            	$_SESSION['logged'] = true;
            	$_SESSION['username'] = $result->username;
               
    			redirect::to('home');
    		}else
            {
            	 session::set('erreur' ,'pseudo ou mot de passe incorrect');
    			 redirect::to('login');
    		}
    	
 		}
 	}
 	static function logout(){
 		session_destroy();
 	}
 	
 }
?>