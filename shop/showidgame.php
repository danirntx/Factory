<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Mostrar Datos</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 </head>

<body>
 <?php
function __autoload($class){
 include_once($class.".php");

}
 $obj=new oopCrud;


extract($obj->getByIdJuegos($_REQUEST['id'],"juegos"));
echo <<<show
</br>
<div class="container">
 <div class="btn-group">
 <a class="btn" href="showgame.php">Atras</a>
 </div>
 <h3>Datos del juego</h3>
 <form action="updateuser.php" method="post">
 <table width="500" border="1">
 <tr>
 <th scope="row">Id</th>
 <td><input type="text" name="id" value="$idjuego" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Nombre</th>
 <td><input type="text" name="name" value="$nombre" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Precio</th>
 <td><input type="text" name="subname" value="$precio" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Categoria</th>
 <td><input type="text" name="email" value="$categoria" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Imagen</th>
 <td><img src='$imagen'></td>
 </tr>
 <tr>
 <th scope="row">Descripcion</th>
 <td><input type="text" name="admin" value="$descripcion" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Clave Juego</th>
 <td><input type="text" name="user" value="$clavejuego" readonly="readonly"></td>
 </tr>
 <tr>
 </table>
 </form>
</div>
show;
?>

</body>
</html>

