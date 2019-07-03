<?php

$q = intval($_GET['q']);
$dbhost = 'todo2.cjdks7jqac0y.us-east-2.rds.amazonaws.com'; // Your MySQL database hostname on Amazon EC2 (Should be same as mine unless you changed it)
$dbuser = 'aaauto'; // Your MySQL database username on Amazon EC2 (Should be same as mine unless you changed it)
$dbpass = 'Sawsan.123'; // Your MySQL database password on Amazon EC2 (Remember this otherwise you will not be able to access your database)
$dbname = 'todo'; //The name of your MySQL database (Should be same as mine unless you changed it


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$orderby = '';
if ($q == 4){
    $orderby = '(initial_cost+expenses) ASC';
}
if ($q == 3){
    $orderby = 'make ASC';
}
else if ($q == 2){
    $orderby = 'year ASC';
}
else{
    $orderby = 'stock ASC';
}


$query = "SELECT * FROM car ORDER BY $orderby";
$result = $mysqli->query($query);
while($row = $result->fetch_assoc()){

    
    $cost = $row['expences']+$row['cost'];
    print"<div class = 'tablerow' id='".$row['stock']."row'>
    <div style='width:7.33%' class='tablecell'> ".$row['stock']."</div>
    <div style='width:7.33%' class='tablecell'>".$row['year']."</div>
    <div style='width:8.33%' class='tablecell'>".$row['make']."</div>
    <div style='width:10.33%' class='tablecell'>".$row['model']."</div>
    <div style='width:6.33%' class='tablecell'>".$row['color']."</div>
    <div style='width:7.33%' class='tablecell'>".$row['milage']."</div>
    <div style='width: 8.33%' class='tablecell'>".$cost."</div>
    <div style='width: 16.7%' class ='tablecell'>".$row['vin']."</div>";
    $date = strtotime($row['inspection']);
    $month2 = $date - strtotime('-2 month');
    if (($date - strtotime('-2 month'))>0){
        print "<div style='width: 10.33%' class='tablecell'>".date("m/j/y",$date)."</div>";
    }
    else{
        print"<div style='width: 10.33%' class='tablecell'>
        <form action='updateins.php'>
                <input style='font-size:12px; width:120px;' placeholder='".date('m/j/y',$date)."' type='text' onfocus='(this.type='date')(this.placeholder='')' onblur='(this.type='text')' onchange='this.form.submit()'>
                <input type='hidden' name='stock' value='".$row['stock']."'>
            </form>
            </div>";
    }
    if ($row['title'] == true){
        print"
        <div style='width:6.33%' class='tablecell'>
        <input type='checkbox' checked onclick='return false'>
        </div>";
    }
    else{
        print"<div style='width:6.33%' class='tablecell'>
             <form action='updatetitle.php'>
        <input type='checkbox' onchange='this.form.submit()'>
        <input type='hidden' name='stock' value=".$row['stock'].">
        </form>
         </div>";
    }
    if($row['pictures'] == true){
        print"
        <div style='width:4.165%'class='tablecell'>
            <input type='checkbox' checked onclick='return false'>
        </div>
        ";
    }
    else{
        print"
        <div style='width:4.165%'class='tablecell'>
            <form action='updatepic.php'>
                <input type='checkbox' onchange='this.form.submit()'>
                <input type='hidden' name='stock' value=".$row['stock'].">
            </form>
        </div>
        ";
    }
    print"
    <div style='width: 3%'class='tablecell'>
        <button onclick='showjobs(".$row['stock'].", this)' type='button' class='btn btn-warning'>&#x21CA;</button>
    </div>
    </div>
    <div style='display:none; width:90%; margin:auto;' id='".$row['stock']."job'>
    </div>";


}
// Close the result set
$result->close();
// Close the database connection
$mysqli->close();
?>