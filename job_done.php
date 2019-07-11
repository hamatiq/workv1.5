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

    $query ="SELECT * FROM job WHERE id = ".$_POST['id'];
    $result = $mysqli->query($query);
    $jobinfo = $result->fetch_assoc();
    // print_r($jobinfo);
    // print "<br>";
    $result = $mysqli->query("DELETE FROM job WHERE id =".$_POST['id']);
    
    $cost = $_POST['cost']+ $jobinfo['part_cost'];
    // print "part_cost = ".$jobinfo['part_cost']."<br>";

    $query = "INSERT INTO job_done (id,stock,description,cost,date_finished) VALUES(".$jobinfo['id'].",".$jobinfo['stock'].",'".$jobinfo['description']."',".$cost.", NOW())";
    // print $query."<br>";

    $result = $mysqli->query($query);


    $query = "SELECT * FROM car WHERE stock = ".$_POST['stock'];
    $result = $mysqli ->query($query);
    $car = $result->fetch_assoc();

    $expences = $car['expences']+$cost;

    $query = "UPDATE car SET expences = ".$expences." WHERE stock = ".$_POST['stock'];
    $result = $mysqli->query($query);
    // print "cost:".$cost." expences: ".$car['expences']."<br>";
    // print $query ."<br>";

    $mysqli->close();
}
?>