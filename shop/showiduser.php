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


extract($obj->getByIdUsuarios($_REQUEST['id'],"usuarios"));
echo <<<show
</br>
<div class="container">
 <div class="btn-group">
 <a class="btn" href="showuser.php">Atras</a>
 </div>
 <h3>Datos del usuario</h3>
 <form action="updateuser.php" method="post">
 <table width="500" border="1">
 <tr>
 <th scope="row">Id</th>
 <td><input type="text" name="id" value="$idusuario" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Nombre</th>
 <td><input type="text" name="name" value="$nombre" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Apellido</th>
 <td><input type="text" name="subname" value="$apellido" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Email</th>
 <td><input type="text" name="email" value="$email" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Direccion</th>
 <td><input type="text" name="address" value="$direccion" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Administrador</th>
 <td><input type="text" name="admin" value="$administrador" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Usuario</th>
 <td><input type="text" name="user" value="$usuario" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Contraseña</th>
 <td><input type="text" name="pass" value="$clave" readonly="readonly"></td>
 </tr>
 <tr>
 </table>
 </form>
</div>
show;
?>

</body>
</html>

