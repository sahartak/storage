
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
</style>
<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn-lg btn-primary btn-square"><i class="fa fa-users"></i></a>
            <p>Business Name</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn-lg btn-default btn-square" disabled="disabled"><i class="fa fa-street-view"></i></a>
            <p>Address</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn-lg btn-default btn-square" disabled="disabled"><i class="fa fa-send"></i></a>
            <p>Contact Info</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn-lg btn-default btn-square" disabled="disabled"><i class="fa fa-calendar"></i></a>
            <p>Operating Hours</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn-lg btn-default btn-square" disabled="disabled"><i class="fa fa-suitcase"></i></a>
            <p>Description</p>
        </div>
    </div>
</div>
<form role="form" id="business-form" action="save-address.php" method="post">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Business Name</h3>
                <div class="form-group">
                    <input  maxlength="100" type="text" required="required" class="form-control" name="store_name" placeholder="Enter Business Name"  />
                </div>
                <div class="col-md-6">
                	
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-6">
            	<div class="panel panel-default">
					<div class="panel-body">
					  	<h3>Address</h3>
					  	<div class="col-md-12">
			                <div class="form-group">
			                	<label class="control-label">Street Address 1</label>
			                    <input  maxlength="100" type="text" required="required" class="form-control" name="street_number" id="street_number" placeholder="Enter Street Address 1"  />
			                </div>
			            </div>
			            <div class="col-md-12">
			                <div class="form-group">
			                    <input  maxlength="100" type="text" class="form-control" id="route" name="route" placeholder="Enter Street Address 2"  />
			                </div>
                        </div>
                        <div class="col-md-6">
			                <div class="form-group">
			                	<label class="control-label">City</label>
			                    <input  maxlength="100" type="text" required="required" class="form-control" name="locality" id="locality" placeholder="City"  />
			                </div>
			            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Region</label>
                                <input  maxlength="100" type="text" required="required" class="form-control" name="administrative_area_level_2" id="administrative_area_level_2" placeholder="Region"  />
                            </div>
                        </div>
		                <div class="col-md-6">
		                	<div class="form-group">
			                	<label class="control-label">State</label>
			                    <input  maxlength="100" type="text" required="required" class="form-control" name="administrative_area_level_1" id="administrative_area_level_1" placeholder="State"  />
			                </div>
		                </div>
		                <div class="col-md-6">
		                	<div class="form-group">
			                	<label class="control-label">Postal Code</label>
			                    <input  maxlength="100" type="text" required="required" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code"  />
			                </div>
		                </div>
			            <div class="col-md-12">
			                <div class="form-group">
			                	<label class="control-label">Country</label>
			                    <input  maxlength="100" type="text" required="required" class="form-control" name="country" id="country" placeholder="Country"  />
                                <input type="hidden" name="lat" id="lat"  />
                                <input type="hidden" name="lng" id="lng"  />
			                </div>
			            </div>
					<button class="btn btn-primary locate btn-lg pull-left" type="button" >Locate</button>
					<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
					</div>
				
				</div>
				
		    </div>
		    <div class="col-md-6">
		    	<div id="map-canvas"></div>
		    </div>      
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Contacts</h3>
                <div class="form-group">
                	<label class="control-label">Work Contact</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" name="work_contact" placeholder="Enter Work Contact"  />
                </div>
                <div class="form-group">
                	<label class="control-label">Home Contact</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" name="home_contact" placeholder="Enter Home Contact"  />
                </div>
                <div class="form-group">
                	<label class="control-label">Mobile</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" name="mobile" placeholder="Enter Mobile"  />
                </div>
                <div class="form-group">
                	<label class="control-label">Fax No</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" name="fax_no" placeholder="Enter Fax No"  />
                </div>
                <div class="form-group">
                	<label class="control-label">Website URL</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" name="website" placeholder="Enter Website URL"  />
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Operating Hours</h3>
                <div class="form-group">
                    <table id="hourForm">
					    <tr id="Sunday" class="day"></tr>
					    <tr id="Monday" class="day"></tr>
					    <tr id="Tuesday" class="day"></tr>
					    <tr id="Wednesday" class="day"></tr>
					    <tr id="Thursday" class="day"></tr>
					    <tr id="Friday" class="day"></tr>
					    <tr id="Saturday" class="day"></tr>
					</table>
                </div>
                
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3>Introduction</h3>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea required class="form-control" name="description"></textarea>
                </div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>
</div>

<script src="jquery.min.js" type="text/javascript"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
<script src="scripts.js"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript"> 
            var map;
            var marker;
            var myLatlng = new google.maps.LatLng(27.7039088,85.33381429999997);
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow();
            var placeSearch, autocomplete,locationResult;
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
  document.getElementById('lat').value = place.geometry.location.lat();
  document.getElementById('lng').value = place.geometry.location.lng();
  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    //
    addressList[addressType]={short_name:place.address_components[i].short_name,long_name:place.address_components[i].long_name};
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
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
                var mapOptions = {
                    zoom: 14,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
           
                map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
                
                marker = new google.maps.Marker({
                    map: map,
                    position: myLatlng,
                    draggable: true 
                });     
                
                geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#autocomplete').val(results[0].formatted_address);
                            getResult(results[0]);
                            //autocomplete.addListener('place_changed', fillInAddress);
                            //google.maps.event.trigger(autocomplete, 'place_changed');
                            $('#address').val(results[0].formatted_address);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });

                               
                google.maps.event.addListener(marker, 'dragend', function() {

                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                          console.log(results[0]);
                            getResult(results[0]);
                            $('#autocomplete').val(results[0].formatted_address);
                            //autocomplete.addListener('place_changed', fillInAddress);
                            //google.maps.event.trigger(autocomplete, 'place_changed');
                            $('#address').val(results[0].formatted_address);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
            
            }
        </script>  
<script>
$(document).ready(function () {
	//google.maps.event.addDomListener(window, 'load', initialize);
	$('.locate').click(function(){
		initialize();
	});
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