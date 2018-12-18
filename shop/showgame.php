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
if($obj->deleteDatajuego($_REQUEST['del_id'],"juegos")){

 echo"Your Data Successfully Deleted";
}
}
?>
<div class="container">
 <div class="btn-group">
<a href="showuser.php" class="btn ">Usuarios</a>	
</div>
 <h3 >Todos los Juegos</h3>
 <table width="750" border="1" class="table-striped">
 <tr class="success">
 <th scope="col">Nombre</th>
 <th scope="col">Precio</th>
 <th scope="col">Categoria</th>
 <th scope="col">Imagen</th>
 </tr>
 <?php
 foreach($obj->showData("juegos") as $value){
 extract($value);
 echo <<<show
 <tr class="success">
 <td>$nombre</td>
 <td>$precio</td>
 <td>$categoria</td>
 <td><img src="$imagen"></td>
 <td><a class="btn" href="showidgame.php?id=$idjuego">Leer</a>
 &nbsp;&nbsp;<a class="btn btn-success" href="updategame.php?id=$idjuego">Actualizar</a>
 &nbsp;&nbsp;<a class="btn btn-danger" href="showgame.php?del_id=$idjuego">Borrar</a>

 </tr>
show;
 }
 ?>
 <tr class="success">
 <th scope="col" colspan="5" align="right">
 <div class="btn-group">
 <a class="btn btn-success" href="creategame.php">Insertar Juego</a>
 </div>
 </th>

 </tr>
 </table>
</div>

<body>
</body>
</html>