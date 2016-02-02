<?php require 'db-con.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$userid='110011';
$d = array('1' => 'mon','tue','wed','thu','fri','sat','sun');
$sql="SELECT store_info.*,user_location.`order` FROM user_location INNER JOIN store_info ON store_info.id=user_location.store_id ORDER BY user_location.`order`";
//echo $sql;exit;
$rs=mysqli_query($mysqli,$sql);
$records=array();
if($rs)
{
    while($row=mysqli_fetch_assoc($rs))
    {
        foreach($row as $key=>$value)
        {
            if($key=='id')
            {
                $row[$key]=$encrypt->encode($value);
            }
        }
        $row['address']=$row['street1'].', '.$row['street2'].', '.$row['city'].', '.$row['region'].', '.$row['country'].', '.$row['postalcode'];
        $records[]=$row;
    }
}
$operation_hours=isset($records['operation_hours'])?$records['operation_hours']:'';
$h=getHours($operation_hours);
?>
<?php require_once 'inc/header.php'; ?>
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
.table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid rgba(122, 145, 169, 0.07);
    background-color: #fff;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.drag-started{
    background-color:#2196F3;
    color:#fff;
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
.store-list tbody tr{
    /* -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease; */
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
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script>

        <div class="clearfix"> </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Dashboard
                                <small>dashboard &amp; statistics</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE BREADCRUMBS -->
                        <ul class="page-breadcrumb breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
                            </li>
                        </ul>
                        <!-- END PAGE BREADCRUMBS -->
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">


                            <div class="row">
                                <div class="row">
                        <div class="container">
<a style="margin-bottom:5px;" data-toggle="modal" class="btn btn-primary" href="store-locator.php" data-target="#myModal">Suggest Store</a>
<!-- <button style="margin-bottom:5px;background-color: #F0F0F0;box-shadow: 1px 1px 4px rgba(0,0,0,0.4);" disabled class="btn btn-default update-order">Update Order</button> -->
<input type="hidden" id="user_id" value="<?php echo $userid; ?>" />
<table id="sort1" class="grid table table-bordered store-list">
    <thead>

        <tr><th>SN</th><th>Address</th><th>Status</th><th>Hours</th><th>Action</th></tr>
    </thead>
    <tbody>
        <?php
            foreach ($records as $key => $value) {
                $operation_hours=isset($value['operation_hours'])?$value['operation_hours']:'';
    $hrs=json_decode($operation_hours,true);
    $h='';
    if(count($hrs)>0)
    {
        $h='<table class="table table-bordered"><thead><tr><th>Day</th><th>Open Time</th><th>Break Start</th><th>Break End</th><th>Close Time</th></tr></thead><tbody>';
        foreach($d as $i=>$v){
            foreach($hrs as $index=>$val){
            if($v==$index)
            {
              $h .='<tr>';
              if($val['status']=='Opened')
              {
                $h .='<td>'.$index.'</td>';
                $t=explode(' ',$val['open']);
                if($t[1]=='1')
                {
                  $val['open']=$t[0]." AM";
                }
                else{
                  $val['open']=$t[0]." PM";
                }
                $h .='<td>'.$val['open'].'</td>';
                if($val['break_start']!=null)
                {
                    $t=explode(' ',$val['break_start']);
                    if($t[1]=='1')
                    {
                      $val['break_start']=$t[0]." AM";
                    }
                    else{
                      $val['break_start']=$t[0]." PM";
                    }
                  $h .='<td>'.$val['break_start'].'</td>';
                }
                else
                {
                  $h .='<td></td>';
                }

                if($val['break_end']!=null)
                {
                    $t=explode(' ',$val['break_end']);
                    if($t[1]=='1')
                    {
                      $val['break_end']=$t[0]." AM";
                    }
                    else{
                      $val['break_end']=$t[0]." PM";
                    }
                  $h .='<td>'.$val['break_end'].'</td>';
                }
                else
                {
                  $h .='<td></td>';
                }
                $t=explode(' ',$val['close']);
                if($t[1]=='1')
                {
                  $val['close']=$t[0]." AM";
                }
                else{
                  $val['close']=$t[0]." PM";
                }
                $h .='<td>'.$val['close'].'</td>';
              }
              else
              {
                $h .='<td>'.$index.'</td>';
                $h .='<td colspan=4>Closed</td>';
              }
              $h .='</tr>';
            }
          }
        }
        $h .='</tbody></table>';
    }
    else{
        $h=$value['operation_hours'];
    }
                echo '<tr class="store-row">
                    <td style="width: 100px;">
                        <input type="hidden" id="'.$value['id'].'" />
                        <span class="arrow arrow-up1"><i class="fa fa-arrow-up"></i></span>
                        <span class="row-no">'.($key+1).'</span>
                        <span class="arrow arrow-down1"><i class="fa fa-arrow-down"></i></span>
                    </td>
                    <td><h4>'.$value['store_name'].'</h4>'.$value['address'].'</td>
                    <td>'.$value['status'].'</td>
                    <td>'.$h.'</td>
                    <td><a href="add-store.php?id='.$value['id'].'" class="edit" rel="'.$value['id'].'">Edit</a> <a href="#" class="delete" rel="'.$value['id'].'">Delete</a></td>
                    </tr>';
            }

        ?>
    </tbody>
</table>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<div class="modal lg" id="Popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delete?</h4>
            </div>
            <div class="modal-body">
                <p>
                   Are you sure you want to delete location?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
                    </div>
                </div>

                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->


            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <?php require_once 'inc/footer.php'; ?>

<script>
    var store_id='';

    jQuery('.delete').click(function(){
        store_id=$(this).attr('rel');
        $('#Popup').modal({show:true, backdrop: 'static', keyboard: false });
    });
    jQuery(document).one('click','#delete',function(){
        var url='delete_store.php?id='+store_id;
        document.location.href=url;

    });


    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var map = null;
    var ship=0;
    var geocoder = null;
    var markers = [];
    var markersById = [];
    var infoWindow = null;
    var address;
    //var infowindow = new google.maps.InfoWindow({disableAutoPan: true,maxWidth:200});
    var marker, i;
    var page=0;
    var pageno=1;
    var inter=10;
    var selMarker;
    var pages;
    var input;
    var zoomLeve1=1;
    var autocomplete;
    var localAddr;
    var map_id;
    var curLocation='';
    var selLocation;
    /*var markers = new Array();*/
    var markerContent=[];
    var addresses={};
</script>
<script>
    jQuery('#store-locator').click(function(e){
        e.preventDefault();
    });
    jQuery('#myModal').on('hidden.bs.modal', function () {

    })
    jQuery('#myModal').on('shown.bs.modal', function () {
        if(map==null)
        {
            initializeMap();
            $('.suggest-location').show();
            $('#store-form').trigger('click');
        }


    })
</script>
</div>


<script>
    // Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$("#sort1 tbody").eq(0).sortable({
    helper: fixHelper,
    start: function(event, ui){
        /*ui.item.addClass('drag-started');*/
        /*ui.item.find('a').css('color','#fff');*/
        $('.update-order').removeAttr('disabled').removeClass('btn-default').removeAttr('style').css('margin-bottom','5px').addClass('btn-primary');
    },
    stop: function( event, ui ){
        $(this).find('tr.store-row').each(function(i){
            $(this).find('td:first .row-no').text(i+1);
        });
        $('.update-order').removeAttr('disabled');
        updateOrder();
    },
    update: function( event, ui ){
        $(this).find('tr.store-row').each(function(i){
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
function updateOrder(){
    var store_list=[];
    var user_id=$('#user_id').val();
    store_list.push({user_id:user_id});
    $('.store-list tbody tr.store-row').each(function(i,v){
        var order=i+1;
        var store_id=$(v).find('td input').attr('id');
        store_list.push({store_id:store_id,order:order});
    })
    if(store_list.length>0)
    {
        $.post('save_userlist.php', {data:store_list}, function(data, textStatus, xhr) {
            $('.update-order').attr('disabled','disabled');
        });
    }
}
$(document).on('click','.add-list',function(e){
    var user_id=$('#user_id').val();
    var store_id=$(this).attr('id');
    var store_list=[];
    store_list.push({store_id:store_id,user_id:user_id});
    $.post('save_userlist.php', {add_list:store_list}, function(data, textStatus, xhr) {
        data=$.parseJSON(data);
        if(data.user_data)
        {
            var dt=data.user_data;
            var html='<tr class="ui-sortable-handle"><td style="width: 100px;"><input type="hidden" id="'+dt.id+'" /><span class="arrow arrow-up1"><i class="fa fa-arrow-up"></i></span><span class="row-no">1</span><span class="arrow arrow-down1"><i class="fa fa-arrow-down"></i></span></td><td><h4>'+dt.store_name+'</h4>'+dt.address+'</td><td>'+dt.status+'</td><td>'+dt.operation_hours+'</td><td><a href="add-store.php?id='+dt.id+'" class="edit" rel="'+dt.id+'">Edit</a> <a href="#" class="delete" rel="'+dt.id+'">Delete</a></td></tr>';
            $('.store-list tbody').eq(0).prepend(html);
            rearrange();
        }
        if(data.error)
        {
            alert(data.error);
        }
        else if(data.success)
        {
            alert(data.success);
        }
    });

});

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

var t;
$('.arrow-up1').click(function() {
    var item=$(this).parent().parent();
    t=item;
    moveUp(item);
    setInterval(rearrange,500);
});
function rearrange()
{
    $('.store-list tbody').eq(0).find('tr.store-row').each(function(i,v){
        $(this).find('td:first .row-no').text(i+1);
    });
    $('.update-order').removeAttr('disabled').removeClass('btn-default').removeAttr('style').css('margin-bottom','5px').addClass('btn-primary');
    updateOrder();
}
$('.arrow-down1').click(function() {
    var item=$(this).parent().parent();
    t=item;
    moveDown(item);
    setInterval(rearrange,500);
});
</script>
