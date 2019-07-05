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