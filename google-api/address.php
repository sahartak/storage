<?php require 'getData.php'; ?>
<?php if(isset($records['id']) && $records['id']!=''): ?>
<script>
    hasMarker=1;
</script>
<?php endif; ?>
<form action="#" method="post" id="form">
    <div class="modal-body">
            <div class="col-md-8" style="max-width:400px;padding-bottom: 40px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Street Address 1</label>
                        <input type="hidden" value="<?php echo isset($records['id'])?$records['id']:''; ?>" name="id" id="id" data-name="id" />
                        <input  maxlength="100" type="text" required="required" value="<?php echo isset($records['street1'])?$records['street1']:''; ?>" class="form-control" name="street1" id="street1" placeholder="Enter Street Address 1"  />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input  maxlength="100" type="text" class="form-control" id="street2" name="street2" value="<?php echo isset($records['street2'])?$records['street2']:''; ?>" placeholder="Enter Street Address 2"  />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">City</label>
                        <input  maxlength="100" type="text" required="required" class="form-control" name="city" value="<?php echo isset($records['city'])?$records['city']:''; ?>" id="city" placeholder="City"  />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">region</label>
                        <input  maxlength="100" type="text" required="required" class="form-control" name="region" value="<?php echo isset($records['region'])?$records['region']:''; ?>" id="region" placeholder="region"  />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Postal Code</label>
                        <input  maxlength="100" type="text" required="required" class="form-control" name="postalcode" id="postalcode" value="<?php echo isset($records['postalcode'])?$records['postalcode']:''; ?>" placeholder="Postal Code"  />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Country</label>
                        <input  maxlength="100" type="text" required="required" class="form-control" name="country" id="country" value="<?php echo isset($records['country'])?$records['country']:''; ?>" placeholder="Country"  />
                        <input type="hidden" name="lat" id="lat" value="<?php echo isset($records['lat'])?$records['lat']:''; ?>"  />
                        <input type="hidden" name="lng" id="lng" value="<?php echo isset($records['lng'])?$records['lng']:''; ?>"  />
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary locate" type="button" >Locate on Map</button>
                    <button type="submit" class="btn btn-primary">Save</button> 
                    <button type="button" class="btn btn-default closed" data-dismiss="modal">Close</button>
                </div>
            </div>
            <div class="col-md-4">    
                <div id="map-canvas"></div>
                
            </div>  
    </div>
    </form>


<script>

initialize();
$(document).on('click','.locate',function(){
    getInfo();
});
function getInfo()
{
    addressList={
        street1: $('#street1').val(), 
        street2: $('#street2').val(), 
        city:$('#city').val(),
        region:$('#region').val(),
        country: $('#country').val(),
        postalcode: $('#postalcode').val(),
        latitude:'',
        longitude:'',
        formatted_short_address:'',
        formatted_long_address:''
    };
    moveMap(addressList);
}
$(document).on('click','.closed',function(){
    $('#business-address .data-body p').show();
    $('#business-address .data-body .edit-content').html('');
    $('#business-address .data-body .address, #business-address .data-body .address-map').show();
    ab=0;
});
$(document).on('click','.relocate',function(){
    var geolocation = last_position;
    //console.log(geolocation);
    if(geolocation.lat()=='' || isNaN(geolocation.lat()))
    {
        geolocation.lat=myLatlng.lat();
        geolocation.lng=myLatlng.lng();
    }
    //var geolocation = new google.maps.LatLng(parseFloat($('#lat').val()),parseFloat($('#lng').val()));
    
    /*marker = new google.maps.Marker({
        map: map,
        position: geolocation,
        draggable: true 
    });*/
    marker.setOptions({
        map: map,
        position: geolocation,
        draggable: true 
    });
    map.setCenter(geolocation);
    map.setZoom(13);
    map.setOptions({draggable:true});
    google.maps.event.addListener(marker, 'dragend', function() {

        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    $('#autocomplete').val(results[0].formatted_address);
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng);
                    new_position=marker.getPosition();
                    $('#address').val(results[0].formatted_address);
                    $('#lat').val(marker.getPosition().lat());
                    $('#lng').val(marker.getPosition().lng());
                    //infowindow.setContent(results[0].formatted_address);
                    //infowindow.open(map, marker);
                }
            }
        });
    });
});
$(document).ready(function(){
    if(hasMarker==1)
    {
        $('.relocate').trigger('click');
    }        
});

$('#form').on('submit',function(e){
            e.preventDefault();
            var param={
                id:$('#id').val(),
                street1:$('#street1').val(),
                street2:$('#street2').val(),
                city:$('#city').val(),
                region:$('#region').val(),
                country:$('#country').val(),
                postalcode:$('#postalcode').val(),
                lat:$('#lat').val(),
                lng:$('#lng').val()
            };
            var url='save-address.php';
            $.ajax({
                url:url,
                dataType:'json',
                data:param,
                type:'post',
                success:function(data){
                    json_record=data;
                    var url=location.protocol + '//' + location.host + location.pathname;
                    url=url+"?id="+json_record.id;
                    last_position= new google.maps.LatLng(json_record.lat,json_record.lng);
                    window.history.pushState('','',url);
                    $('#business-address .data-body p').show();
                    $('#business-address .data-body .edit-content').html('');
                    $('#business-address .data-body .address').html(json_record.formatted_address).show();
                    $('#business-address .data-body .address-map').css({'display':'block','background':'url(https://maps.googleapis.com/maps/api/staticmap?zoom=13&size=645x230&maptype=roadmap&markers=color:red%7C%7C'+json_record.lat+','+json_record.lng+')'});
                    $('.closed').trigger('click');
                    ab=0;
                }
            });
        ab=0;
        });
</script>