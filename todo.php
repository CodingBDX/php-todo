<?php
include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  
</head>
<body>
  <div class="container">

  <div class="row mt-3">
      <div class="col offset-2">
          <h1>mes tâches</h1>
      </div>
  </div>

  <form class="row mt-3" id="formAddTask">
      <input type="hidden" name="action" value="add_task">

      <div class="col-6 offset-2">
          <label class="visually-hidden"for="inputTaskName">Tache</label>
          <input type="text" class="form-control" name="taskName" id="inputTaskName" placeholder="indiquer tache" required>
      </div>


      <div class="col-4">
          <button type="submit" class="btn btn-primary mt-3">ajouter tache</button>
      </div>
  </form>

  <div class="row">
      <div class="col-7 offset-2">
<table class="table table-bordered table-striped table-hover">
    <thead>
        <th>fait</th>
        <th>nom</th>

    </thead>
    <tbody>
        <?php
foreach ($tasks as $task) {
    ?>
    <tr>
    <td class="text-center">
<input type="checkbox" class="form-check-input" data_id="<?php echo $task['id']; ?>" <?php echo $task['checked']; ?>>


    </td>
    <td><?php echo $task['name']; ?></td>
    </tr>
<?php

}
?>
    </tbody>
</table>
      </div>
  </div>
  </div>  
  <script src="script.js"></script>
</body>
</html>