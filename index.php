<?php
    include("db.php")
?>
<?php
    include("includes/header.php")
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php
                if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> 
                <?php session_unset(); } ?>  

            <div class="card card-body">
                <form action="guardar-tarea.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Titulo Tarea" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description"  rows="2" class="form-control" placeholder="Descripcion Tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-lg" name="save_task" value="Guardar Tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
              <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha de Creacion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * FROM tarea";
                            $resultado_tareas = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($resultado_tareas)){ ?>
                                <tr>
                                   <td><?php echo $row['titulo']?></td> 
                                   <td><?php echo $row['descripcion']?></td> 
                                   <td><?php echo $row['fecha-creacion']?></td> 
                                   <td>
                                       <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                          <i class="fas fa-marker"></i>
                                       </a>
                                       <a href="eliminar-tarea.php?id=<?php echo $row['id']?>"class="btn btn-danger">
                                           <i class="far fa-trash-alt"></i>
                                       </a>
                                   </td> 
                                </tr>
                            <?php } ?>
                    </tbody>
              </table>       
        </div>
    </div>
</div>


<?php
    include("includes/footer.php")
?>

       