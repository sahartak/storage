<?php require 'db-con.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$sql="SELECT CONCAT(street_number,', ',route,', ',locality,', ',administrative_area_level_1,', ',administrative_area_level_2,', ', postal_code,', ',country) as address FROM store_info";
$rs=mysqli_query($mysqli,$sql);
while($row=mysqli_fetch_assoc($rs))
{
    //print_r($row);exit;
}
 ?>
<link rel="stylesheet" href="assets/css/bootstrap.min.paper.css">
<link rel="stylesheet" href="assets/css/font-awesome.css">
<style>
body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}
.day select {
    display: inline;
    width: 55px;
    margin-left: 2px;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
#map-canvas {
       height: 450px;
       width: 500px;
    }
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.arrow {
    font-size: 12px;
    padding: 10px;
}
</style>
<div class="container">
<a href="add-store.php" class="btn btn-default">Suggest Store</a>
<table id="sort" class="grid table table-bordered" title="Kurt Vonnegut novels">
    <thead>
        <tr><th>SN</th><th>Year</th><th>Title</th><th>Grade</th></tr>
    </thead>
    <tbody>
        <tr><td><span class="arrow arrow-up"><i class="fa fa-arrow-up"></i></span><span class="row-no">1</span><span class="arrow arrow-down"><i class="fa fa-arrow-down"></i></span></td><td>1969</td><td>Slaughterhouse-Five</td><td>A+</td></tr>
        <tr><td><span class="arrow arrow-up"><i class="fa fa-arrow-up"></i></span><span class="row-no">2</span><span class="arrow arrow-down"><i class="fa fa-arrow-down"></i></span></td><td>1952</td><td>Player Piano</td><td>B</td></tr>
        <tr><td><span class="arrow arrow-up"><i class="fa fa-arrow-up"></i></span><span class="row-no">3</span><span class="arrow arrow-down"><i class="fa fa-arrow-down"></i></span></td><td>1963</td><td>Cat's Cradle</td><td>A+</td></tr>
        <tr><td><span class="arrow arrow-up"><i class="fa fa-arrow-up"></i></span><span class="row-no">4</span><span class="arrow arrow-down"><i class="fa fa-arrow-down"></i></span></td><td>1973</td><td>Breakfast of Champions</td><td>C</td></tr>
        <tr><td><span class="arrow arrow-up"><i class="fa fa-arrow-up"></i></span><span class="row-no">5</span><span class="arrow arrow-down"><i class="fa fa-arrow-down"></i></span></td><td>1965</td><td>God Bless You, Mr. Rosewater</td><td>A</td></tr>
    </tbody>
</table>
</div>

<script src="jquery.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    // Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$("#sort tbody").sortable({
    helper: fixHelper,
    stop: function( event, ui ){
        $(this).find('tr').each(function(i){
            $(this).find('td:first .row-no').text(i+1);
        });
    },
    update: function( event, ui ){
        $(this).find('tr').each(function(i){
            $(this).find('td:first .row-no').text(i+1);
        });
    }
}).disableSelection();



var fixHelperModified = function(e, tr) {
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function(index)
    {
      $(this).width($originals.eq(index).width())
    });
    return $helper;
};



function moveUp(item) {
    var prev = item.prev();
    if (prev.length == 0)
        return;
    prev.css('z-index', 999).css('position','relative').animate({ top: item.height() }, 250);
    item.css('z-index', 1000).css('position', 'relative').animate({ top: '-' + prev.height() }, 300, function () {
        prev.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertBefore(prev);
        
    });
}
function moveDown(item) {
    var next = item.next();
    if (next.length == 0)
        return;
    next.css('z-index', 999).css('position', 'relative').animate({ top: '-' + item.height() }, 250);
    item.css('z-index', 1000).css('position', 'relative').animate({ top: next.height() }, 300, function () {
        next.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertAfter(next);
    });
}


$('.arrow-up').click(function() { 
    moveUp($(this).parent().parent());
});
$('.arrow-down').click(function() { 
    moveDown($(this).parent().parent());
});
</script>