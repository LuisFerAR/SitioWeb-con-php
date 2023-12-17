<<<<<<< HEAD
<?php include("../../bd.php"); 

if(isset($_GET['txtID'])){
    //borrar dicho registro con el ID correspondiente
    $txtID= ( isset($_GET['txtID']) )?$_GET['txtID']:""; //RECEPCIONAR EL ID

    $sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
            unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
        }
    }

    $sentencia=$conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}

    //SELECCIONAR REGISTROS
  $sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
  $sentencia->execute();
  $lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");  
?>

<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table
                class="table">
                <thead>
                    <tr class="">
                        <th scope="col">ID</th>
                        <th scope="col">Titulo&Subtitulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cliente&Categoria</th>
                        <th scope="col">Url</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_portafolio as $registros){ ?>
                    <tr class="">
                        <td scope="col"><?php echo $registros['ID'];?></td>
                        <td scope="col">
                            <h6><?php echo $registros['titulo'];?></h6>
                            <br>
                            <?php echo $registros['subtitulo'];?>
                            <br>
                            <?php echo $registros['url'];?>
                        </td>
                        <td scope="col">
                            <img width="100px" src="../../../assets/img/portfolio/<?php echo $registros['imagen'];?>"/>
                        </td>
                        <td scope="col"><?php echo $registros['descripcion'];?></td>
                        <td scope="col">
                            <?php echo $registros['cliente'];?>
                            <br>
                            <?php echo $registros['categoria'];?>
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
</div>

=======
<?php  include("../../templates/header.php");  ?>

Listar portafolio
>>>>>>> e2db0b1 (17/12/23 6:00pm)

<?php  include("../../templates/footer.php");  ?>