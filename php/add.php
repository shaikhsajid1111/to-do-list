<?php
require 'db_connection.php';
date_default_timezone_set('Asia/kolkata');
class Add_task{                             /*class for adding task*/
    public $connection;                 /*class variable*/ 
    public $task;
    function __construct($connection,$task){            /*class constructor*/
        $this->connection = $connection;        
        $this->task = $task;
    }

   function add(){
       $add_date = date('Y,m,d h:i:sa');            /*Fetching Date*/
        $stmt = $this->connection->prepare("INSERT INTO tasks(task, date) VALUES (?,?)");
        $stmt->bind_param("ss",$this->task,$add_date);          /*Binding parameters*/
        $stmt->execute();                   /*Executing SQL Query*/
        header("Location: ../index.php");               /*Refreshing*/
    }

}

if(!empty($_POST["task"])){
$task_var = $_POST["task"];
/*MySQL Injection Security */
$task_var = stripcslashes($task_var);
$task_var = mysqli_real_escape_string($connection,$task_var);
$task_var = strval($task_var);                              
$task_var = htmlentities($task_var,ENT_QUOTES);             /*To prevent HTML tags, printed as a working HTML code*/
$task_obj = new Add_task($connection,$task_var);            /*Task Object*/
$task_obj->add();               /*Add task Function to add task to the DB */
}
?>