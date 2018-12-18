<?php

class oopCrud{
 private $host="localhost";
 private $user="usuario";
 private $db="market_online";
 private $pass="usuario";
 private $conn;

 public function __construct(){

 $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
 }


public function showData($table){

 $sql="SELECT * FROM $table";
 $q = $this->conn->query($sql) or die("failed!");

 while($r = $q->fetch(PDO::FETCH_ASSOC)){
 $data[]=$r;
 }
 return $data;
 }

 public function getByIdJuegos($id,$table){

 $sql="SELECT * FROM $table WHERE idjuego = :id";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':id'=>$id));
 $data = $q->fetch(PDO::FETCH_ASSOC);
 return $data;
 }

 public function getByIdUsuarios($id,$table){

 $sql="SELECT * FROM $table WHERE idusuario = :id";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':id'=>$id));
 $data = $q->fetch(PDO::FETCH_ASSOC);
 return $data;
 }

 public function updateJuegos($id,$name,$price,$cat,$img,$description,$key,$table){

 $sql = "UPDATE $table
 SET nombre=:name,precio=:price,categoria=:cat,imagen=:img,descripcion=:description,clavejuego=:key
 WHERE idjuego=:id";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':id'=>$id,':name'=>$name,
 ':price'=>$price,':cat'=>$cat,':img'=>$img,':description'=>$description,':key'=>$key));
 return true;

 }

 public function updateUsuarios($id,$name,$subname,$email,$address,$admin,$user,$pass,$table){

 $sql = "UPDATE $table
 SET nombre=:name,apellido=:subname,email=:email,direccion=:address,administrador=:admin,usuario=:user,clave=:pass
 WHERE idusuario=:id";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':id'=>$id,':name'=>$name,
 ':subname'=>$subname,':email'=>$email,':address'=>$address,':admin'=>$admin,':user'=>$user,':pass'=>$pass));
 return true;

 }

 public function insertDataJuegos($name,$price,$cat,$img,$description,$key,$table){

 $sql = "INSERT INTO $table SET nombre=:name,precio=:price,categoria=:cat,imagen=:img,descripcion=:description,clavejuego=:key";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':name'=>$name,
 ':price'=>$price,':cat'=>$cat,':img'=>$img,':description'=>$description,':key'=>$key));
 return true;
 }

 

 public function insertDataUsuarios($name,$subname,$email,$address,$admin,$user,$pass,$table){

 $sql = "INSERT INTO $table SET nombre=:name,apellido=:subname,email=:email,direccion=:address,administrador=:admin,usuario=:user,clave=:pass";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':name'=>$name,
 ':subname'=>$subname,':email'=>$email,':address'=>$address,':admin'=>$admin,':user'=>$user,':pass'=>$pass));
 return true;
 }


 public function deleteDatajuego($id,$table){

 $sql="DELETE FROM $table WHERE idjuego=:id";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':id'=>$id));
 return true;
 }

 public function deleteDatausuario($id,$table){

 $sql="DELETE FROM $table WHERE idusuario=:id";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':id'=>$id));
 return true;
 }

 public function iniciarSesion($usuario, $password) {
 	$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$password';";
 	$sesion = $this->conn->query($sql);
	$row = $sesion->fetch();
	if ($usuario == $row['usuario']) {
		$usuario1 = Factory::comparar($row['administrador'], $row['idusuario'], $row['nombre'], $row['apellido'], $row['email'], $row['direccion'], $row['usuario'], $row['clave']);
		echo $usuario1;
	}
 }

}


?>
