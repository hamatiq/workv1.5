<?php
require "db.conf";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
else{
    print_r($_POST);
    $query = "insert into job (stock,description,part_ordered,part_cost,date_added)
    VALUES(".$_POST['stock'].",\"".$_POST['description']."\", false, null, NOW());";

    //print $query;
    $result = $mysqli->query($query);

    //print "<br>".$result;

    // Close the database connection
    $mysqli->close();

    // header("Location: index.php");
}


?>