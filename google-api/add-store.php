<?php require 'getData.php'; ?>
<?php require_once 'inc/header.php'; ?>
<?php 
    $d = array('1' => 'mon','tue','wed','thu','fri','sat','sun');
    $operation_hours=isset($records['operation_hours'])?$records['operation_hours']:'';
    $hrs=json_decode($operation_hours,true);
    $h='';
    if(count($hrs)>0)
    {
        $h='<table class="table table-bordered"><thead><tr><th>Day</th><th>Open Time</th><th>Break Start</th><th>Break End</th><th>Close Time</th></tr></thead><tbody>';        
        foreach($d as $i=>$v){
            foreach($hrs as $index=>$value){
            if($v==$index)
            {
              $h .='<tr>';
              if($value['status']=='Opened')
              {
                $h .='<td>'.$index.'</td>';
                $t=explode(' ',$value['open']);
                if($t[1]=='1')
                {
                  $value['open']=$t[0]." AM";
                }
                else{
                  $value['open']=$t[0]." PM";
                }
                $h .='<td>'.$value['open'].'</td>';
                if($value['break_start']!=null)
                {
                    $t=explode(' ',$value['break_start']);
                    if($t[1]=='1')
                    {
                      $value['break_start']=$t[0]." AM";
                    }
                    else{
                      $value['break_start']=$t[0]." PM";
                    }
                  $h .='<td>'.$value['break_start'].'</td>';
                }
                else
                {
                  $h .='<td></td>';
                }

                if($value['break_end']!=null)
                {
                    $t=explode(' ',$value['break_end']);
                    if($t[1]=='1')
                    {
                      $value['break_end']=$t[0]." AM";
                    }
                    else{
                      $value['break_end']=$t[0]." PM";
                    }
                  $h .='<td>'.$value['break_end'].'</td>';
                }
                else
                {
                  $h .='<td></td>';
                }
                $t=explode(' ',$value['close']);
                if($t[1]=='1')
                {
                  $value['close']=$t[0]." AM";
                }
                else{
                  $value['close']=$t[0]." PM";
                }
                $h .='<td>'.$value['close'].'</td>';
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
        

?>
<style>
            body{
                background-color: #e5e5e5;
            }
            .list-group-item{
                display:inline-block;
            }
            tr td {
                color: #b7b4b4;
                padding: 5px;
            }
        </style>
        <style>
body{ 
    margin-top:40px; 
}
.list-group-item{
    width:100%;
}
.stepwizard-step p {
    margin-top: 10px;
}
.data-action {
    float: right;
}
i.fa.fa-pencil {
    padding: 20px;
    background-color: rgba(195, 195, 195, 0.11);
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
       height: 370px;
       width: 400px;
    }
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.data-body:hover{
    background-color: #EFF3F8;
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
span[data-toggle=modal]:hover {
    font-size: 20px;
}
</style>
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
                                <div class="container" style="margin-left:0px;margin-right:0px;">
                            <div style="min-width:900px;margin-left:auto;margin-right:auto;">
            <?php if(isset($msg)): ?>
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                The store for provided ID is not found!
            </div>
            <?php endif; ?>
            <div class="list-group">
                <div href="#" class="list-group-item " id="business-name">
                    <div class="store-data" style="width:800px;float:left;">
                        <div class="data-title" style="width:140px;float:left;padding-left: 15px;">
                            <h5>Business Name</h5>
                        </div>
                        <div class="data-body" style="width: 600px;float: left;padding: 10px;color: #B7B4B4;">
                            <p><?php echo isset($records['store_name'])?$records['store_name']:''; ?></p>
                            <div class="edit-content"></div>
                        </div>

                    </div>
                    <div class="data-action" >
                        <span data-target="#Popup business">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </div>
                </div>
                <div href="#" class="list-group-item " id="business-address">
                    <div class="store-data" style="width:800px;float:left;">
                        <div class="data-title" style="width:140px;float:left;padding-left: 15px;">
                            <h5>Address</h5>
                        </div>
                        <div class="data-body" style="width: 600px;float: left;padding: 10px;color: #B7B4B4;">
                            <p>
                                <div class="address"><?php echo isset($records['formatted_address'])?$records['formatted_address']:''; ?></div>
                                <?php if(isset($records['lat']) && $records['lat']!=''): ?>
                                    <div class="address-map" style="width:585px;height:230px;background-color:#e5e5e5;background:url(https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=645x230&maptype=roadmap&markers=color:red%7C%7C<?php echo $records['lat'].','.$records['lng']; ?>)"></div>
                                <?php else: ?>
                                    <div class="address-map" style="width:585px;height:230px;background-color:#e5e5e5;display:none;"></div>
                                <?php endif; ?>
                            </p>
                            <div class="edit-content"></div>
                        </div>

                    </div>

                    <div class="data-action" >
                        <span data-target="#Popup">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </div>
                </div>
                <div href="#" class="list-group-item " id="business-contact">
                    <div class="store-data" style="width:800px;float:left;">
                        <div class="data-title" style="width:140px;float:left;padding-left: 15px;">
                            <h5>Contact info</h5>
                        </div>
                        <div class="data-body" style="width: 600px;float: left;padding: 10px;color: #B7B4B4;">
                            <p>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Work Contact</td>
                                            <td><?php echo isset($records['work_contact'])?$records['work_contact']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Home Contact</td>
                                            <td><?php echo isset($records['home_contact'])?$records['home_contact']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile</td>
                                            <td><?php echo isset($records['mobile'])?$records['mobile']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fax No</td>
                                            <td><?php echo isset($records['fax_no'])?$records['fax_no']:''; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td><?php echo isset($records['website'])?$records['website']:''; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                            <div class="edit-content"></div>
                        </div>

                    </div>

                    <div class="data-action" >
                        <span data-target="#Popup">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </div>
                </div>
                <div href="#" class="list-group-item" id="business-hours">
                    <div class="store-data" style="width:800px;float:left;">
                        <div class="data-title" style="width:140px;float:left;padding-left: 15px;">
                            <h5>Hours</h5>
                        </div>
                        <div class="data-body" style="width: 600px;float: left;padding: 10px;color: #B7B4B4;">
                            <p><?php echo $h; ?></p>
                            <div class="edit-content"></div>
                        </div>

                    </div>

                    <div class="data-action" >
                        <span data-target="#Popup">
                            <i class="fa fa-pencil"></i>
                        </span>
                    </div>
                </div>
                <div href="#" class="list-group-item" id="business-description">
                    <div class="store-data" style="width:800px;float:left;">
                        <div class="data-title" style="width:140px;float:left;padding-left: 15px;">
                            <h5>Introduction</h5>
                        </div>
                        <div class="data-body" style="width: 600px;float: left;padding: 10px;color: #B7B4B4;">
                            <p><?php echo isset($records['description'])?$records['description']:''; ?></p>
                            <div class="edit-content"></div>
                        </div>

                    </div>

                    <div class="data-action">
                        <span  data-target="#Popup"><i class="fa fa-pencil"></i></span>

                    </div>
                </div>
                <div href="#" class="list-group-item">
                    <div class="store-data" style="width:800px;float:left;">
                        <div class="data-title" style="width:140px;float:left;padding-left: 15px;">
                            <button type="button" onclick="document.location.href='suggest-locations.php'" class="btn-sm btn-primary">Done editing</button>
                        </div>
                        <div class="data-body" style="width: 600px;float: left;padding: 10px;color: #B7B4B4;">
                            
                        </div>
                    </div>
                        
                    <div class="data-action">
                        <div class="_blank" style="padding: 25px;">

                        </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="modal lg" id="Popup">
            
        </div><!-- /.modal -->
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

<script type="text/javascript"> 
            var map;
            var marker;
            var mapOptions;
            var hasMarker=0;
            var last_position ;
            var new_position;
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow();
            var placeSearch, autocomplete,locationResult;
            console.log(json_record);
            if(json_record.lat!=null)
            {
                hasMarker=1;
                var myLatlng = new google.maps.LatLng(json_record.lat,json_record.lng);
                last_position=myLatlng;
                new_position=myLatlng;
                mapOptions = {
                    zoom: 13,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
            }
            else
            {
                var myLatlng = new google.maps.LatLng(40.70387,-74.013854);
                last_position=null;
                new_position=myLatlng;
                mapOptions = {
                    zoom: 1,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
            }
  var addressList={
        street_number: '', 
        route: '', 
        neighborhood:'',
        sublocality_level_2:'',
        sublocality_level_1:'',
        locality: '', 
        administrative_area_level_3: '',
        administrative_area_level_2: '',
        administrative_area_level_1: '',
        country: '',
        postal_code: '',
        latitude:'',
        longitude:'',
        formatted_short_address:'',
        formatted_long_address:''
  };
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'long_name',
  administrative_area_level_2: 'long_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function clearAddressList()
{
  addressList={
        street_number: '', 
        route: '', 
        neighborhood:'',
        sublocality_level_2:'',
        sublocality_level_1:'',
        locality: '', 
        administrative_area_level_3: '',
        administrative_area_level_2: '',
        administrative_area_level_1: '',
        country: '',
        postal_code: '',
        latitude:'',
        longitude:'',
        formatted_short_address:'',
        formatted_long_address:''
  };
}

function getResult(place)
{
  addressList.latitude=place.geometry.location.lat();
  addressList.longitude=place.geometry.location.lng();
}


function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]
            function initialize(){
                map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
                if(hasMarker==1)
                {
                    marker = new google.maps.Marker({
                        draggable: true 
                    });
                    marker.setMap(map);
                    if(last_position==null)
                    {
                        //marker.setPosition(new_position); 
                        map.setCenter(new_position);
                        
                        map.setZoom(1);
                    }
                    else
                    {
                        marker.setPosition(last_position); 
                        map.setCenter(last_position);
                        
                        map.setZoom(13);
                    }
                        
                    google.maps.event.addListener(marker, 'dragend', function() {
                        if(geocoder==null)
                        {
                             geocoder = new google.maps.Geocoder();
                        }
                        geocoder.geocode({latLng: marker.getPosition()}, function(results) {
                             if (results && results.length > 0) {
                                $('#autocomplete').val(results[0].formatted_address);
                                var latlng = results[0].geometry.location;
                                //map.setCenter(latlng);
                                //marker.setPosition(latlng);
                                new_position=marker.getPosition();
                                $('#address').val(results[0].formatted_address);
                                $('#lat').val(marker.getPosition().lat());
                                $('#lng').val(marker.getPosition().lng());
                                //infowindow.setContent(results[0].formatted_address);
                                //infowindow.open(map, marker);
                            }
                        });
                    });
                }
                                
                $('#lat').val(myLatlng.lat());
                $('#lng').val(myLatlng.lng());

            }

            function setMarker(address){                          
                var param={};
                if(typeof address!=='undefined')
                {
                    param={'address':address};
                }
                else{
                    param={'latLng': myLatlng };
                }
                if(geocoder==null)
                        {
                             geocoder = new google.maps.Geocoder();
                        }
                geocoder.geocode(param, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#autocomplete').val(results[0].formatted_address);
                            if(typeof address==='undefined')
                            {
                                getResult(results[0]);
                            }
                            
                            $('#address').val(results[0].formatted_address);
                            $('#lat').val(marker.getPosition().lat());
                            $('#lng').val(marker.getPosition().lng());
                            var latlng = results[0].geometry.location;

                            map.setCenter(latlng);
                            //marker.setPosition(latlng); 
                            //infowindow.setContent(results[0].formatted_address);
                            //infowindow.open(map, marker);
                        }
                    }
                });
            }

            function moveMap(address){
                var addr='';
                $.each(address,function(i,v){
                if(v!='')
                {
                    addr +=', '+v;
                }
                });
                if(geocoder==null)
                {
                     geocoder = new google.maps.Geocoder();
                }
                geocoder.geocode({'address':addr}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#autocomplete').val(results[0].formatted_address);
                            if(typeof address==='undefined')
                            {
                                getResult(results[0]);
                            }
                            if(last_position=='undefined')
                            {
                                console.log(last_position);
                                last_position=results[0].geometry.location;
                            }
                            new_position=results[0].geometry.location;
                            $('#address').val(results[0].formatted_address);
                            $('#lat').val(results[0].geometry.location.lat());
                            $('#lng').val(results[0].geometry.location.lng());
                            var latlng = results[0].geometry.location;
                           if(marker==null)
                           {
                                marker = new google.maps.Marker({
                                    draggable: true 
                                }); 
                           }
                            map.setCenter(latlng);
                            map.setZoom(13);
                            marker.setMap(map);
                            marker.setPosition(latlng); 
                            //infowindow.setContent(results[0].formatted_address);
                            //infowindow.open(map, marker);
                        }
                    }
                });
            }
        </script>  
<script>
$(document).ready(function () {
    
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
<script>
    $('.day').each(function() {
    var day = $(this).attr('id');
    $(this).append('<td><input type="checkbox" name="closed" value="closed" class="closed form-control" title="Closed"></td>');
    $(this).append('<td><div id="label">' + day + ': </div></td>');
    var html='<td><select name="' + day + 'FromH" class="hour from form-control"></select><select name="' + day + 'FromM" class="min from form-control"></select><select name="' + day + 'FromAP" class="ampm from form-control"></select> to <select name="' + day + 'ToH" class="hour to form-control"></select> <select name="' + day + 'ToM" class="min to form-control"></select> <select name="' + day + 'ToAP" class="ampm to form-control"></select></td>';
    $(this).append(html);
    

});

$('.hour').each(function() {
    for (var h = 1; h < 13; h++) {
        $(this).append('<option value="' + h + '">' + h + '</option>');
    }

    $(this).filter('.from').val('9');
    $(this).filter('.to').val('5');
});

$('.min').each(function() {
    var min = [':00', ':15', ':30', ':45'];
    for (var m = 0; m < min.length; m++) {
        $(this).append('<option value="' + min[m] + '">' + min[m] + '</option>');
    }

    $(this).val(':00');
});

$('.ampm').each(function() {
    $(this).append('<option value="AM">AM</option>');
    $(this).append('<option value="PM">PM</option>');

    $(this).filter('.from').val('AM');
    $(this).filter('.to').val('PM');
});

$('.closed').change( function() { 
    if($(this).filter(':checked').val() == "closed") {
        $(this).parent().parent().find('select').attr('disabled', true);
    } else {
        $(this).parent().parent().find('select').attr('disabled', false);
    }
});

$('#Saturday .closed, #Sunday .closed').val(["closed"]).parent().parent().find('select').attr('disabled', true);</script>