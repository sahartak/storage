<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<meta name="generator" content="HTML Tidy for Windows (vers 15 August 2007), see www.w3.org">
<title>McDonalds Store Locator using PHP, MySQL and Google Maps</title>
<meta name="description" content="McDonalds Store Locator using PHP, MySQL and Google Maps">
<meta name="keywords" content="javascript, web, ajax, jquery, store locator, google maps">

<link rel="stylesheet" href="style.css">

<script src="smartinfowindow.js"></script> 
<script src="app.js" type="text/javascript"></script>

<style>
    
.infowindow {
  position: relative;
  display: inline-block;
  height:110px !important;
  z-index: 0;
}
.arrow-up {
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #fff;
    position: absolute;
    top:0px;
    /* top: 0px; */
    /* left: 116px; */
}
.arrow-down {
    width: 0;
    height: 0;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-top: 10px solid #fff;
    position: absolute;
    /* top: 0px; */
    /* left: 116px; */
    top:99px;
}

.arrow-right {
    width: 0; 
    height: 0; 
    border-top: 60px solid transparent;
    border-bottom: 60px solid transparent;
    
    border-left: 60px solid green;
}

.arrow-left {
    width: 0; 
    height: 0; 
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent; 
    
    border-right:10px solid blue; 
}/* 
.infowindow:after, .infowindow:before {
    top: 100%;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}

.infowindow:after {
    border-color: rgba(235, 235, 235, 0);
    border-top-color: #fff;
    border-width: 10px;
    margin-left: -10px;
}
.infowindow:before {
    border-color: rgba(217, 212, 197, 0);
    border-top-color: #337ab7;
    border-width: 12px;
    margin-left: -12px;
} */
</style>
</head>
<body>
    
        <div class="map-wraper">
            <div class="left-content">
                <div class="search-bar">
                    <div class="input-group">
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address here" value="<?php echo isset($_GET['address'])?$_GET['address']:''; ?>">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" id="store-form">Go!</button>
                        <button class="btn btn-default" type="button" id="current-location"><img src="location-map-icon.png" style="width: 16px;" alt=""></button>
                        </span>
                    </div>

                </div>
                
                <br>
                <div id="map-panel">
                    <div class="list-group">
                        
                    </div>
                </div>
                <div id="pagination" style="display:none;">
                    <nav>
                        <ul>
                            <li><button class="previous btn btn-link" style="padding:0px;" href="#">Previous</button></li>
                            <li class="paging"><label id="page-number"></label> of <label class="total-locations"></label> </li>
                            <li><button style="padding:0px;" class="next btn btn-link" href="#">Next</button></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right-content">
                <div id="map-canvas-wrapper">
                    <div class="loading-content">
                        <a href="#" id="reload" title="Search this area"><img src="loading.png" style="width:25px;" alt=""></a>
                    </div>
                    <div id="map-canvas">
                        
                    </div>
                </div>
                <div id="location-info" class="col-lg-12">
                    <div class="featured-store">
                        <h4>Featured Store:</h4>
                        <div class="panel panel-danger">
                            <div class="panel-body">Panel heading without title</div>
                        </div>
                        <a href="add-store.php" style="display:none;" class=" suggest-location btn btn-success">Suggest New Location</a> 
                    </div>
                    <div class="selected-store">
                        <h4>Select Store:</h4>
                        <div class="panel panel-info" style="height:210px;">
                            <div class="panel-body">
                                <div class="col-lg-8 store-info">
                                    <address>
                                      <strong><span class="store-name"></span></strong><br>
                                      <span class="store-address"></span><br>                                 
                                    </address>
                                </div>
                                <div class="col-lg-4 store-image">
                                    
                                </div>
                                <div class="col-lg-12 store-description">
                                    
                                </div>
                            </div>
                        </div>             
                        
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">initAutocomplete();</script>
<style>
.gm-style .gm-style-iw {
    overflow: auto;
    max-height: 130px;
    height: auto;
}
</style>
</body>
</html>
