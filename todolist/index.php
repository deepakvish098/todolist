<?php
include("connection.php");
error_reporting(0);

if (isset($_POST['addtask'])) {
    $task = $_POST["task"];
    $query = "INSERT INTO tasks (task) VALUES ('$task')";
    $data = mysqli_query($con, $query);
    if ($data) {
        header("Location: index.php");
        exit;
    }
}

$query = "SELECT * FROM tasks ORDER BY id ASC";
$result = mysqli_query($con, $query);
$total = mysqli_num_rows($result);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM tasks WHERE id = '$id'";
    $data = mysqli_query($con, $query);
    if ($data) {
        header("Location: index.php");
        exit;
    }
}

if (isset($_GET['complete'])) {
    $complete = $_GET['complete'];
    $query = "UPDATE tasks SET status = 'COMPLETED' WHERE id = '$complete'";
    $data = mysqli_query($con, $query);
    if ($data) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>

body{

font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
font-style: normal;
background-color: #1f3d40;
margin: 0;
padding: 0;
width: auto;
height: auto;
display: flex;
align-items: center;
justify-content: center;
padding-top: 200px; 


}

#search{

  width:250px;
  height:50px;
  border:none;
  border-radius:5px ;
  outline:none;
  font-size:20px;
  color:black;
}

#btn{
  width:80px;
  height:50px;
  background-color: #1e706b;
  border:none;
  border-radius:5px ;
}
form{
margin:10px;
 
width: 100%;
padding: 20px;
border-radius: 20px ;
border: 1px solid  black;
 
text-align: center;
color:black;


}
h2{
text-align: center;
 

}

ul{
 display: flex;
 flex-direction: column;
 justify-content: space-between;
 align-items: center;
 
 

}

li{
 
width:250px;
height: 50px;
margin-top: 5px;
padding-left: 40px;
display: flex;
justify-content: space-between;
align-items: center;
background-color:white;
border-radius:5px;
border:1px solid black;

 




 


}




.action{

display: flex;
gap: 10px;
padding: 5px;
 
}
a{
text-decoration: none;
color: red;
border:1px solid red;
padding:5px;
border-radius:5px;

font-size: 15px;
}
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <h2>TO DO-List</h2>
        <input type="search" name="task" id="search" placeholder="Enter the tasks">
        <input type="submit" name="addtask" id="btn" value="Add Task">
        
        <ul>
        <?php
        // Display tasks if they exist
        if ($total > 0) {
            while ($result1 = mysqli_fetch_assoc($result)) {
                echo "<li>" . htmlspecialchars($result1['task']);
                echo "<div class='action'>
                         
                        <a href='index.php?delete=" . $result1['id'] . "'>Delete</a>
                      </div>
                    </li>";
            }
        }
        ?>
        </ul>
    </form>
</body>
</html>
