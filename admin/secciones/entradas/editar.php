<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5f7a79f (mensaje para llamar)
<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $fecha=$registro['fecha'];
    $titulo=$registro['titulo'];
    $descripcion=$registro['descripcion'];
    $imagen=$registro['imagen'];

}

if($_POST){
      //recepcionamos los valores del formulario
      $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
      $fecha = (isset($_POST['fecha']))?$_POST['fecha']:"";
      $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
      $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

      $sentencia=$conexion->prepare("UPDATE tbl_entradas
      SET 
      fecha=:fecha,
      titulo=:titulo, 
      descripcion=:descripcion
      WHERE id=:id");

    $sentencia->bindParam(":id",$txtID);
     $sentencia->bindParam(":fecha",$fecha);
     $sentencia->bindParam(":titulo",$titulo);
     $sentencia->bindParam(":descripcion",$descripcion);
     $sentencia->execute();

     if($_FILES["imagen"]["name"]!=""){
        $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
        $fecha_imagen= new DateTime();
        $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
    
        $tmp_imagen=$_FILES['imagen']['tmp_name'];
        move_uploaded_file($tmp_imagen,"../../../assets/img/about/".$nombre_archivo_imagen);
        //borrar el archivo anterior, antes de actualizar
        $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
        
        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"])){
                unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
            }
        }

        $sentencia=$conexion->prepare("UPDATE tbl_entradas SET imagen=:imagen WHERE id=:id");
        $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $imagen=$nombre_archivo_imagen;
    
      }

      $mensaje="Registro modificado con exito.";
      header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php"); 
?>

<div class="card" style="background-color: #E5E5E0">
    <div class="card-header">Entradas</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label  for="txtID" class="form-label">ID:</label>
                <input  readonly type="text" class="form-control" value="<?php echo $txtID?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder=""/>
            </div>
            
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" value="<?php echo $fecha?>" name="fecha" id="fecha" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control" value="<?php echo $titulo?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input type="text" class="form-control" value="<?php echo $descripcion?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="150" src="../../../assets/img/about/<?php echo $imagen;?>" />
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder=""/>
               
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<<<<<<< HEAD

=======
<?php  include("../../templates/header.php");  ?>

Editar entrada
>>>>>>> e2db0b1 (17/12/23 6:00pm)
=======

>>>>>>> 5f7a79f (mensaje para llamar)

<?php  include("../../templates/footer.php");  ?>