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
    if(array_key_exists('pic', $_POST)){
        if($_POST['pic'] == 'on'){
            $picture = 'TRUE';
        }
    }
    else {
        $picture = 'FALSE';
    }
    print_r($_POST);
    $query = "INSERT INTO car 
    (stock,vin,year,make,model,milage,color,cost,expences,inspection,pictures,title,date_added) values ("
    .$_POST['stock'].",'".$_POST['vin']."',".$_POST['year'].",'".$_POST['make']."','".$_POST['model']."',".$_POST['milage'].",'".$_POST['color']."',"
    .$_POST['cost'].",".$_POST['expences'].",'".$_POST['inspection']."',".$picture.", FALSE, NOW())";

    print "<br>".$query;
    $result = $mysqli->query($query);
    print "<br>".$result;

    // Close the result set
    // $result->close();
    // Close the database connection
    $mysqli->close();


    header("Location: index.php");
    
}

?>