<<<<<<< HEAD
<<<<<<< HEAD
<?php 
 include("../../templates/header.php");  

    if(isset($_GET['txtID'])){

        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM tbl_configuraciones WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        $fecha=$registro['nombreconfiguracion'];
        $titulo=$registro['valor'];
       
    }

    if($_POST){
        //recepcionamos los valores del formulario
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $fecha = (isset($_POST['nombreconfiguracion']))?$_POST['nombreconfiguracion']:"";
        $titulo=(isset($_POST['valor']))?$_POST['valor']:"";
       

        $sentencia=$conexion->prepare("UPDATE tbl_configuraciones SET fecha=:fecha, titulo=:titulo, 
        descripcion=:descripcion WHERE id=:id");

    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":nombreconfiguracion",$fecha);
    $sentencia->bindParam(":valor",$titulo);
  
    $sentencia->execute();

        $sentencia=$conexion->prepare("SELECT * FROM tbl_configuraciones WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        $sentencia=$conexion->prepare("UPDATE tbl_configuraciones  WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    
        }

        $mensaje="Registro modificado con exito.";
        header("Location:index.php?mensaje=".$mensaje);
  
    ?>

    <?php  include("../../templates/footer.php");  ?>
=======
<?php  include("../../templates/header.php");  ?>
=======
<?php 
>>>>>>> 5f7a79f (mensaje para llamar)

include("../../bd.php");


    if(isset($_GET['txtID'])){

        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM tbl_configuraciones WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        $nombreconfiguracion=$registro['nombreconfiguracion'];
        $valor=$registro['valor'];
       
    }

    if($_POST)
    {
        //recepcionamos los valores del formulario
            $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
            $nombreconfiguracion = (isset($_POST['nombreconfiguracion']))?$_POST['nombreconfiguracion']:"";
            $valor=(isset($_POST['valor']))?$_POST['valor']:"";

            $sentencia=$conexion->prepare("UPDATE tbl_configuraciones SET
             nombreconfiguracion=:nombreconfiguracion, valor=:valor WHERE id=:id");
            $sentencia->bindParam(":id",$txtID);
            $sentencia->bindParam(":nombreconfiguracion",$nombreconfiguracion);
            $sentencia->bindParam(":valor",$valor);
            $sentencia->execute();
        
            $mensaje="Registro modificado con exito.";
            header("Location:index.php?mensaje=".$mensaje);
    }
            include("../../templates/header.php");  
    ?>

<div class="card" style="background-color: #E5E5E0">
    <div class="card-header">Configuraciones</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label  for="txtID" class="form-label">ID:</label>
                <input  readonly type="text" class="form-control" value="<?php echo $txtID?>" name="txtID"
                 id="txtID" aria-describedby="helpId" placeholder=""/>
            </div>
            
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" value="<?php echo $valor?>" name="valor"
                 id="valor" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre de la configuracion:</label>
                <input type="text" class="form-control" value="<?php echo $nombreconfiguracion?>" 
                name="nombreconfiguracion" id="nombreconfiguracion" aria-describedby="helpId" placeholder=""/>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

    <?=  include("../../templates/footer.php");  ?>

<<<<<<< HEAD
<?php  include("../../templates/footer.php");  ?>
>>>>>>> e2db0b1 (17/12/23 6:00pm)
=======
>>>>>>> 5f7a79f (mensaje para llamar)
