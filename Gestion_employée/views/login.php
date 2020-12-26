<?php
 if(isset($_POST["submit"])){
  $userdata= new userController();
  $userdata->auth();
 }
?>
<div class="container">
    <div class="row my-4 ">
        <div class="col-md-6 mx-auto">
           <?php include('./views/includes/alerts.php');?>

            <div class="card">
            	<div class="card-header">
            		<h3> connexion</h3>
            	</div>
            
                <div class="card-body bg-light">
                	<form method="post" class="mr-1"  >
                	 <div class="form-group">
                       <label >username</label>
                       <input type="text" class="form-control" placeholder="pseudo" name="username">
                       </div>
                        <div class="form-group">
                       <label for="exampleInputPassword1">Password</label>
                       <input type="password" class="form-control" placeholder="password" name="password">
                       </div>
                       <button type="submit" class="btn btn-primary" name="submit">Connexion </button>
              </form>
              </div>
              <div class ="card-footer ">
              	<a href="<?php echo BASE_URL;?>register" class="btn btn-link">Inscription</a>
              	
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
