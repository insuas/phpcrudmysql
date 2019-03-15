<?php
include "db.php";
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE from task WHERE id = $id";


  $delete = mysqli_query($m, $query);
  if(!$delete){
    die("consulta fallida");
  } 
  $_SESSION['MENSAJE'] = 'TAREA ELIMINADA';
  $_SESSION['COLOR_MENSAJE'] = 'danger';
  header("location:index.php");



}



?>