<<<<<<< HEAD
    <?php  

    include("../../bd.php"); 

    if($_POST){

        $nombreconfiguracion =(isset($_POST['nombreconfiguracion']))?$_POST['nombreconfiguracion']:"";
        $valor =(isset($_POST['valor']))?$_POST['valor']:"";

        $sentencia=$conexion->prepare("INSERT INTO `tbl_configuraciones` (`ID`, `nombreconfiguracion`, `valor`) 
        VALUES (NULL, :nombreconfiguracion, :valor);");

        $sentencia->bindParam(":nombreconfiguracion", $nombreconfiguracion);  
        $sentencia->bindParam(":valor", $valor);
        $sentencia->execute();
    
    }

include("../../templates/header.php");
?>

<!--  bs5-card-head-foot-->
<div class="card">
    <div class="card-header">Configuracion</div>
    <div class="card-body">
        <form action="" method="post">
            <!--  bs5-form-input-->        
            <div class="mb-3">
                <label for="nombreconfiguracion" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombreconfiguracion" id="nombreconfiguracion aria-describedby="helpId" placeholder=""/>
                <small id="helpId" class="form-text text-muted"></small>
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor: </label>
                <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder=""/>
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>


=======
<?php  include("../../templates/header.php");  ?>

Crear configuracion
>>>>>>> e2db0b1 (17/12/23 6:00pm)

<?php  include("../../templates/footer.php");  ?>