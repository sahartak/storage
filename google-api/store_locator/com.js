    
    function checkMouse()
    {
        if(mouse==1)
        {
            $('.infowindow').remove();
        }
    }

    function result(param)
    {
        selLocation=param;
        if(document.getElementById('shipping:company')!=null)
        {
            if(typeof selLocation.store_name!='undefined')
            {
                document.getElementById('shipping:company').value=selLocation.store_name;
            }
            if(typeof selLocation.address!='undefined')
            {
                document.getElementById('shipping:street1').value=selLocation.address;
            }
            if(typeof selLocation.postal_code!='undefined')
            {
                document.getElementById('shipping:postcode').value=selLocation.postal_code;
            }
            if(typeof selLocation.country!='undefined')
            {
                document.getElementById('shipping:country_id').value=selLocation.country;
                var event = new Event('change');
                document.getElementById('shipping:country_id').dispatchEvent(event);
            }
            if(typeof selLocation.region!='undefined')
            {
                document.getElementById('shipping:region_id').value=selLocation.region;
            }            
            if(typeof selLocation.city!='undefined')
            {
                document.getElementById('shipping:city').value=selLocation.city;
            }
        }
        else
        {
            document.location.reload();
        }
           
    }
    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('address')), {
            types: ['geocode']
        });
    }
    jQuery(document).on("mouseleave", ".infowindow", function(e) {
        $('.infowindow').remove();
    });
    jQuery(document).on("mouseenter", ".infowindow", function(e) {
        mouse=0;
    });

    jQuery(document).on("click", ".next", function(e) {
        "" != curLocation && curLocation.setMap(null), page += 1, pageno += 1, pageno >= pages ? (page = pages - 1, pageno = pages, jQuery(this).addClass("disabled")) : pageno > 1 && pageno < pages ? (jQuery(".previous").removeClass("disabled"), jQuery(this).removeClass("disabled")) : jQuery(this).removeAttr("disabled"), jQuery("#page-number").html(pageno);
        var r = page + 1;
        selMarker = markers.slice(page * inter, inter * r), $.each(markers, function(e, r) {
            r.setIcon("pin-2.png")
        }), jQuery(".infowindow").remove(), jQuery("#map-panel .list-group").html(""), getDataList(selMarker)
    }), jQuery(document).on("change", "#address", function(e) {
        e.preventDefault(), "" != curLocation && curLocation.setMap(null), jQuery("#location-info").hide(), jQuery(".selected-store .store-name").html(""), jQuery(".selected-store .store-address").html(""), jQuery(".selected-store .store-image").html(""), jQuery(".selected-store .store-description").html(""), address = jQuery("#address").val(), null === map && initializeMap(), jQuery("#page-number").html(page + 1), searchAddress(address), jQuery("#pagination").show()
    }), jQuery(document).on("click", "#store-form", function(e) {
        e.preventDefault(), "" != curLocation && curLocation.setMap(null), jQuery("#location-info").hide(), jQuery(".selected-store .store-name").html(""), jQuery(".selected-store .store-address").html(""), jQuery(".selected-store .store-image").html(""), jQuery(".selected-store .store-description").html(""), address = jQuery("#address").val(), null === map && initializeMap(), jQuery("#page-number").html(page + 1), searchAddress(address), jQuery("#pagination").show()
    }), jQuery(document).on("click", "#current-location", function(e) {
        e.preventDefault(), "" != curLocation && curLocation.setMap(null), jQuery("#location-info").hide(), navigator.geolocation && navigator.geolocation.getCurrentPosition(function(e) {
            var r = {
                lat: e.coords.latitude,
                lng: e.coords.longitude
            };
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(r.lat, r.lng),
                map: map,
                icon: "images/current.png",
                lat: r.lat,
                lng: r.lng
            }), curLocation = marker, map.setCenter(r), map.setZoom(13), searchStoresBounds(map.getBounds().toUrlValue()), pageno = 1, page = 0, jQuery(".previous").addClass("disabled"), jQuery("#page-number").html(pageno), jQuery("#pagination").show()
        }, function() {
            alert("Browser do not support!")
        })
    }), jQuery(document).on("click", ".select-default", function(e) {
        "" != curLocation && curLocation.setMap(null);
        var r = jQuery(this).attr("data-value"),
            a = jQuery.grep(markers, function(e) {
                return e.id == r
            });
        var parameter={
                store_id: r,
                store_name:a[0].store_name,
                postal_code: a[0].postalcode,
                region: a[0].region,
                city:a[0].city,
                address:a[0].staddress,
                default: 'default'
            };
        var url='save.php';
        jQuery.ajax({
            url:url,
            data:parameter,
            dataType: 'json',
                success: function(data) {

                }
        });
        
    }), jQuery(document).on("click", ".select-store", function(e) {
        "" != curLocation && curLocation.setMap(null);
        var r = jQuery(this).attr("data-value"),
            a = jQuery.grep(markers, function(e) {
                return e.id == r
            });
        var parameter={
                store_id: r,
                store_name:a[0].store_name,
                postal_code: a[0].postalcode,
                region: a[0].region,
                city:a[0].city,
                country:a[0].country,
                address:a[0].staddress
            };
        result(parameter);

        var url='save.php';
        jQuery.ajax({
            url:url,
            data:parameter,
            dataType: 'json',
                success: function(data) {
                    jQuery("#store-id").val(r), jQuery("#postal-code").val(a[0].postalcode), jQuery("#region").val(a[0].region), jQuery("#city").val(a[0].city), jQuery("#addresss").val(a[0].staddress), jQuery("#store-name").val(a[0].store_name), jQuery("#myModal").data("dismiss", !0)
                }
        });
        
    }), jQuery(document).on("click", "#reload", function(e) {
        jQuery("#location-info").hide(), "" != curLocation && curLocation.setMap(null), jQuery("#reload img").attr("src", "loading.gif"), jQuery("#reload img").css("opacity", "1"), jQuery(".selected-store .store-name").html(""), jQuery(".selected-store .store-address").html(""), jQuery(".selected-store .store-image").html(""), jQuery(".selected-store .store-description").html(""), searchStoresBounds(map.getBounds().toUrlValue()), pageno = 1, page = 0, jQuery(".previous").addClass("disabled"), jQuery("#page-number").html(pageno), jQuery("#reload img").attr("src", "loading.png"), jQuery("#reload img").css("opacity", "0.6"), jQuery("#pagination").show()
    }), jQuery(document).on("click", ".panel-item", function(e) {
        var r = jQuery(this).attr("store-id"),
            a = markersById[r];
        google.maps.event.trigger(a, "click"), jQuery(".panel-item").css("background-color", "transparent");
        var o = ".panel-item-" + r;
        jQuery(o).css("background-color", "#f5f5f5")
    }), jQuery(document).on("click", ".previous", function(e) {
        "" != curLocation && curLocation.setMap(null), page -= 1, pageno -= 1, pageno <= 1 ? (page = 0, pageno = 1, jQuery(this).addClass("disabled")) : pageno > 1 && pageno < pages ? (jQuery(".next").removeClass("disabled"), jQuery(this).removeClass("disabled")) : jQuery(this).removeClass("disabled"), jQuery("#page-number").html(pageno);
        var r = page + 1;
        selMarker = markers.slice(page * inter, inter * r), $.each(markers, function(e, r) {
            r.setIcon("pin-2.png")
        }), jQuery(".infowindow").remove(), jQuery("#map-panel .list-group").html(""), getDataList(selMarker)
    });

    function getDataList(selMarker) {
        $.each(selMarker, function(index, marker) {
            var item = '<a href="#" class="list-group-item panel-item panel-item-' + marker.id + '" store-id="' + marker.id + '"></a>';
            jQuery('#map-panel .list-group').append(item);
            var parameter = {
                id: marker.id
            };
            if (marker.address == '' || typeof marker.address == 'undefined') {
                jQuery.ajax({
                    url: 'getDesc.php',
                    data: parameter,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        marker.address = data['data']['address'];
                        marker.store_name = data['data']['store_name'];
                        marker.city=data['data']['city'];
                        marker.country=data['data']['country'];
                        marker.region=data['data']['region'];
                        marker.postalcode=data['data']['postalcode'];
                        marker.staddress=data['data']['staddress'];
                        var t = index + 1;
                        marker.setIcon('icons/open_' + t + '.png');
                        //marker.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png');
                        marker.operating_hours = data['data']['operation_hours'];
                        //var item = '<div class="panel-item panel-item-'+marker.id+'" store-id="' + marker.id + '"> <b>' +marker.address + '<\/b><br> ' +marker.distance + ' mi<\/div>';
                        item = '<h4 class="list-group-item-heading">' + t + ')' + marker.store_name + '</h4><p class="list-group-item-text"><table><tr><td style="width:175px;">' + marker.address + '<br>' + marker.distance + ' mi<br><button type="button"  data-dismiss="modal" class="select-store" data-value="' + marker.id + '">Ship to this address</button> </td><td style="padding: 0px;vertical-align: top;">' + marker.operating_hours + '</td></tr></table></p>';
                        jQuery('.panel-item-' + marker.id).html(item);
                    }
                });
            } else {
                var t = index + 1;
                marker.setIcon('icons/open_' + t + '.png');
                //marker.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png');
                //var item = '<div class="panel-item panel-item-'+marker.id+'" store-id="' + marker.id + '"> <b>' +marker.address + '<\/b><br> ' +marker.distance + ' mi<\/div>';
                item = '<h4 class="list-group-item-heading">' + t + ')' + marker.store_name + '</h4><p class="list-group-item-text"><table><tr><td style="width:175px;">' + marker.address + '<br>' + marker.distance + ' mi<br><button type="button"  data-dismiss="modal" class="select-store" data-value="' + marker.id + '">Ship to this address</button> </td><td style="padding: 0px;vertical-align: top;">' + marker.operating_hours + '</td></tr></table></p>';
                jQuery('.panel-item-' + marker.id).html(item);
            }

        });
        if(selMarker.length<=0)
        {
            var item ='<a href="#" class="list-group-item panel-item error"><h4 class="list-group-item-heading">No result found</h4><p class="list-group-item-text">Store not found in selected location</p></a>';
                    jQuery('#map-panel .list-group').html(item);
            jQuery('#pagination').hide();
        }
        AutoCenter();
        jQuery('#pagination').show();
    }




    function initializeMap(addresses) {
        map_id = document.getElementById('map-canvas');
        var mapOptions = {
            zoom: 1,
            center: {
                lat: 24.260547,
                lng: 11.714687
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        
        google.maps.event.addListener(map, 'dragend', function(map) {
            console.log('Drag End');
        });
        google.maps.event.addListener(map, 'dragstart', function(map) {
            jQuery('.loading-content img').css('opacity', '1');
        });
        geocoder = new google.maps.Geocoder();
        var searchAddr=[];
        if(addresses.street1!='' && typeof addresses.street1 !='undefined')
        {
            searchAddr.push(addresses.street1);
        }
        if(addresses.street2!='' && typeof addresses.street2 !='undefined')
        {
            searchAddr.push(addresses.street2);
        }
        if(addresses.citypostcode!='' && typeof addresses.citypostcode !='undefined')
        {
            searchAddr.push(addresses.citypostcode);
        }
        if(addresses.postcode!='' && typeof addresses.postcode !='undefined')
        {
            searchAddr.push(addresses.postcode);
        }
        if(addresses.region_id!='' && typeof addresses.region_id !='undefined')
        {
            searchAddr.push(addresses.region_id);
        }
        if(addresses.country!='' && typeof addresses.country !='undefined')
        {
            searchAddr.push(addresses.country);
        }
        console.log(searchAddr);
        jQuery('#address').val(searchAddr.join());
        var addrs = document.getElementById('address').value;
        if (addrs == '') {
            addrs = getParameterByName('address');
        }
        if (addrs != '') {
            geocoder.geocode({
                'address': addrs
            }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng);
                    map.setZoom(13);
                    pageno = 1;
                    page = 0;
                    jQuery('.previous').addClass('disabled');
                    jQuery('#page-number').html(pageno);
                    jQuery('.previous').attr('disabled', 'disabled');
                    searchStoresBounds(map.getBounds().toUrlValue());


                } else {
                    //alert('Geocode was failed: ' + status);
                }
            });
        }
    }

    function searchAddress(address) {
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                var latlng = results[0].geometry.location;


                map.setCenter(latlng);
                map.setZoom(13);
                console.log(address);
                console.log(map.getBounds().toUrlValue());
                searchStoresBounds(map.getBounds().toUrlValue());

            } else {
                //alert('Geocode was failed: ' + status);
            }
        });
    }

    function searchStoresBounds() {
        if (!map.getBounds())
            return;
        var bounds = map.getBounds().toUrlValue();

        var url = './locations-api2.php';
        var parameter = {
            bounds: bounds
        };
        $.each(markers, function(index, marker) {
            marker.setMap(null);
            //marker.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png');

        });
        selMarker = [];
        jQuery.ajax({
            url: url,
            data: parameter,
            dataType: 'json',
            success: showStores
        });
    }

    function showStores(data, status, xhr) {
        if (data['status'] != 'OK')
            return;
        var id;

        /*$.each(markers, function (index, marker) {
           marker.setMap(null);
        });
        markers = {};*/
        var totalCount = data['data'].length;
        var intPages = totalCount / inter;
        if (intPages == parseInt(intPages)) {
            pages = intPages;
        } else {
            pages = parseInt(intPages) + 1;
        }
        jQuery('.total-locations').html(pages);
        jQuery('#map-panel .list-group').html('');
        markers = [];
        markersById = [];
        for (i = 0; i < data['data'].length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(data['data'][i]['lat'], data['data'][i]['lng']),
                map: map,
                icon: 'pin-2.png',
                lat: data['data'][i]['lat'],
                lng: data['data'][i]['lng'],
                id: data['data'][i]['id'],
                distance: data['data'][i]['distance']/*,
                zIndex: google.maps.Marker.MAX_ZINDEX + 1*/
            });

            markers[i] = marker;
            markersById[data['data'][i]['id']] = marker;
            markerContent[data['data'][i]['id']] = data['data'][i]['address'];

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    if(!map.getBounds().contains(marker.getPosition()))
                    {
                        map.setCenter(marker.getPosition());
                    }
                    mouse=0;
                    //if ($('#map-canvas > div').length > 1) { $('#map-canvas >div:last-child').remove(); }
                    $('.infowindow').remove();
                    $.each(markers, function(index, marker) {
                        //marker.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png');
                        marker.setIcon('pin-2.png');
                        marker.setZIndex();
                    });
                    $.each(selMarker, function(index, marker) {
                        var t = index + 1;
                        marker.setIcon('icons/open_' + t + '.png');
                        marker.setZIndex();
                    });
                    jQuery('#location-info').show();
                    jQuery('.panel-item').css('background-color', 'transparent');
                    jQuery('.panel-item-' + marker.id).css('background-color', '#f5f5f5');
                    var li = jQuery('.panel-item-' + marker.id).offset();
                    if (typeof li != 'undefined') {
                        //jQuery('#map-panel').animate({scrollTop:jQuery('.panel-item-'+marker.id).offset().top-102},1000);
                        var container = jQuery('#map-panel')
                        var scrollTo = jQuery('.panel-item-' + marker.id);
                        container.animate({
                            scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
                        });


                    }

                    marker.setIcon('pin-1.png');
                    $.each(selMarker, function(i, m) {
                        if (m.id == marker.id) {
                            var t = i + 1;
                            marker.setIcon('icons/close_' + t + '.png');
                            marker.setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
                            //marker.setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
                        }
                    });
                    var parameter = {
                        id: marker.id
                    };

                    if (typeof marker.store_name == 'undefined' || typeof marker.store_pic == 'undefined') {
                        jQuery.ajax({
                            url: 'getDesc.php',
                            data: parameter,
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                marker.store_name = data['data']['store_name'];
                                marker.store_pic = data['data']['store_pic'];
                                marker.address = data['data']['address'];
                                marker.store_name = data['data']['store_name'];
                                marker.operating_hours = data['data']['operation_hours'];
                                marker.city=data['data']['city'];
                                marker.country=data['data']['country'];
                                marker.region=data['data']['region'];
                                marker.postalcode=data['data']['postalcode'];
                                marker.staddress=data['data']['staddress'];
                                jQuery('.selected-store .store-name').html('<input type="hidden" id="location-id" value="' + marker.id + '" data-value="' + marker.id + '">' + marker.store_name);
                                jQuery('.selected-store .store-address').html(marker.address);
                                jQuery('.selected-store .store-image').html('<img class="img-thumbnail" src="' + marker.store_pic + '">');
                                jQuery('.selected-store .store-description').html('<button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button><br><strong>Operating Hours</strong><br>' + marker.operating_hours);
                                var content = marker.address + '<button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button><br>';
                                /*jQuery('.selected-store>p').html('<h5>'+marker.store_name+'</h5><p><img  style="width:150px;height:100px;" src="'+marker.store_pic+'"><label>Operating Hours</label><span>'+marker.operating_hours+'</span></p>');*/
                                var b = 0;
                                var height = 0;
                                var width = 0;
                                $.each(selMarker, function(i, m) {
                                    if (m.id == marker.id) {
                                        b = 1;
                                    }
                                });
                                if (b == 1) {
                                    height = 31;
                                    width = 24;

                                } else {
                                    height = 9;
                                    width = 9;
                                }


                                var infobox = new SmartInfoWindow({
                                    position: marker.getPosition(),
                                    map: map,
                                    content: content,
                                    height: height,
                                    width: width
                                });
                                //infowindow.setContent();
                            }
                        });
                    } else {
                        jQuery('.selected-store .store-name').html('<input type="hidden" id="location-id" value="' + marker.id + '" data-value="' + marker.id + '">' + marker.store_name);
                        jQuery('.selected-store .store-address').html(marker.address);
                        jQuery('.selected-store .store-image').html('<img class="img-thumbnail" src="' + marker.store_pic + '">');
                        jQuery('.selected-store .store-description').html('<button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button><br><strong>Operating Hours</strong><br>' + marker.operating_hours);
                        var content = marker.address + '<br><button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button>';
                        /*jQuery('.selected-store>p').html('<h5>'+marker.store_name+'</h5><p><img  style="width:150px;height:100px;" src="'+marker.store_pic+'"><label>Operating Hours</label><span>'+marker.operating_hours+'</span></p>');*/
                        var b = 0;
                        var height = 0;
                        var width = 0;
                        $.each(selMarker, function(i, m) {
                            if (m.id == marker.id) {
                                b = 1;
                            }
                        });
                        if (b == 1) {
                            height = 31;
                            width = 24;

                        } else {
                            height = 9;
                            width = 9;
                        }


                        var infobox = new SmartInfoWindow({
                            position: marker.getPosition(),
                            map: map,
                            content: content,
                            height: height,
                            width: width
                        });
                        //infowindow.setContent(marker.address+'<br><button type="button" data-dismiss="modal"  class="select-store" data-value="'+marker.id+'">Ship to this address</button>');
                    }
                    //console.log(map.getBounds());
                    //console.log(infowindow);
                    //infowindow.open(map, marker);
                }
            })(marker, i));
            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                    $('.infowindow').remove();
                    mouse=0;
                    $.each(markers, function(index, marker) {
                        marker.setIcon('pin-2.png');
                        marker.setZIndex();
                    });
                    $.each(selMarker, function(index, marker) {
                        var t = index + 1;
                        marker.setIcon('icons/open_' + t + '.png');
                        marker.setZIndex();
                    });
                    jQuery('#location-info').show();

                    marker.setIcon('pin-1.png');
                    $.each(selMarker, function(i, m) {
                        if (m.id == marker.id) {
                            var t = i + 1;
                            marker.setIcon('icons/close_' + t + '.png');
                            marker.setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
                        }
                    });
                    var parameter = {
                        id: marker.id
                    };

                    if (typeof marker.store_name == 'undefined' || typeof marker.store_pic == 'undefined') {
                        jQuery.ajax({
                            url: 'getDesc.php',
                            data: parameter,
                            dataType: 'json',
                            success: function(data) {
                                console.log(data);
                                marker.store_name = data['data']['store_name'];
                                marker.store_pic = data['data']['store_pic'];
                                marker.address = data['data']['address'];
                                marker.store_name = data['data']['store_name'];
                                marker.operating_hours = data['data']['operation_hours'];
                                marker.city=data['data']['city'];
                                marker.country=data['data']['country'];
                                marker.region=data['data']['region'];
                                marker.postalcode=data['data']['postalcode'];
                                marker.staddress=data['data']['staddress'];
                                jQuery('.selected-store .store-name').html('<input type="hidden" id="location-id" value="' + marker.id + '" data-value="' + marker.id + '">' + marker.store_name);
                                jQuery('.selected-store .store-address').html(marker.address);
                                jQuery('.selected-store .store-image').html('<img class="img-thumbnail" src="' + marker.store_pic + '">');
                                jQuery('.selected-store .store-description').html('<button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button><br><strong>Operating Hours</strong><br>' + marker.operating_hours);
                                var content = marker.address + '<br><button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button>';
                                /*jQuery('.selected-store>p').html('<h5>'+marker.store_name+'</h5><p><img  style="width:150px;height:100px;" src="'+marker.store_pic+'"><label>Operating Hours</label><span>'+marker.operating_hours+'</span></p>');*/
                                var b = 0;
                                var height = 0;
                                var width = 0;
                                $.each(selMarker, function(i, m) {
                                    if (m.id == marker.id) {
                                        b = 1;
                                    }
                                });
                                if (b == 1) {
                                    height = 31;
                                    width = 24;

                                } else {
                                    height = 9;
                                    width = 9;
                                }


                                var infobox = new SmartInfoWindow({
                                    position: marker.getPosition(),
                                    map: map,
                                    content: content,
                                    height: height,
                                    width: width
                                });
                                //infowindow.setContent();
                            }
                        });
                    } else {
                        jQuery('.selected-store .store-name').html('<input type="hidden" id="location-id" value="' + marker.id + '" data-value="' + marker.id + '">' + marker.store_name);
                        jQuery('.selected-store .store-address').html(marker.address);
                        jQuery('.selected-store .store-image').html('<img class="img-thumbnail" src="' + marker.store_pic + '">');
                        jQuery('.selected-store .store-description').html('<button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button><br><strong>Operating Hours</strong><br>' + marker.operating_hours);
                        var content = marker.address + '<br><button type="button" data-dismiss="modal"  class="select-store" data-value="' + marker.id + '">Ship to this address</button>';
                        /*jQuery('.selected-store>p').html('<h5>'+marker.store_name+'</h5><p><img  style="width:150px;height:100px;" src="'+marker.store_pic+'"><label>Operating Hours</label><span>'+marker.operating_hours+'</span></p>');*/
                        var b = 0;
                        var height = 0;
                        var width = 0;
                        $.each(selMarker, function(i, m) {
                            if (m.id == marker.id) {
                                b = 1;
                            }
                        });
                        if (b == 1) {
                            height = 31;
                            width = 24;

                        } else {
                            height = 9;
                            width = 9;
                        }


                        var infobox = new SmartInfoWindow({
                            position: marker.getPosition(),
                            map: map,
                            content: content,
                            height: height,
                            width: width
                        });
                    }
                }
            })(marker, i));
            google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                return function() {
                    mouse=1;
                    setInterval(checkMouse,2000);
                    $.each(selMarker, function(index, marker) {
                    });
                }
            })(marker, i));
        }
        var t = page + 1;
        selMarker = markers.slice(page * inter, inter * t);

        getDataList(selMarker);
    }

    function AutoCenter() {
        if (selMarker.length > 0) {
            var bounds = new google.maps.LatLngBounds();
            $.each(selMarker, function(index, marker) {
                bounds.extend(marker.position);
            });
            map.fitBounds(bounds);
        }

    }