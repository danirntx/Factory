<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Show Table</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <script type="text/javascript" src="js/bootstrap.js"></script>
 </head>

<?php

function __autoload($class){
 include_once($class.".php");
}
 $obj=new oopCrud;

if(isset($_REQUEST['status'])){
 echo"Your Data Successfully Updated";
}

if(isset($_REQUEST['status_insert'])){
 echo"Your Data Successfully Inserted";
}

if(isset($_REQUEST['del_id'])){
if($obj->deleteDatausuario($_REQUEST['del_id'],"usuarios")){

 echo"Your Data Successfully Deleted";
}
}
?>
<div class="container">
 <div class="btn-group">
 <a href="showgame.php" class="btn ">Juegos</a>
</div>
 <h3 >Todos los Usuarios</h3>
 <table width="750" border="1" class="table-striped">
 <tr class="success">
 <th scope="col">Usuario</th>
 <th scope="col">Nombre</th>
 <th scope="col">Apellido</th>
 <th scope="col">Email</th>
 <th scope="col">Direccion</th>
 </tr>
 <?php
 foreach($obj->showData("usuarios") as $value){
 extract($value);
 echo <<<show
 <tr class="success">
 <td>$usuario</td>
 <td>$nombre</td>
 <td>$apellido</td>
 <td>$email</td>
 <td>$direccion</td>
 <td><a class="btn" href="showiduser.php?id=$idusuario">Leer</a>
 &nbsp;&nbsp;<a class="btn btn-success" href="updateuser.php?id=$idusuario">Actualizar</a>
 &nbsp;&nbsp;<a class="btn btn-danger" href="showuser.php?del_id=$idusuario">Borrar</a>
 </tr>
show;
 }
 ?>
 <tr class="success">
 <th scope="col" colspan="5" align="right">
 <div class="btn-group">
 <a class="btn btn-success" href="createuser.php">Insertar Usuario</a>
 </div>
 </th>

 </tr>
 </table>
</div>

<body>
</body>
</html>