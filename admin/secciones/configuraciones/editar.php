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

Editar configuracion

<?php  include("../../templates/footer.php");  ?>
>>>>>>> e2db0b1 (17/12/23 6:00pm)
