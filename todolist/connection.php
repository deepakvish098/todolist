
<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "todolist";

 $con = mysqli_connect($servername, $username , $password, $dbname);


 if ($con)
 {
    //echo "connection established";
 }else{
    echo "connection failed".mysql_connect_error();
 }
 



?>