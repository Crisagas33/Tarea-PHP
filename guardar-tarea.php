<?php
include("db.php");
    
    if (isset($_POST['save_task'])){
        $titulo = $_POST['title'];
        $descripcion = $_POST['description'];

        $query = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Fallo el Query");
        }

        $_SESSION['message'] = 'La tarea se ha guardado';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }

?>