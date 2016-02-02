    var map;
            var marker=null;
            var mapOptions;
            var hasMarker=0;
            var last_position ;
            var new_position;
            var geocoder;
            if(typeof json_record.lat!='undefined')
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
                //last_position=myLatlng;
                new_position=myLatlng;
                mapOptions = {
                    zoom: 1,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
            }
            
            var infowindow = new google.maps.InfoWindow();
            var placeSearch, autocomplete,locationResult;
  var addressList={
        street1: '', 
        street2: '', 
        city:'',
        state:'',
        country: '',
        postalcode: '',
        latitude:'',
        longitude:'',
        formatted_short_address:'',
        formatted_long_address:''
  };
        var ab=0;
            $('.list-group-item').click(function(e){
                if(ab!=0)
                {
                    return;
                }
                $(this).children("input").toggle();                
                id=$(this).attr('id');
                realId='#'+id;
                var title=$("#"+id+" h5").text();
                //$('.modal-title').html(title);
                var url='';
                var store_id='';
                if(typeof json_record.id!='undefined')
                {
                    store_id='?id='+json_record.id;
                }
                if(id=='business-name')
                {
                    url= "business_name.php"+store_id;
                }
                else if(id=='business-address')
                {
                    url= "address.php"+store_id;
                }
                else if(id=='business-contact')
                {
                    url= "contact.php"+store_id;
                }
                else if(id=='business-hours')
                {
                    url= "hours.php"+store_id;
                }
                else if(id=='business-description')
                {
                    url= "description.php"+store_id;
                }
                var t=realId+' .data-body p';
                if(t=='#business-address .data-body p')
                {
                    $('#business-address .data-body .address, #business-address .data-body .address-map').hide();
                }
                $(t).hide();
                $(realId).find('.edit-content').load(url);
                ab=1;
                /*$('.modal').load(url,function(result){
                $('#Popup').modal({show:true});
                });*/
            });
function clearAddressList()
{
  addressList={
        street1: '', 
        street2: '', 
        city:'',
        state:'',
        country: '',
        postalcode: '',
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

                    marker.setPosition(last_position); 
                    map.setCenter(last_position);
                    map.setZoom(13);
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
$(document).ready(function () {
    //google.maps.event.addDomListener(window, 'load', initialize);
    $(document).on('click','.locate',function(){
        var formatted_address=$('#formatted_address').val();
        
        /*if(formatted_address!='')
        {
            initialize();
            setMarker(formatted_address);
        }
        else
        {
            initialize();
        }*/
        
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
        var t;
        var id;
        var realId;
        $(document).ready(function(){
            $('span').click(function(){
                id=$(this).parent().parent().attr('id');
                realId='#'+id;
                var title=$("#"+id+" h5").text();
                //$('.modal-title').html(title);
                var url='';
                var store_id='';
                if(typeof json_record.id!='undefined')
                {
                    store_id='?id='+json_record.id;
                }
                if(id=='business-name')
                {
                    url= "business_name.php"+store_id;
                }
                else if(id=='business-address')
                {
                    url= "address.php"+store_id;
                }
                else if(id=='business-contact')
                {
                    url= "contact.php"+store_id;
                }
                else if(id=='business-hours')
                {
                    url= "hours.php"+store_id;
                }
                else if(id=='business-description')
                {
                    url= "description.php"+store_id;
                }
                var t=realId+' .data-body p';
                $(t).hide();
                $(realId).find('.edit-content').load(url);
                /*$('.modal').load(url,function(result){
                $('#Popup').modal({show:true});
                });*/
            });
            /*$('.list-group-item *').click(function(e){ e.stopPropagation(); });
            $('.list-group-item').click(function(e){
                $(this).children("input").toggle();
                
                id=$(this).attr('id');
                realId='#'+id;
                var title=$("#"+id+" h5").text();
                //$('.modal-title').html(title);
                var url='';
                var store_id='';
                if(typeof json_record.id!='undefined')
                {
                    store_id='?id='+json_record.id;
                }
                if(id=='business-name')
                {
                    url= "business_name.php"+store_id;
                }
                else if(id=='business-address')
                {
                    url= "address.php"+store_id;
                }
                else if(id=='business-contact')
                {
                    url= "contact.php"+store_id;
                }
                else if(id=='business-hours')
                {
                    url= "hours.php"+store_id;
                }
                else if(id=='business-description')
                {
                    url= "description.php"+store_id;
                }
                var t=realId+' .data-body p';
                $(t).hide();
                $(realId).find('.edit-content').load(url);
                /*$('.modal').load(url,function(result){
                $('#Popup').modal({show:true});
                });
            });*/
            $('#Popup').on('shown.bs.modal', function (e) {
                /*var modal = $(this);
                t=modal;
                modal.find('.modal-title').text('New message to ' + 123);
                modal.find('.modal-body #store_name').val('123');*/
            });
            $('#Popup').on('hidden.bs.modal', function () {
                console.log(json_record);
            })
        });
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
    jQuery('#store-locator').click(function(e){
        e.preventDefault();
    });
    jQuery('#myModal').on('hidden.bs.modal', function () {
        
    })
    jQuery('#myModal').on('shown.bs.modal', function () {
        
        initializeMap();

    })

    // Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$("#sort1 tbody").sortable({
    helper: fixHelper,
    start: function(event, ui){        
        /*ui.item.addClass('drag-started');*/
        /*ui.item.find('a').css('color','#fff');*/
        $('.update-order').removeAttr('disabled').removeClass('btn-default').removeAttr('style').css('margin-bottom','5px').addClass('btn-primary');        
    },
    stop: function( event, ui ){
        $(this).find('tr').each(function(i){
            $(this).find('td:first .row-no').text(i+1);
        });
        $('.update-order').removeAttr('disabled');
        $('.update-order').trigger('click');
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
$('.update-order').click(function(){
    var store_list=[];
    var user_id=$('#user_id').val();
    store_list.push({user_id:user_id});
    $('.store-list tbody tr').each(function(i,v){        
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
});
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
            $('.store-list tbody').prepend(html);
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
    $('.store-list tbody').find('tr').each(function(i,v){
        $(this).find('td:first .row-no').text(i+1);
    });    
    $('.update-order').removeAttr('disabled').removeClass('btn-default').removeAttr('style').css('margin-bottom','5px').addClass('btn-primary');        
    $('.update-order').trigger('click');
}
$('.arrow-down1').click(function() {
    var item=$(this).parent().parent(); 
    t=item;
    moveDown(item);
    setInterval(rearrange,500);
});