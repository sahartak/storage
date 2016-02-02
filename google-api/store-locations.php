
<?php 
include_once 'get-locations.php';
$active='store';
include_once 'inc/header.php';
?>
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
<!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script-->

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
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            <div class="row">
            <div class="col-lg-10">
                <?php if(count($result_array)<=0): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>No Location Found</h3>
                        </div>
                        <div class="panel-body">
                            <p>Add new location
                            <button type="button" class="btn btn-primary pull-right" id="store-locator" data-toggle="modal" class="btn btn-info" href="store-locator.php" data-target="#myModal">Add Location</button>
                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <button type="button" class="btn btn-primary" id="store-locator" data-toggle="modal" class="btn btn-info" href="store-locator.php" data-target="#myModal">Add Location</button>
                <?php endif; ?>
                    
                        
                
            </div>
        </div><br>
        <?php if(count($result_array)>0): ?>
        <div class="row">
            <div class="col-lg-10">
                <?php $primary=array(); ?>
                <?php foreach ($result_array as $key => $value): ?>
                    <?php if($value['is_primary']): ?>
                        <?php $primary=$value; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">                                        
                                <?php echo $value['store_name']; ?> <span class="label label-primary pull-right">Primary Location</span>
                            </div>
                            <div class="panel-body">
                                <div class="pull-left">
                                    <?php if(count($primary)>0): ?>
                                        <address>
                                            <?php echo $primary['address']; ?><br>
                                            <h4>Operation Hours</h4>
                                            <?php echo $primary['hours']; ?><br>
                                        </address><br>

                                        <?php if($primary['store_pic']!=''): ?>
                                            <img style="width:300px" src="<?php echo $primary['store_pic']; ?>" alt="">
                                        <?php endif; ?>
                                        
                                    <?php endif; ?>
                                </div>
                                <div class="pull-right">
                                    <form action="get-locations.php" method="post" class="pull-right" id="form">
                                        <input type="hidden" name="store_id" value="<?php echo $primary['store_id']; ?>">
                                        <a href="#" class="btn btn-danger delete" rel="<?php echo $value['store_id']; ?>">Delete</a>
                                    </form> 
                                </div>
                                      
                            </div>
                        </div>
                    <?php endif;break; ?>
                <?php endforeach; ?>
                                    
                
                <div class="list-group">
                    <?php foreach ($result_array as $key => $value): ?>
                        <?php if(!$value['is_primary']): ?>
                        <div class="list-group-item" >
                            <p>
                                <div class="pull-left">
                                    <h4><?php echo $value['store_name']; ?></h4>

                                    <address>
                                    <?php echo $value['address']; ?>
                                    </address><br>
                                    <h4>Operation Hours</h4>
                                    <?php echo $value['hours']; ?><br>
                                    <br>
                                    <?php if(isset($value['store_pic']) && $value['store_pic']!=''): ?>
                                        <img style="width:300px" src="<?php echo $value['store_pic']; ?>" alt="">
                                    <?php endif; ?>
                                    
                               </div>
                                    
                                <div class="pull-right">
                                    <form action="get-locations.php" method="post" id="form">
                                        <input type="hidden" name="store_id" value="<?php echo $value['store_id']; ?>">
                                        <input type="submit" value="Set as Primary" class="btn btn-info">
                                        <a href="#" class="btn btn-danger delete" rel="<?php echo $value['store_id']; ?>">Delete</a>
                                    </form>                                    
                                </div>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
        var url='get-locations.php?store_id='+store_id;
        document.location.href=url;

    });
    

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var map = null;
    var ship=1;
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
    var json_record;
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

        initializeMap();

    })
</script>
</div>
