<?php
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tarea WHERE id = $id";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['titulo'];
            $descripicion = $row['descripcion'];
        }

        // $_SESSION['message'] = 'La tarea se ha eliminado';
        // $_SESSION['message_type'] = 'danger';
        // header("Location: index.php");
    }

    if(isset($_POST['update'])){
      $id = $_GET['id'];
      $titulo = $_POST['title'];
      $descripicion = $_POST['description'];
      
      $query = "UPDATE tarea set titulo = '$titulo', descripcion = '$descripicion' WHERE  id = $id"; 
      mysqli_query($conn, $query);

      $_SESSION['message'] = 'La tarea se ha editado';
      $_SESSION['message_type'] = 'success';
      header("Location: index.php");
    }
?>

<?php
    include("includes/header.php")
?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $titulo; ?>"
                            class="form-control" placeholder="Editar Titulo">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Editar Descripcion"><?php echo $descripicion; ?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Editar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    include("includes/footer.php")
?>