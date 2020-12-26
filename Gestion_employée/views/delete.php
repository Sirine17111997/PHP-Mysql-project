<?php
 if (isset($_POST['id'])){
    $data = new EmployeController();
    $data->deleteEmploye();
   
}