 <?php
 require "php/db_connection.php";
  
 if (isset($_GET['delete_task'])) {
	$id = $_GET['delete_task'];
  $stmt = $connection->prepare("DELETE FROM tasks WHERE id= ?");
  $stmt->bind_param("i",$id);
  $stmt->execute();
  header("Location: index.php");
}


 ?>
<!DOCTYPE html><html>
  <title>To do</title>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="icon/favicon.ico" type = "icon/image" rel="icon">
<link rel="stylesheet" href="style/style.css">
<script src="https://kit.fontawesome.com/5de3ed83f2.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <button class="btn btn-primary float-right" id="toggle"><i class="fa fa-plus"></i></button>       
        
</head>

<body>
          <div class="container-fluid">
          <div class="container" id= "form-container">       
        <?php
        $result = mysqli_query($connection,"SELECT * from tasks ORDER BY date DESC");
        $i = 1;
        while($row = mysqli_fetch_array($result)){
        ?>
        
 <div class="card">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $row["task"];?></h5>
    <span class="badge badge-pill badge-info"><?php echo  $row['date'] ?></span>
    <a class="card-text badge badge-danger float-right" href="index.php?delete_task=<?php echo $row['id'] ?>"><i class="fa fa-trash icon-container"></i></span></a>
  </div>

  
</div>
          
				<?php $i++; } ?>
          </div>
          </div>  

          
          <div class="container-fluid bg-dark position-fixed fixed-bottom" id="chat-container">
          <form action="php/add.php" method ="POST">
          <div class="row">
            <div class="col-sm-6 col-6 col-md">
          <input class = "text-center mt-3" id="text-field" type="text" name= "task" placeholder ="Enter Task" autocomplete = off required>
          </div>
          <div class="col-sm-6 col-3 col-md">
          <button id="add_button" class="fa fa-paper-plane btn-warning mt-3"></button>
          </div></div>
        </form>
       
          </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>