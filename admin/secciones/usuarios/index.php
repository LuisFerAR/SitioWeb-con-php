<?php  
include("../../bd.php"); 

    if(isset($_GET['txtID'])){
        //borrar dicho registro con el ID correspondiente
        $txtID= ( isset($_GET['txtID']) )?$_GET['txtID']:""; //RECEPCIONAR EL ID

        $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

        $sentencia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
    }

    //SELECCIONAR REGISTROS
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_usuarios`");
    $sentencia->execute();
    $lista_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");  
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar usuario</a>
    </div>
        <div class="card-body">
            <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID </th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Password</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_usuarios as $registros){ ?>
                    <tr class="">
                        <td><?php echo $registros['ID'] ?></td>
                        <td><?php echo $registros['usuario'] ?></td>
                        <td><?php echo $registros['password'] ?></td>
                        <td><?php echo $registros['correo'] ?></td>
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
    <div class="card-footer text-muted"></div>
</div>





<?php  include("../../templates/footer.php");  ?>