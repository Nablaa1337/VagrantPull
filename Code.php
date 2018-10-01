<?php


$dbname = 'employees';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($link, $dbname) or die("Could not open the db '$dbname'");

$query = "SELECT * FROM employees"; //You don't need a ; like you do in SQL
$result = mysqli_query($link, $query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['CHARACTER_SET_NAME'] . "</td><td>" . $row['DEFAULT_COLLATE_NAME'] . "</td></tr>""</td><td>" . $row['DESCRIPTION'];  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysqli_close(); //Make sure to close out the database connection
?> 
