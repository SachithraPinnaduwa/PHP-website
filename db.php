<?php 
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "yourwestminsterid_0";
$conn = "";
$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
    echo "Connected to MySQL successfully!";
}
mysqli_select_db($conn, $db_name); 
?> 