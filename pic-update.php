<?php

require "db.conf";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

else{
    $query = "UPDATE car SET pictures = ".$_POST['pic']." WHERE stock = ".$_POST['stock'];
    // print $query.'<br>';
    $result = $mysqli->query($query);
}
if($_POST['pic'] == true){
    print"<input type='checkbox' checked onclick='return false'>";
}
else{
    print"<form onsubmit='updatepic(this)'>
            <input type='checkbox' name='pic' onchange='updatepic(\$(this).parent())'>
            <input type='hidden' name='stock' value=".$_POST['stock'].">
        </form>";
}

// Close the result set
// $result->close();
// Close the database connection
$mysqli->close();

?>