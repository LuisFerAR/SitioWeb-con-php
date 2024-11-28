<?php  

include("../../bd.php");

if(isset($_GET['txtID'])){

    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $imagen=$registro['imagen'];
    $nombrecompleto=$registro['nombrecompleto'];
    $puesto=$registro['puesto'];
    $twitter=$registro['twitter'];
    $facebook=$registro['facebook'];
    $linkedin=$registro['linkedin'];
   
}

if($_POST){
      //recepcionamos los valores del formulario
      $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
      $imagen=(isset($_POST['imagen']))?$_POST['imagen']:"";
      $nombrecompleto=(isset($_POST['nombrecompleto']))?$_POST['nombrecompleto']:"";
      $puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";
      $twitter=(isset($_POST['twitter']))?$_POST['twitter']:"";
      $facebook=(isset($_POST['facebook']))?$_POST['facebook']:"";
      $linkedin=(isset($_POST['linkedin']))?$_POST['linkedin']:"";

      $sentencia=$conexion->prepare("UPDATE tbl_equipo
       SET 
       imagen=:imagen, 
       nombrecompleto=:nombrecompleto,
       puesto=:puesto,
       twitter=:twitter,
       facebook=:facebook,
       linkedin=:linkedin
       WHERE id=:id");

      $sentencia->bindParam(":imagen",$imagen);
      $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
      $sentencia->bindParam(":puesto",$puesto);
      $sentencia->bindParam(":twitter",$twitter);
      $sentencia->bindParam(":facebook",$facebook);
      $sentencia->bindParam(":linkedin",$linkedin);
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
     
    
      if($_FILES["imagen"]["name"]!=""){

        $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
        $fecha_imagen= new DateTime();
        $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
    
        $tmp_imagen=$_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen);
        //borrar el archivo anterior, antes de actualizar
        $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
        
        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../assets/img/team/".$registro_imagen["imagen"])){
                unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
            }
        }

        $sentencia=$conexion->prepare("UPDATE tbl_equipo SET imagen=:imagen WHERE id=:id");
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


<div class="card"  style="background-color: #E5E5E0">
    <div class="card-header"> 
        Equipo
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">ID</label>
                <input readonly type="text" class="form-control" name="txtID" id="txtID" value="<?php echo $txtID ?>" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="100px" src="../../../assets//img/team/<?php echo $imagen;?>" />
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
                <input type="text" class="form-control" name="nombrecompleto" id="nombrecompleto" value="<?php echo $nombrecompleto ?>" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" class="form-control" name="puesto" id="puesto" value="<?php echo $puesto ?>" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter:</label>
                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $twitter ?>" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $facebook ?>" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="linkedin" class="form-label">LinkedIn:</label>
                <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php echo $linkedin ?>" aria-describedby="helpId" placeholder=""/>
            </div><br>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php  include("../../templates/footer.php");  ?>