<?php
require "db.conf";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
else{
    // $query = "UPDATE car SET expences = expences + ".$_POST['cost']." WHERE stock = ".$_POST['stock'];
    // $result = $mysqli->query($query);
    // print_r($_POST);
    // print "<br>".$query."<br>";
    $query = "UPDATE job SET part_ordered = true , part_cost = ".$_POST['cost']." WHERE id = ".$_POST['id'];
    // print $query;
    $result = $mysqli->query($query);

    print "$".$_POST['cost'];


    // Close the result set
    // $result->close();
    // Close the database connection
    $mysqli->close();
}

?>