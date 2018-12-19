<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Edit Data</title>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 </head>

<body>
 <?php

function __autoload($class){
 include_once($class.".php");

}
 $obj=new oopCrud;

if(isset($_REQUEST['update'])){
 extract($_REQUEST);
 if($obj->updateJuegos($id,$name,$price,$cat,'games/' . $_FILES['img']['name'],$description,$key,"juegos")){
 	$fichero = @$_FILES['img'];
    $fichero_nombre = @$_FILES['img']['name'];
    if (preg_match('/jpeg|gif|png/i', $_FILES['img']['type'])) {
      $ruta_destino_archivo = "games/{$fichero_nombre}";
      if (move_uploaded_file($fichero['tmp_name'], $ruta_destino_archivo))
        echo "Archivo subido con éxito <br />";
        else echo "Error al subir el archivo";
    }
	header("location:showgame.php?status_updategame=success");
 }

}

extract($obj->getByIdJuegos($_REQUEST['id'],"juegos"));
echo <<<show
</br>
<div class="container">
 <div class="btn-group">
 <a class="btn" href="showgame.php">Atras</a>
 </div>
 <h3>Edit Your Data</h3>
 <form action="updategame.php" method="post" enctype="multipart/form-data">
 <table width="500" border="1">
 <tr>
 <th scope="row">Id</th>
 <td><input type="text" name="id" value="$idjuego" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Nombre</th>
 <td><input type="text" name="name" value="$nombre"></td>
 </tr>
 <tr>
 <th scope="row">Precio</th>
 <td><input type="text" name="price" value="$precio"></td>
 </tr>
 <tr>
 <th scope="row">Categoria</th>
 <td><input type="text" name="cat" value="$categoria"></td>
 </tr>
 <tr>
 <th scope="row">Imagen</th>
 <td><input name="img" type="file"  placeholder="Imagen"></td>
 </tr>
 <tr>
 <th scope="row">Descripcion</th>
 <td><input type="text" name="description" value="$descripcion"></td>
 </tr>
 <tr>
 <th scope="row">Clave</th>
 <td><input type="text" name="key" value="$clavejuego"></td>
 </tr>
 <tr>
 <tr>
 <th scope="row">&nbsp;</th>
 <td><input type="submit" name="update" value="Update" class="btn"></td>
 </tr>
 </table>
 </form>
</div>
show;
?>

</body>
</html>

