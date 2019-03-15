<?php include "db.php"; ?>
<?php include "include/header.php";?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if(isset($_SESSION['MENSAJE'])) { ?>
        <div class="alert alert-<?= $_SESSION['COLOR_MENSAJE']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['MENSAJE']  ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); } ?>
        <div class="card card-body">
          <form action="save_task.php" method = "POST" >
            <div class="form-group">
            <input  class="form-control" type="text" placeholder = "NOMBRE" name = "title" autofocus>
            </div>
            <div class="form-group">
            <textarea name="description" rows="2" class= "form-control" placeholder= "DESCRIPCION"></textarea>
            </div>
            <input type="submit" class= "btn btn-success btn-block" name="save_task" value="GUARDAR">
          </form>
      </div>
    </div>

        <div class="col-md-8">
          <table class= "table table-bordered">
            <thead>
              <tr>
                <th>descripcion</th>
                <th>titulo</th>
                <th>fecha-creación-tarea</th>
                <th>acciones borrar-actualizar</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $query = "SELECT * FROM task";
            $result_task = mysqli_query($m, $query);
            while ($row = mysqli_fetch_array($result_task)){?>
            <tr>
              <td>
              <?php print $row['title'];?>
              </td>
              <td>
              <?php print $row['description'];?>
              </td>
              <td>
              <?php print $row['created_at'];?>
              </td>
              <td>
                <a href="edit.php?id=<?php print $row['id'] ?>" class = "btn btn-secundary" >
                  <i class = "fas fa-marker" ></i>
                </a>
                <a href="delete_task.php?id=<?php print $row['id'] ?>" class = "btn btn-danger" >
                  <i  class = "far fa-trash-alt" ></i>
                </a>
              </td>
            
            </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
  </div>
</div>





</div>

 <?php include "include/footer.php" ?>

  

