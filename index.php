<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset = 'utf8_decode'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="basic.js"></script>
</head>
<body class='bg-dark'>
    <header>
        <!-- nav bar -->
        <nav class="navbar navbar-dark bg-dark" style = 'display: block'>
            <!-- Navbar content -->
            <ul class="nav nav-pills nav-justified" >
                <li ><a href="index.php" class="nav-link btn-primary">Home</a></li>
                <li ><a href="carssold.php" class="nav-link btn-secondary">sold</a></li>
            </ul>
        </nav>
        <div id='carinput'>
            <button type='button' style='display:block; width:100%;' class='btn btn-success' onclick="$(this).next().slideToggle();">Add Car</button>
            <form action="addcar.php" method='POST' style="display:none">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="stock#">stock#</label>
                        <input type="number" name="stock" id='stock#' class="form-control">
                    </div>
                    <div class="col-md-8 mb-9">
                        <label for="vin">vin#</label>
                        <input type="text" name="vin" id="vin_num" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="year">Year</label>
                        <input type="number" name="year" id="caryear" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="make">Make</label>
                        <input type="text" name="make" id="carmake" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="model">Model</label>
                        <input type="text" name="model" id="carmodel" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="color">Color</label>
                        <input type="text" name="color" id="color" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="cost">Cost</label>
                        <input type="number" name="cost" id="carcost" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inspection">Inspection</label>
                        <input type="text" class = "form-control" name="inspection" id="inspection" onfocus="(this.type='date')" onblur="(this.type='text')">
                    </div>
                    <div class="col-mb-2 mb-3">
                        <label for="buttons">pictures</label>
                        <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input type="checkbox" autocomplete="off"> taken
                        </label>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3"> 
                        <label for="submit">Done</label>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div id='mainCont'>
            <!-- sorting buttons -->
            <div id='sortbtn' style='margin-bottom: 4px;'>
            <button type="button" class="btn btn-primary" id='stock' onclick=sort(this)>stock number</button>
            <button type="button" class="btn btn-secondary" id='year' onclick=sort(this)>year</button>
            <button type="button" class="btn btn-secondary" id='make' onclick=sort(this)>make</button>
            <button type="button" class="btn btn-secondary" id='cost' onclick=sort(this)>cost</button>
        </div>
    </header>
    <div class="table">
        <div class='tablehead' >
            <div class = 'tablerow'>
                <div style="width:7.33%" class="tablecell">stock</div>
                <div style="width:7.33%" class="tablecell">year</div>
                <div style="width:8.33%" class="tablecell">make</div>
                <div style="width:10.33%" class="tablecell">model</div>
                <div style="width:6.33%" class="tablecell">color</div>
                <div style="width:7.33%" class="tablecell">milage</div>
                <div style="width: 8.33%" class="tablecell">cost</div>
                <div style="width: 16.7%" class="tablecell">vin</div>
                <div style="width: 10.33%" class="tablecell">inspection</div>
                <div style="width:6.33%" class="tablecell">title</div>
                <div style="width:4.165%" class="tablecell">pictures</div>    
                <div style="width: 3%" class="tablecell"></div>
            </div>
        </div>
        <div class='tablebody' id='carlist'>
            <!-- 
            <div style='display:none; width:90%; margin:auto;' id>
                <div class='formInput'>
                    <form id='addjobform' action='addjob.php' method=post>
                        <input type='hidden' name='stock' value='ROW.STOCK'>  
                        <input type='text' class='form-control' name='description' placeholder='description' style='margin-bottom:3px'>
                        <button type='submit' class='btn btn-success'>addjob</button>
                    </form>
                    <br>
                </div>
                <div>
                    <div class='tablehead'>
                        <div class='tablerow'>
                            <div style='width:40%; display:inline-block' class='tablecell'>discribtion</div>
                            <div style='width:28%; display:inline-block' class='tablecell'>part</div>
                            <div style='width:28%; display:inline-block' class='tablecell'>labor</div>
                        </div>
                    </div>
                    <div class='tablebody'>
                        <div class='tablerow'>
                            <div style='width:40%; display:inline-block' class='tablecell'>.job['discribtion'].</div>
                            <div style='width:28%; display:inline-block' class='tablecell'>.job['part'].</div>
                            <div style='width:28%; display:inline-block' class='tablecell'>.job['labor'].</div>
                        </div>
                    </div>
                    <div class='tablehead'>
                        <div class="tablerow">
                            <div style='width:60%; display:inline-block' class='tablecell'>discribtion</div>
                            <div style='width:35%; display:inline-block' class='tablecell'>cost</div>
                        </div>
                    </div>
                    <div class='tablebody'>
                        <div class='tablerow'>
                            <div style='width:60%; display:inline-block' class='tablecell'>.done['discribtion'].</div>
                            <div style='width:35%; display:inline-block' class='tablecell'>.done['cost'].</div>
                        </div>
                    </div>
                </div> 
            </div>-->

        </div>
    </div>
</body>
<script>
cars(1);
</script>
</html>
