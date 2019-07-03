<?php
// print $_GET['stock'];
$stock = intval($_GET['stock']);
// print $stock;
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
    $query = "SELECT * FROM job WHERE stock = $stock ORDER BY id";
    $result = $mysqli->query($query);
    print "
    <div class='table' style='width:70%; margin:auto'>
            <div class='tablehead' style='margin:0;'>
                <div class='tablerow'>
                    <div style='width:40%' class='tablecell'>Describtion</div>
                    <div style='width:30%' class='tablecell'>Part</div>
                    <div style='width:30%' class='tablecell'>Cost</div>
                </div>
            </div>
            <div class='tablebody'>";
    while($job = $result->fetch_assoc()){
        // print_r($job);
        print"
        <div class='tablerow'>
            <div style='width:40%' class='tablecell'>".$job['description']."</div>";
        if($job['part_ordered']!= 1){
            print"
            <div style='width:30%' class='tablecell'><input type='number' onchange='jobPartSubmit(".$job['stock'].",this.value)'</div>
            ";
        }
        else {
            print "<div style='width:30%' class='tablecell'>$".$job['part_cost']."</div>";
        }
           print "<div style='width:30%' class='tablecell'><input type='number' onchange='jobPartSubmit(".$job['stock'].",this.value)'></div>
        </div>";

    }
    print "</div>";

    $query = "SELECT * FROM job_done WHERE stock = $stock ORDER BY id";
    $result = $mysqli->query($query);
   
    print"
    <div class='tablehead' style='margin:0;'>
                <div class='tablerow'>
                    <div style='width:45%' class='tablecell'>Describtion</div>
                    <div style='width:30%' class='tablecell'>cost</div>
                </div>
            </div>
            <div class='tablebody'>";
            while($job = $result->fetch_assoc()){
                // print_r ($job);
            print"<div class='tablerow'>
                    <div style='width:45%' class='tablecell'>".$job['description']."</div>
                    <div style='width:30%' class='tablecell'>$".$job['cost']."</div>
            </div>";
            }
            print "</div>";
    print "</div>";

}



?>