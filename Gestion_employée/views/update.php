<?php
 if (isset($_POST['id'])){
    $data = new EmployeController();
    $employe = $data->getOneEmploye();
   
}else{
    redirect::to('home');
}
if (isset($_POST['submit'])){
     $data = new EmployeController();
     $data->updateEmploye();

}
?>
<div class="container">
    <div class="row my-4 ">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <center>
                <div class="card-header"> Modifier un employé</div></center>
                 <div class="card-body bg-light">
                    <a href="<?php  echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2">
                    <i class="fas fa-home"></i></a>

                    <form method="post">
                        <div class="form-group">
                            <label for="nom">Nom*</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom"  value="<?php echo $employe->nom;?>">

                        </div>
                        <div class="form-group">
                            <label for="prénom">Prénom*</label>
                            <input type="text" name="prénom" class="form-control" placeholder="prénom" value="<?php echo $employe->prenom;?>">

                        </div>
                        <div class="form-group">
                            <label for="mat">Matricule*</label>
                            <input type="text" name="matricule" class="form-control" placeholder="Matricule" value="<?php echo $employe->matricule;?>">

                        </div>
                        <div class="form-group">
                            <label for="depart">Département*</label>
                            <input type="text" name="depart" class="form-control" placeholder="Département" value="<?php echo $employe->depart;?>">
                            <input type="hidden" name="id" value="<?php  echo $employe->id ;?>" >
                        </div>
                        <div class="form-group">
                            <label for="poste">Poste*</label>
                            <input type="text" name="poste" class="form-control" placeholder="poste" value="<?php echo $employe->poste;?>">

                        </div>
                        <div class="form-group">
                            <label for="date Embauche">Date Embauche*</label>
                            <input type="date" name="date_em" class="form-control" placeholder="Date" value="<?php echo $employe->date_emp;?>">

                        </div>
                        <div class="form-group" >
                            <select class="form-control" name="statut">
                                <option value="1" <?php echo $employe->statut ? 'selected' : ''; ?>>
                                    Active
                                </option>
                                <option value="0"  <?php echo !$employe->statut ? 'selected' : ''; ?>>Résilié</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                            
                        </div>

                    </form>







