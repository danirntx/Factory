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
 if($obj->insertDataJuegos($name,$price,$cat,'/shop/games/' . $img,$description,$key,"juegos")){
 header("location:showgame.php?status_insertgame=success");
 }

}
echo @<<<show
 </br>
 <div class="container">
 <div class="container">
 <div class="btn-group">
 <a class="btn" href="showgame.php">Atras</a>
 </div>
 <h3>Insert Your Data</h3>
 <form action="creategame.php" method="post">
 <table width="400" class="table-borderd">
 <tr>
 <th scope="row">Id</th>
 <td><input type="text" name="id" value="$id" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Nombre</th>
 <td><input type="text" name="name" value="$name"></td>
 </tr>
 <tr>
 <th scope="row">Precio</th>
 <td><input type="text" name="price" value="$price"></td>
 </tr>
 <tr>
 <th scope="row">Categoria</th>
 <td><input type="text" name="cat" value="$cat"></td>
 </tr>
 <tr>
 <th scope="row">Imagen</th>
 <td><input name="img" type="file"  placeholder="Imagen"></td>
 </tr>
 <tr>
 <th scope="row">Descripcion</th>
 <td><input type="text" name="description" value="$description"></td>
 </tr>
 <tr>
 <th scope="row">Clave</th>
 <td><input type="text" name="key" value="$key"></td>
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
