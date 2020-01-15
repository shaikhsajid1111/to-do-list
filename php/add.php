<?php
require 'db_connection.php';
date_default_timezone_set('Asia/kolkata');
class Add_task{
    public $connection;
    public $task;
    function __construct($connection,$task){
        $this->connection = $connection;
        $this->task = $task;
    }

   function add(){
       $add_date = date('Y,m,d h:i:sa');
        $stmt = $this->connection->prepare("INSERT INTO tasks(task, date) VALUES (?,?)");
        $stmt->bind_param("ss",$this->task,$add_date);
        $stmt->execute();
        header("Location: ../index.php");
    }

}

if(!empty($_POST["task"])){
$task_var = $_POST["task"];
$task_var = stripcslashes($task_var);
$task_var = mysqli_real_escape_string($connection,$task_var);
$task_var = strval($task_var);
$task_var = htmlentities($task_var,ENT_QUOTES);
$task_obj = new Add_task($connection,$task_var);
$task_obj->add();
}
?>