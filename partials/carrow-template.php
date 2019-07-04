<?$cost = $expences + $cost;?>
<div style='width:7.33%' class='tablecell'> <?$stock?></div>
<div style='width:7.33%' class='tablecell'><?year?></div>
<div style='width:8.33%' class='tablecell'><?make?></div>
<div style='width:10.33%' class='tablecell'><?model?></div>
<div style='width:6.33%' class='tablecell'><?color?></div>
<div style='width:7.33%' class='tablecell'><?milage?></div>
<div style='width: 8.33%' class='tablecell'><?cost?></div>
<div style='width: 16.7%' class ='tablecell'><?vin?></div>
<?$date = strtotime($row['inspection']);
$month2 = $date - strtotime('-2 month');
if (($date - strtotime('-2 month'))>0){?>
    <div style='width: 10.33%' class='tablecell'><?date("m/j/y",$date)?></div>
<?}
else{?>
    <div style='width: 10.33%' class='tablecell'>
        <form onsubmit="updateinspection">
            <input style='font-size:12px; width:80%;; overflwo:hidden' class="form-control" placeholder='<?date('m/j/y',$date)?>' type='text' onfocus="(this.type='date')(this.placeholder='')" onblur="(this.type='text')(this.placeholder='<?date('m/j/y',$date)?>')">
            <input type='hidden' name='stock' value="<?stock?>">
            <button type="submit" style="width:20%" class="btn btn-success">✔</button>
        </form>
    </div>
<?}?>
