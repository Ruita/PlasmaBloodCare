<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body>



<?php

/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

include('connect-db.php');
$username = $_POST['username'];
// get results from database

$result = mysql_query("SELECT * FROM admin where username='$username'")

or die(mysql_error());



// display data in table
if ($row=mysqli_fetch_array($result))
		{	
		    
        		
				header("Location:updateAdmin.php");
		        
		              
		             
		     }      
				




echo "<table border='1' cellpadding='10'>";

echo "<tr>  <th>First Name</th> <th>Last Name</th> <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = mysql_fetch_array( $result )) {



// echo out the contents of each row into a table

echo "<tr>";



echo '<td>' . $row['username'] . '</td>';

echo '<td>' . $row['password'] . '</td>';

echo '<td><a href="edit.php?username=' . $row['username'] . '">Edit</a></td>';

echo '<td><a href="delete.php?username=' . $row['username'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>





</body>

</html>