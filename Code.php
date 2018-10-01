<?php


$dbname = 'employees';
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$link = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysql_select_db($dbname) or die("Could not open the db '$dbname'");

$query = "SELECT * FROM employees"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

if (!$result)
{
    $message = 'ERROR:' . mysql_error();
    return $message;
}
else
{
    $i = 0;
    echo '<html><head><meta charset="UTF-8"></head><body><table><tr>';
    while ($i < mysql_num_fields($result))
    {
        $meta = mysql_fetch_field($result, $i);
        echo '<td>' . $meta->name . '</td>';
        $i = $i + 1;
    }
    echo '</tr>';
   
    $i = 0;
    while ($row = mysql_fetch_row($result))
    {
        echo '<tr>';
        $count = count($row);
        $y = 0;
        while ($y < $count)
        {
            $c_row = current($row);
            echo '<td>' . $c_row . '</td>';
            next($row);
            $y = $y + 1;
        }
        echo '</tr>';
        $i = $i + 1;
    }
    echo '</table></body></html>';
    mysql_free_result($result);
}
