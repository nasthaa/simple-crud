<?php
    include "connection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM mahasiswa WHERE id = '$id'";

        session_start();
        if(mysqli_query($con, $sql)){
            $_SESSION['success'] = "Student data has been successfully deleted!";
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                Failed to delete student data!
            </div>";
        }

        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
?>