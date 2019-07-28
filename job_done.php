<?php 
require "db.conf";
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