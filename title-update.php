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