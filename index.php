<?php 
include ("db.php");      //include db.php file to connect to DB 
 
$pagename="Make your home smart";  
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
include ("headfile.html");
echo "<body class='height'>"; 
     
echo "<h4>".$pagename."</h4>";    
$SQL="select prodId, prodName, prodPicNameSmall, prodDescripShort from Product"; 
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn)); 
   
echo "<table style='border: 0px'>"; 
while ($arrayp=mysqli_fetch_array($exeSQL))       
{ 
 echo "<tr>"; 
 echo "<td style='border: 0px'>"; 

 //display the small image whose name is contained in the array 
 echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId']."><img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200></a>";
 
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h2>".$arrayp['prodName']."</h2>"; //display product name as contained in the array 
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h5>".$arrayp['prodDescripShort']."</h5>"; //display product description as contained in the array 
 echo "</td>"; 
 echo "</tr>"; 

} 

echo "</table>"; 
   
echo "</body>"; 
include("footfile.html");  
?> 