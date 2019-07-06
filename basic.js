//buttons functinality to sort the list of cars
function sort(element) {
    $(element).parent().children().removeClass('btn-primary');
    $(element).parent().children().not(element).addClass('btn-secondary');
    $(element).removeClass('btn-secondary');
    $(element).addClass('btn-primary');
    var id = element.id;
    if (id == 'year') {
        cars(2);
    } else if (id == 'make') {
        cars(3);
    } else if (id == 'cost') {
        cars(4);
    } else {
        cars(1);
    }
}

// get request to display all cars
function cars(str) {
    $.ajax({
        url: 'car.php?q=' + str,
        success: function(result) {
            $('#carlist').html(result);
        }
    });
}

// function showjobs(str){
//     element = $(element).parent();
//     $('#job').remove();
//     $("<div id='job' style='display:block; width:100%;'><div style='display:block; width:100%;'><button type='button' class='btn btn-info' id='addjob' onclick='addjob(this)'>Add Job</button></div>"+
//     "<table class = 'table'><thead><tr><th width='40%'>Job Describtion</th><th width='30%'>Parts</th><th width='30%'>Labor</th></tr></thead> <tbody id = 'not_done'></tbody>"+
//     "</table>"+
//     "<table class = 'table'>"+
//     "<thead><tr><th width='50%'>discribtion</th><th style='border=;none' width='50%'>cost</th>  </tr></thead> <tbody id = 'done'></tbody>"+
//     "</table></div>").insertAfter(element);
//     // console.log($(element).next());
//     var stock = $(element).children(":first").text();
//     // console.log(stock);
//     jobs(element.nextSibling,stock);

//     $(str).toggle();
// }

function jobs(element, stock) {
    // prints the jobs yet to be done
    $.ajax({
        url: 'jobs.php?stock=' + stock,
        success: function(result) {
            $('#not_done').html(result);
        }
    });
    // print jobs that are done
    $.ajax({
        url: 'donejobs.php?stock=' + stock,
        success: function(result) {
            $('#done').html(result);
        }
    });
}

function addjob(element) {
    $('#addjobform').remove();
    var stock = $(element).parent().parent().prev().children(":first").text();
    // console.log(stock);
    $('<form id="addjobform" action="addjob.php" method=post>' +
        '<input type="text" class="form-control" name="description"><br>' +
        '<label for="description">describe:</label>' +
        '<input type="hidden" name="stock" value=' + stock + '>' +
        '<button type="submit" class="btn btn-success">Submit</button>' +
        '</form>').insertAfter(element);
}

function showjobs(stock, element) {
    var id = stock + 'job';
    $('#' + id).slideToggle();
    $(element).text($(element).text() == '⇊' ? '⇈' : '⇊');
}

function filljob(stock) {
    var id = stock + 'job';
    $.ajax({
        url: 'getjob.php?stock=' + stock,
        success: function(result) {
            $('#' + id).html(result);
        }
    });
}

function updateinspection(element) {
    event.preventDefault();

    var stocknum = $(element).find("input[name='stock']").val();
    // console.log(stocknum);
    var insdate = $(element).find("input[name='date']").val();
    // console.log(insdate);

    // console.log($("#" + stocknum + "row").find("div[name='inspection']").html())

    // $.post("ins-update.php", { stock = stocknum, date = insdate }, function(result) {});

    $.ajax({
        type: 'POST',
        url: 'ins-update.php',
        data: {
            'stock': stocknum,
            'date': insdate
        },
        success: function(msg) {
            // console.log(msg);
            // $('#testing').html(msg);
            $("#" + stocknum + "row").find("div[name='inspection']").html(msg);
        }
    });

}

function updatetitle(element) {
    event.preventDefault();

    var stocknum = $(element).find("input[name='stock']").val();
    var title = $(element).find("input[name='title']").val();
    $.ajax({
        type: 'POST',
        url: 'title-update.php',
        data: {
            'stock': stocknum,
            'title': true
        },
        success: function(msg) {
            // console.log(msg);
            // $('#testing').html(msg);
            $("#" + stocknum + "row").find("div[name='title']").html(msg);
        }
    });

}

function updatepic(element) {
    event.preventDefault();

    var stocknum = $(element).find("input[name='stock']").val();
    var title = $(element).find("input[name='pic']").val();
    $.ajax({
        type: 'POST',
        url: 'pic-update.php',
        data: {
            'stock': stocknum,
            'pic': true
        },
        success: function(msg) {
            // console.log(msg);
            // $('#testing').html(msg);
            $("#" + stocknum + "row").find("div[name='picture']").html(msg);
        }
    });

}
function addjob(element) {
    event.preventDefault();

    var stock = $(element).find("input[name='stock']").val();
    var description = $(element).find("input[name='info']").val();
    $.ajax({
        type: 'POST',
        url: 'addjob.php',
        data: {
            'stock': stock,
            'description': description
        },
        success: function(msg) {
            // console.log(msg);
            // $('#testing').html(msg);
            filljob(stock);
        }
    });

}