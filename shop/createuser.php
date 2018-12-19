<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Insert Data</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 </head>

<body>
 <?php
function __autoload($class){
 include_once($class.".php");

}
 $obj=new oopCrud;

if(isset($_REQUEST['insert'])){
 extract($_REQUEST);
 if($obj->insertDataUsuarios($name,$subname,$email,$address,$admin,$user,$pass,"usuarios")){
 header("location:showuser.php?status_insertuser=success");
 }

}
echo @<<<show
 </br>
 <div class="container">
 <div class="container">
 <div class="btn-group">
 <a class="btn" href="showuser.php">Atras</a>
 </div>
 <h3>Insert Your Data</h3>
 <form action="createuser.php" method="post">
 <table width="400" class="table-borderd">
 <tr>
 <td><input type="hidden" name="id" value="$id" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Nombre</th>
 <td><input type="text" name="name" value="$name"></td>
 </tr>
 <tr>
 <th scope="row">Apellido</th>
 <td><input type="text" name="subname" value="$subname"></td>
 </tr>
 <tr>
 <th scope="row">Email</th>
 <td><input type="text" name="email" value="$email"></td>
 </tr>
 <tr>
 <th scope="row">Direccion</th>
 <td><input type="text" name="address" value="$address"></td>
 </tr>
 <tr>
 <td><input type="hidden" name="admin" value="$admin"></td>
 </tr>
 <tr>
 <th scope="row">Usuario</th>
 <td><input type="text" name="user" value="$user"></td>
 </tr>
 <tr>
 <th scope="row">Contraseña</th>
 <td><input type="password" name="pass" value="$pass"></td>
 </tr>
 <tr>
 <th scope="row">&nbsp;</th>
 <td><input type="submit" name="insert" value="Insert" class="btn"></td>
 </tr>
 </table>
 </form>
</div>
show;
?>

</body>
</html>
