<?php
$dbhost = 'todo2.cjdks7jqac0y.us-east-2.rds.amazonaws.com'; // Your MySQL database hostname on Amazon EC2 (Should be same as mine unless you changed it)
$dbuser = 'aaauto'; // Your MySQL database username on Amazon EC2 (Should be same as mine unless you changed it)
$dbpass = 'Sawsan.123'; // Your MySQL database password on Amazon EC2 (Remember this otherwise you will not be able to access your database)
$dbname = 'todo'; //The name of your MySQL database (Should be same as mine unless you changed it

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