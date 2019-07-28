<?php

require "db.conf";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

else{
    $query = "UPDATE car SET inspection = '".$_POST['date']."' WHERE stock = ".$_POST['stock'];
    // print $query.'<br>';
    $result = $mysqli->query($query);
}

$date = strtotime($_POST['date']);
// print $date;
$month2 = $date - strtotime('-2 month');
if (($date - strtotime('-2 month'))>0){
    print date("m/j/y",$date);
}

else{
print"<form onsubmit='updateinspection(this)'>
        <input type='text' name='date' placeholder='".date("m/j/y",$date)."' 
            onfocus=\"(this.type='date')(this.placeholder='')\" onblur=\"(this.type='text')(this.placeholder='".date("m/j/y",$date)."')\"
            style='font-size:12px; width:70%; overflow: hidden; display:inline-block;' class='form-control'>
        <input type='hidden' name='stock' value='".$_POST['stock']."'>
        <button type='submit' style='font-size:10px;border:none; overflow: hidden;' class='btn btn-primary btn-sm'>✔</button>
    </form>";
}

// Close the result set
// $result->close();
// Close the database connection
$mysqli->close();


?>