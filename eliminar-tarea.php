<?php
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tarea WHERE id = $id";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Fallo el Query");
        }

        $_SESSION['message'] = 'La tarea se ha eliminado';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
?>