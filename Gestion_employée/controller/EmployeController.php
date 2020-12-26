<?php
class EmployeController{
    public function getAllEmployes(){
        $employes=Employe::getAll();
        return $employes;
    }
    public function getOneEmploye(){
    	if(isset( $_POST ['id'])){
    		$data = array('id' => $_POST['id'] );
    	
    	    $employe = Employe::getEmploye($data);
    	    return $employe;
        }
    }
     public function updateEmploye(){
    	if(isset($_POST['submit'])){
    		$data=array(
    			'id'=>$_POST['id'],
    			'nom'=>$_POST['nom'],
    			'prenom'=>$_POST['prénom'],
    			'matricule'=>$_POST['matricule'],
    			'depart'=>$_POST['depart'],
    			
    			'poste'=>$_POST['poste'],
    			'date_emp'=>$_POST['date_em'],
    			'statut'=>$_POST['statut']
    		);
    		$resultat = Employe::update($data);
    		if($resultat === 'ok'){
    			session::set('success' ,'Employé modifié');
                redirect::to('home');
    			

    		}else
    		{
    			echo $resultat;
    		}
    	}
    }
    public function addEmploye(){
    	if(isset($_POST['submit'])){
    		$data=array(
    			'nom'=>$_POST['nom'],
    			'prenom'=>$_POST['prénom'],
    			'matricule'=>$_POST['matricule'],
    			'depart'=>$_POST['depart'],
    			
    			'poste'=>$_POST['poste'],
    			'date_emp'=>$_POST['date_em'],
    			'statut'=>$_POST['statut']
    		);
    		$resultat = Employe::add($data);
    		if($resultat === 'ok'){
    			session::set('success' ,'Employé ajouté');
    			redirect::to('home');

    		}else
    		{
    			echo $resultat;
    		}
    	}
    }
    public function deleteEmploye(){
    	if(isset($_POST['id'])){
    		$data['id']=$_POST['id'];
    		$result = Employe::delete($data);
    		 session::set('success' ,'Employé supprimé');

    		if($result === 'ok'){

    			redirect::to('home');
    		}else
    		{
    			echo $resultat;
    		}
    	}
    }
    public function findemploye(){
    	if(isset($_POST['search'])){
    		$data = array('search' => $_POST["search"]);

    	}
    	$employes=Employe::find($data);
    	return $employes; 
    }
}