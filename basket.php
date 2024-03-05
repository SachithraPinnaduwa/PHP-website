<?php 
session_start(); 
include("db.php");
$pagename="Clear Smart Basket";      
//Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";  
echo "<title>".$pagename."</title>";   
include ("headfile.html");
echo "<body class='height'>"; 
     
echo "<h4>".$pagename."</h4>";   


if ($_POST['h_prodid'] && $_POST['p_quantity']) {
    $newprodid = $_POST['h_prodid'];
$reququantity = $_POST['p_quantity']; 
    echo "<p> Id of the product is ".$newprodid."</p>";
    echo " <p> Quantity of the product is ".$reququantity."</p>";
    $_SESSION['basket'][$newprodid]=$reququantity; 
    echo "<p>1 item added</p>"; 
}else{
    echo "<p>Current basket unchanged</p>"; 
}

$total  = 0;
if ($_SESSION['basket']) {
    echo"<table>
    <caption>Sample Products</caption>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Sub total</th>
      </tr>
    </thead>";
    echo "<tbody>";
  
    foreach($_SESSION['basket'] as $index => $value) {
        $SQL = "SELECT prodId, prodName, prodPrice, prodDescripShort FROM Product WHERE prodId = $index";
        $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_error($conn));
        $arrayp = mysqli_fetch_array($exeSQL);
        $subtotal = $arrayp['prodPrice'] * $value;
        $total = $total + $subtotal;
        $price = $arrayp['prodPrice'];
        $name = $arrayp['prodName'];
        $description = $arrayp['prodDescripShort'];
        echo "<tr>";
        echo "<td>" . $arrayp['prodName'] . "</td>"; // Display product name
        echo "<td>" . $arrayp['prodDescripShort'] . "</td>"; // Display description
        echo "<td>" . $arrayp['prodPrice'] . "</td>"; // Display price
        echo "<td>" . $subtotal . "</td>"; // Display subtotal
        echo "</tr>";
    }
    echo "<tr>";
    echo "<td>Total:</td> $total";
    echo "<td> $total</td>";
    echo "</tr>";
    echo "</tbody>";
  
    echo "</table>";
    
}
 
echo "<button>
<a href=clearbasket.php style='text-decoration:none;color:white;'>Clear basket</a>
</button>";

echo "</body>"; 
include("footfile.html");  
?> 