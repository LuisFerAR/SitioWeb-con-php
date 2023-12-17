<<<<<<< HEAD
<?php 
include("../../bd.php"); 
//BORRANDO REGISTROS CON EL ID
if(isset($_GET['txtID'])){
    //borrar dicho registro con el ID correspondiente
    $txtID= ( isset($_GET['txtID']) )?$_GET['txtID']:""; //RECEPCIONAR EL ID

    $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
        }
    }

    $sentencia=$conexion->prepare("DELETE FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}


$sentencia=$conexion->prepare("SELECT * FROM `tbl_entradas`");
$sentencia->execute();
$lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");  ?>


<div class="card" style="background-color: #E5E5DF">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar entrada</a>
    </div>
    <div class="card-body" style="background-color: #F0F0F0">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lista_entradas as $registros){ ?>
                    <tr class="">
                        <td><?php echo $registros['ID'];?></td>
                        <td><?php echo $registros['fecha'];?></td>
                        <td><?php echo $registros['titulo'];?></td>
                        <td><?php echo $registros['descripcion'];?></td>
                        <td> 
                            <img width="100px" src="../../../assets/img/about/<?php echo $registros['imagen'];?>">
                        </td>
                        <td>
                            <a name="editar" id="editar" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID'];?>" role="button">Editar</a>
                            <a name="eliminar" id="eliminar" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID'];?>" role="button">Eliminar</a>      
                        </td>
                    </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text muted" ></div>
  
</div>

=======
<?php  include("../../templates/header.php");  ?>

Listar entrada
>>>>>>> e2db0b1 (17/12/23 6:00pm)

<?php  include("../../templates/footer.php");  ?>