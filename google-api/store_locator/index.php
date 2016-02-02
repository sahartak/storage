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
<style type="text/css" media="screen">
    .pac-container {
  z-index: 1051 !important;
}
</style>
</head>
<body>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDef4rRaE0L456ZEJGpTYHKAFKDSqjMEa8&signed_in=true&libraries=places"></script>
      
<div class="search-bar">
    <form class="form-horizontal" method="POST" action="save.php">
  <div class="form-group">
    <label for="store-name" class="col-sm-2 control-label">Store Name</label>
    <div class="col-sm-4 col-lg-4">
        <input type="hidden" class="form-control" required id="store-id" name="store_id">
      <input type="text" class="form-control" required id="store-name" name="store_name" placeholder="Enter Store Name">
    </div>
  </div>
  <div class="form-group">
    <label for="address" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-4 col-lg-4">
      <input type="text" class="form-control" required id="addresss" name="address" placeholder="Enter Address">
    </div>
  </div>
  <div class="form-group">
    <label for="city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-4 col-lg-4">
      <input type="text" class="form-control" required id="city" name="city" placeholder="Enter City">
    </div>
  </div>
<div class="form-group">
    <label for="region" class="col-sm-2 control-label">Region</label>
    <div class="col-sm-4 col-lg-4">
      <input type="text" class="form-control" required id="region" name="region" placeholder="Enter Region">
    </div>
  </div>
  <div class="form-group">
    <label for="postal-code" class="col-sm-2 control-label">Postal Code</label>
    <div class="col-sm-4 col-lg-4">
      <input type="text" class="form-control" required id="postal-code" name="postal_code" placeholder="Enter Postal Code">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4 col-lg-4">
    <button type="submit" class="btn btn-primary">Submit</button>
      <button type="button" class="btn btn-default" id="store-locator" data-toggle="modal" class="btn btn-info" href="store-locator.php" data-target="#myModal">Locate Store</button>
    </div>
  </div>

<div id="ajax-modal" class="modal fade" tabindex="-1" style="display: none;"></div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
</form>

</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<script src="smartinfowindow.js"></script> 
<script src="app.js" type="text/javascript"></script>
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
        jQuery('.modal-content').html('');
    });
    jQuery('#myModal').on('hidden.bs.modal', function () {
        
    })
    jQuery('#myModal').on('shown.bs.modal', function () {
        addresses['store_name']= jQuery('#store-name').val();
        addresses['address']= jQuery('#addresss').val();
        addresses['city']=jQuery('#city').val();
        addresses['region']= jQuery('#region').val()
        addresses['postal_code']= jQuery('#postal-code').val();
        console.log(addresses);
        initializeMap(addresses);

    })
</script>
</body>
</html>