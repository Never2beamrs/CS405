
<!DOCTYPE html>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Information</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>  
<div align="center" id="mainWrapper">
  <?php include_once("../template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">

<?php
// Get a connection for the database
require_once('../../../webstore/mysqli_connect.php');

// Create a query for the database
$query = "SELECT CID, first_name, last_name, start_date FROM customers";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($conn, $query);

// If the query executed properly proceed
if($response){

echo'<tr><td align="left"><b>First Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Member Since</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['first_name'] . '</td><td align="left">' . 
$row['last_name'] . '</td><td align="left">' .
$row['CID'] . '</td><td align="left">' .
$row['start_date'] . '</td><td align="left">' ; 

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($conn);

}

// Close connection to the database
mysqli_close($conn);

?>

  </div>
  <?php include_once("../template_footer.php");?>
</div>
</body>
</html>

