<?php
// print $_GET['stock'];
$stock = intval($_GET['stock']);
// print $stock;
require "db.conf";
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
        <div>
            <form onsubmit='addjob(this)'>
                <input type='text' name='info' placeholder='description!' class='form-control'>
                <input type='hidden' name='stock' value='$stock'>
                <button type='submit' style='width:20%' class='btn btn-info'>Add Job</button>
            </form>
        </div>
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
            <div style='width:40%' class='tablecell'>
                ".$job['description']."
            </div>";
        if($job['part_ordered']!= 1){
            print"
            <div style='width:30%' class='tablecell'>
                <form onsubmit='updatejob(this)' class='form-row'>
                    <input type='hidden' name='stock' value='$stock'>
                    <input type='hidden' name='id' value='".$job['id']."'>
                    <div class='col-md-8 mb-4' style='margin:0;'>
                    <input class='form-control' type='number' name='cost'>
                    </div>
                    <div class='col-md-4 mb-4' style='margin:0; '>
                        <button type='submit' class='btn btn-warning'>Ordered</button>
                    </div>
                </form>
            </div>
            ";
        }
        else {
            print "<div style='width:30%; margin-left:4px;' class='tablecell '>
                $".$job['part_cost']."
            </div>";
        }
           print "
           <div style='width:30%' class='tablecell'>
                <form onsubmit='jobdone(this)' class='form-row'>
                    <div class='col-md-8 mb-4' style='margin:0;'>
                    <input type='hidden' name='stock' value='$stock'>
                    <input type='hidden' name='id' value='".$job['id']."'>
                    <input class='form-control' type='number' name='cost'>
                    </div>
                    <div class='col-md-4 mb-4' style='margin:0;'>
                        <button type='submit' class='btn btn-danger'>Done</button>
                    </div>
                </form>
           </div>
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

            print"<div style='width:30%; margin:auto;'>
                <button type='button' style='display:block; width:100%' class='btn btn-danger' onclick='sold($stock)'>Mark As Sold</button>
                </div>";
    print "</div>";

    // Close the result set
    $result->close();
    // Close the database connection
    $mysqli->close();
}



?>