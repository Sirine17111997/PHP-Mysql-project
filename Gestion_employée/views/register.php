<?php
if(isset($_POST['submit'])){
 $data= new userController();
 $data->register();
}
?>

<div class="container">
    <div class="row my-3 ">
        <div class="col-md-6 mx-auto">
           
            <div class="card">
            	<div class="card-header">
            		<h3> connexion</h3>
            	</div>
            
                <div class="card-body bg-light">
                	<form method="post" class="mr-1"  >
                	   <div class="form-group">
                       <label >Fullname</label>
                       <input type="text" class="form-control" placeholder="Nom & Prénom" name="fullname" >
                       </div>
                       <div class="form-group">
                       <label >username</label>
                       <input type="text" class="form-control" placeholder="pseudo" name="username">
                       </div>

                        <div class="form-group">
                       <label >Password</label>
                       <input type="password" class="form-control" placeholder="password" name="password">
                       </div>
                       <button type="submit" class="btn btn-primary" name="submit">Inscription </button>
                      </form>
               </div>
              <div class ="card-footer">
              	<a href="<?php echo BASE_URL;?>login" class="btn btn-link">connexion</a>
              	
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
