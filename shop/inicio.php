<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<a href="index.php" class="btn">Inicio</a>
<form action="./inicio.php" method="POST">
	<p>Usuario: <input type="text" id="usuario" name="usuario" placeholder="Usuario"></p>
	<p>Contraseña: <input type="password" id="password" name="password" placeholder="Contraseña"></p>
	<input type="submit" name="enviar" value="Iniciar Sesion">
</form>

<?php
function __autoload($class){
 include_once($class.".php");
}
 $obj=new oopCrud;
if (isset($_POST['enviar'])) {
	$obj->iniciarSesion($_POST['usuario'], $_POST['password']);
}
?>
</body>
</html>