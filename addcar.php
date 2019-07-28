<?php

require "db.conf";

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