<?php 
include_once 'get-locations.php';
include_once 'inc/header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<meta name="generator" content="HTML Tidy for Windows (vers 15 August 2007), see www.w3.org">
<title>McDonalds Store Locator using PHP, MySQL and Google Maps</title>
<meta name="description" content="McDonalds Store Locator using PHP, MySQL and Google Maps">
<meta name="keywords" content="javascript, web, ajax, jquery, store locator, google maps">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places"></script>
<style type="text/css" media="screen">
    .pac-container {
  z-index: 1051 !important;
}
</style>
</head>
<body>
   
      


    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php if(count($result_array)<=0): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>No Location Found</h3>
                        </div>
                        <div class="panel-body">
                            <p>Add new location
                            <button type="button" class="btn btn-primary pull-right" id="store-locator" data-toggle="modal" class="btn btn-info" href="com.php" data-target="#myModal">Add Location</button>
                            </p>
                        </div>
                    </div>
                <?php else: ?>
                    <button type="button" class="btn btn-primary" id="store-locator" data-toggle="modal" class="btn btn-info" href="com.php" data-target="#myModal">Add Location</button>
                <?php endif; ?>
                    
                        
                
            </div>
        </div><br>
        <?php if(count($result_array)>0): ?>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php $primary=array(); ?>
                <?php foreach ($result_array as $key => $value): ?>
                    <?php if($value['status']): ?>
                        <?php $primary=$value; ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">                                        
                                <?php echo $value['store_name']; ?> <span class="label label-primary pull-right">Primary Location</span>
                            </div>
                            <div class="panel-body">
                                <?php if(count($primary)>0): ?>
                                    <address>
                                        <?php echo $primary['address'].", ".$primary['city']; ?><br>
                                        <?php echo $primary['region'].", ".$primary['postal_code']; ?>
                                    </address>
                                <?php endif; ?>
                                <form action="get-locations.php" method="post" class="pull-right">
                                    <input type="hidden" name="store_id" value="<?php echo $primary['store_id']; ?>">
                                    <input type="submit" value="Delete" name="delete_location" class="btn btn-danger">
                                </form>   
                            </div>
                        </div>
                    <?php endif;break; ?>
                <?php endforeach; ?>
                                    
                
                <div class="list-group">
                    <?php foreach ($result_array as $key => $value): ?>
                        <?php if(!$value['status']): ?>
                        <a href="#" class="list-group-item" style="min-height:100px;">
                            <h4><?php echo $value['store_name']; ?></h4>
                            <p>
                                <div class="pull-left">
                                    <address>
                                    <?php echo $value['address'].", ".$value['city']; ?><br>
                                    <?php echo $value['region'].", ".$value['postal_code']; ?>
                                    </address>
                                </div>
                                    
                                <div class="pull-right">
                                    <form action="get-locations.php" method="post">
                                        <input type="hidden" name="store_id" value="<?php echo $value['store_id']; ?>">
                                        <input type="submit" value="Set as Primary" class="btn btn-info">
                                        <input type="submit" value="Delete" name="delete_location" class="btn btn-danger">
                                    </form>                                    
                                </div>
                            </p>
                        </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
                
        </div>
        <?php endif; ?>
    </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<?php include_once 'inc/footer.php'; ?>
<script src="smartinfowindow.js"></script> 
<script src="com.js" type="text/javascript"></script>
<script>
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    var map = null;
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
        addresses['store_name']= jQuery('#store-name').val();
        addresses['address']= jQuery('#addresss').val();
        addresses['city']=jQuery('#city').val();
        addresses['region']= jQuery('#region').val()
        addresses['postal_code']= jQuery('#postal-code').val();
        initializeMap(addresses);

    })
</script>
</body>
</html>