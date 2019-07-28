<?php

require "db.conf";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

else{
    $query = "UPDATE car SET title = ".$_POST['title']." WHERE stock = ".$_POST['stock'];
    // print $query.'<br>';
    $result = $mysqli->query($query);
}
if ($_POST['title'] == true){
    print"<input type='checkbox' checked onclick='return false'>";
}
else{
    print"<form onsubmit='updatetitle(this)'>
            <input type='checkbox' onchange='updatetitle(\$(this).parent())'>
            <input type='hidden' name='stock' value=".$_POST['stock'].">
        </form>";
}

// Close the result set
// $result->close();
// Close the database connection
$mysqli->close();

?>