<?php 
include("db.php"); 
$pagename="A smart buy for a smart home";      
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
include ("headfile.html");
echo "<body class='height'>"; 
     
echo "<h4>".$pagename."</h4>";    
//Call in stylesheet 
//display name of the page as window title 
//include header layout file  
//display name of the page on the web page 
//display random text 
$prodid=$_GET['u_prod_id']; 
echo "<p>Selected product Id: ".$prodid; 
$SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodQuantity,prodPrice from Product
where prodId=$prodid"; 
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn)); 

echo "<table style='border: 0px' class='height'>"; 
while ($arrayp=mysqli_fetch_array($exeSQL))       
{ 
 echo "<tr>"; 
 echo "<td style='border: 0px'>"; 

 //display the small image whose name is contained in the array 
 echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
 
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h2>".$arrayp['prodName']."</h2>"; //display product name as contained in the array 
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h5>".$arrayp['prodDescripLong']."</h5>"; //display product description as contained in the array 
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h5>".$arrayp['prodQuantity']."</h5>"; //display product description as contained in the array 
 echo "</td>"; 
 echo "<td style='border: 0px'>"; 
 echo "<p><h5>".$arrayp['prodPrice']."</h5>"; //display product description as contained in the array 
 echo "</td>"; 
 echo "</tr>"; 
} 
echo "</table>"; 


echo "<p>Number to be purchased: "; 
//create form made of one text field and one button for user to enter quantity 
//the value entered in the form will be posted to the basket.php to be processed 
echo "<form action=basket.php method=post>"; 
 

echo "<select name=p_quantity style= 'margin:4 4; padding:4 4 '>";
$SQL2="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodQuantity,prodPrice from Product
where prodId=$prodid"; 
$exeSQL2=mysqli_query($conn, $SQL2) or die (mysqli_error($conn)); 
while ($arrayp=mysqli_fetch_array($exeSQL2))       
{ 
for ($a = 1; $a <= $arrayp['prodQuantity']; $a++) {
    echo "<option value='$a'>$a</option>";
  }
}

echo "</select> ";


echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>"; 
//pass the product id to the next page basket.php as a hidden value 
echo "<input type=hidden name=h_prodid value=".$prodid.">"; 
echo "</form>"; 
echo "</p>"; 
   
echo "</body>"; 
include("footfile.html");  
?> 