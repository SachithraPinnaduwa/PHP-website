<?php 
session_start(); 
include("db.php"); 
$pagename="template";      
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
include ("headfile.html");
echo "<body class='height'>"; 
     
echo "<h4>".$pagename."</h4>";    
unset($_SESSION['basket']); 
//Call in stylesheet 
//display name of the page as window title 
//include header layout file  
//display name of the page on the web page 
//display random text 
echo "<p class='font'> Your basket has been cleared</p>"; 
   
echo "</body>"; 
include("footfile.html");  
?> 