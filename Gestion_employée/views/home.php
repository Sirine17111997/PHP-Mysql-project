<?php
if(isset($_POST['find'])){
  $data = new EmployeController();
  $employes =$data->findemploye();

}else{
   $data = new EmployeController();
   $employes = $data->getAllEmployes(); 
}
 
 ?>
<style>
    body{
        background-color: antiquewhite;
    }
</style>
<header>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#" >GESTION EMPLOYES </a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Acceuil <span class="sr-only">(current)</span></a>
                </li>

            </ul>
                <a href="<?php  echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-sm btn-secondary mr-2">
                    <i class="fas fa-user mr-2"> <?php echo $_SESSION['username'];?></i></a>
                <a href="<?php  echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2">
                    <i class="fas fa-home"></i></a>
            <form class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="find">Search</button>
            </form>
        </div>
    </nav>
</header>
<div class="container">
    <div class="row my-4 ">
        <div class="col-md-10 mx-auto">
           <?php include('./views/includes/alerts.php');?>

            <div class="card">
            
                <div class="card-body bg-light">
                    <a href="<?php  echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2">
                    <i class="fas fa-plus"></i></a>
                    <table class="table table-hover">
                        <thead>
                           <tr>
                              <th scope="col">Nom & prénom</th>
                              <th scope="col">Matricule</th>
                              <th scope="col">Départemenet</th>
                              <th scope="col">Poste</th>
                              <th scope="col">Date Embauche</th>
                              <th scope="col">Statut</th>
                               <th scope="col">Action</th>

                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employes as $employe):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $employe['nom'].' '.$employe['prenom']; ?></th>
                            <td><?php  echo $employe['matricule'];?></td>
                            <td><?php echo $employe['depart'];?></td>
                            <td><?php echo $employe['poste'];?></td>

                            <td><?php echo $employe['date_emp'];?></td>
                            <td><?php echo $employe['statut']
                                ?
                                '<span class ="badge badge-success">Active</span>'
                                :
                                    '<span class ="badge badge-danger">Resilié</span>'
                                ;?></td>
                            <td class="d-flex flex-row">
                                <form method="post" class="mr-1" action="update">
                                    <input type="hidden" name="id" value="<?php  echo $employe['id'];?>" >
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                </form>
                                 <form method="post" class="mr-1" action="delete">
                                    <input type="hidden" name="id" value="<?php  echo $employe['id'];?>" >
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>

                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
