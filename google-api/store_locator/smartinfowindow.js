/* An SmartInfoWindow is like an info window, but it displays
 * under the marker, opens quicker, and has flexible styling.
 * @param {Object} opts Passes configuration options.
 */
var ltr;
var pixPosition;
var centerPosition;
var pixPositionReal;
var centerPositionReal;
var centerContainerPosition;
function SmartInfoWindow(opts) {
  google.maps.OverlayView.call(this);
  this.latlng_ = opts.position;
  ltr=this.latlng_;
  this.content_ = opts.content;
  this.map_ = opts.map;
  this.height_ = 85;
  this.width_ = 270;
  this.iconHeight=opts.height;
  this.iconWidth=opts.width;
  this.size_ = new google.maps.Size(this.height_, this.width_);
  this.offsetVertical_ = -this.height_;
  this.offsetHorizontal_ = 0;
  this.panned_ = false;
  this.setMap(this.map_);
  // We need to listen to bounds_changed event so that we can redraw
  // absolute position every time the map moves.
  // This is only needed because we append to body instead of map panes.
  var me = this;
  google.maps.event.addListener(this.map_, 'bounds_changed', function() {
    me.draw();
  });
}

/**
 * SmartInfoWindow extends GOverlay class from the Google Maps API
 */
SmartInfoWindow.prototype = new google.maps.OverlayView();

/**
 * Creates the DIV representing this SmartInfoWindow
 */
SmartInfoWindow.prototype.onRemove = function() {
  if (this.div_) {
    this.div_.parentNode.removeChild(this.div_);
    this.div_ = null;
  }
};

/**
 * Called when the overlay is first added to the map.
 */
SmartInfoWindow.prototype.onAdd = function() {
  // Creates the element if it doesn't exist already.
  this.createElement();
};

/**
 * Redraw based on the current projection and zoom level.
 */
SmartInfoWindow.prototype.draw = function() {
  // Since we use bounds changed listener, projection is sometimes null
  if (!this.getProjection()) {
    return;
  }

  // This gives us the position in the tiles div.
  pixPosition = this.getProjection().fromLatLngToDivPixel(this.latlng_);
  pixPositionReal=this.getProjection().fromLatLngToContainerPixel(this.latlng_);
  centerPosition = this.getProjection().fromLatLngToDivPixel(this.map_.getCenter());
  centerContainerPosition=this.getProjection().fromLatLngToContainerPixel(this.map_.getCenter());
  centerPositionReal = new google.maps.Point(this.map_.getDiv().offsetWidth/2, this.map_.getDiv().offsetHeight/2);
  
  //console.log(l+":"+m);
  //console.log(centerDivReal);
  // Figure out difference between map div and tiles div, so that we can
  // calculate position in map div
  var centerOffsetX = -centerPosition.x + centerPositionReal.x;
  var centerOffsetY = -centerPosition.y + centerPositionReal.y;

  if (!pixPosition) return;
  var alignmentAll = this.getBestAlignment();
  var alignment=alignmentAll[4].best;
  //console.log(alignment);
  var paddingTop = 0;
  var paddingLeft = 0;
  var widthLess = 0;
  switch (alignment) {
    case SmartInfoWindow.Align.ABOVE:
      this.minWidth_ = 200;
      this.height_ = 100;
      this.maxWidth=300;
      image = 'infobox_above.gif';
      this.offsetX_ = -(this.width_ / 2 - 17);
      this.offsetY_ = -140;
      break;
    case SmartInfoWindow.Align.BELOW:
      this.minWidth_ = 200;
      this.height_ = 100;
      this.maxWidth=300;
      image = 'infobox_below.gif';
      this.offsetX_ = -(this.width_ / 2 - 17);
      this.offsetY_ = 0;
      paddingTop = 0;
      break;
    case SmartInfoWindow.Align.LEFT:
      this.minWidth_ = 200;
      this.height_ = 100;
      this.maxWidth=300;
      image = 'infobox_left.gif';
      this.offsetX_ = -(this.width_)-20;
      this.offsetY_ = -(this.height_ / 2 + 22);
      widthLess = 0;
      break;
    case SmartInfoWindow.Align.RIGHT:
      image = 'infobox_right.gif';
      this.minWidth_ = 200;
      this.height_ = 100;
      this.maxWidth=300;
      this.offsetX_ = 6;
      this.offsetY_ = -(this.height_ / 2 + 22);
      paddingLeft = 0;
      widthLess = 0;
      break;
   }
  /*if(pixPositionReal.x<centerContainerPosition.x)
  {
    this.offsetX_=pixPositionReal.x+10;
  }
  else
  {
    this.offsetX_=pixPositionReal.x-this.width_;
  }
  if(pixPositionReal.y<centerContainerPosition.y)
  {
    this.offsetY_=pixPositionReal.y+10;
  }
  else
  {
    this.offsetY_=pixPositionReal.y-this.height_;
  }*/
  // Now position our DIV based on the DIV coordinates of our bounds
  this.div_.style.width = this.width_ + 'px';
  var x=0;
  var y=0;
  var z=5;
  var w=0;
  jQuery('.arrow-up').remove();
  jQuery('.arrow-down').remove();
  if(pixPositionReal.x<centerContainerPosition.x)
  {
    if(pixPositionReal.x<centerContainerPosition.x/2)
    {
      x = (pixPositionReal.x -16-this.iconWidth);
      z =16;
      w=8;
    }
    else
    {
      x = (pixPositionReal.x/2 -10-this.iconWidth);
      z +=pixPositionReal.x-x-27;
    }
    
  }
  else
  {
    x = (pixPositionReal.x -this.width_)+16;
    z =this.width_-37;
  }
  if(pixPositionReal.y<centerContainerPosition.y)
  {
    //this.offsetY_=pixPositionReal.y+10;
    x +=12-w;
    y = (pixPositionReal.y);//+5
    this.div_.style.paddingTop = '8px';
    this.div_.style.paddingBottom = '0px';
    var t=document.createElement('div');
    t.className='arrow-up';
    t.style.left=z+'px';
    //t.style.left=(pixPositionReal.x -this.width_/2)+'px';
    this.div_.appendChild(t);
  }
  else
  {
    //this.offsetY_=pixPositionReal.y-this.height_;
    x +=12;
    y = (pixPositionReal.y-this.height_-this.iconHeight-10);//-5
    this.div_.style.paddingBottom = '10px';
    this.div_.style.paddingTop = '0px';
    var t=document.createElement('div');    
    t.className='arrow-down';
    t.style.left=z+'px';
    //t.style.left=(pixPositionReal.x -this.width_/2)+'px';
    this.div_.appendChild(t);
  }

  this.div_.style.left = x + 'px';
  this.div_.style.top = y + 'px';
  
  this.div_.style.height = this.height_ + 'px';
  //this.div_.style.paddingTop = paddingTop + 'px';
  //this.div_.style.paddingLeft = paddingLeft + 'px';
  //this.div_.style.background = '#fff';
  this.div_.style.display = 'block';
  this.div_.className = 'infowindow';
  //this.div_.style.background='#fff';
  this.wrapperDiv_.style.width = (this.width_- widthLess) + 'px';
  this.wrapperDiv_.style.height = this.height_ + 'px';
  this.wrapperDiv_.style.marginTop = paddingTop + 'px';
  this.wrapperDiv_.style.marginLeft = paddingLeft + 'px';
  this.wrapperDiv_.style.overflow = 'hidden';

  if (!this.panned_) {
    //this.panned_ = true;
    //this.maybePanMap();
  }
};

/**
 * Creates the DIV representing this SmartInfoWindow in the floatPane.  If the panes
 * object, retrieved by calling getPanes, is null, remove the element from the
 * DOM.  If the div exists, but its parent is not the floatPane, move the div
 * to the new pane.
 * Called from within draw.  Alternatively, this can be called specifically on
 * a panes_changed event.
 */
SmartInfoWindow.prototype.createElement = function() {
  var panes = this.getPanes();
  var div = this.div_;
  if (!div) {
    // This does not handle changing panes.  You can set the map to be null and
    // then reset the map to move the div.
    div = this.div_ = document.createElement('div');
    //div.style.border = 'thin solid #c5c5c5';
    div.style.position = 'absolute';
    div.style.overflow = 'hidden';
    var wrapperDiv = this.wrapperDiv_ = document.createElement('div');
    var contentDiv = document.createElement('div');
    wrapperDiv.className='infowindow-content';
    contentDiv.style.background='#fff';
    contentDiv.style.height='100%';
    contentDiv.style.textAlign='left';
    /*contentDiv.style.marginTop='5px';
    contentDiv.style.marginBottom='5px';*/
    contentDiv.style.padding='10px';
    contentDiv.style.border = 'thin solid #c5c5c5';
    contentDiv.style.borderRadius='5px';
    if (typeof this.content_ == 'string') {
      contentDiv.innerHTML = this.content_;
    } else {
      contentDiv.appendChild(this.content_);
    }

    var topDiv = document.createElement('div');
    topDiv.style.textAlign = 'right';
    var closeImg = document.createElement('img');
    closeImg.src = 'images/closebigger.gif';
    closeImg.style.width = '32px';
    closeImg.style.height = '32px';
    closeImg.style.float='right';
    closeImg.style.cursor = 'pointer';
    topDiv.appendChild(closeImg);

    function removeSmartInfoWindow(ib) {
      return function() {
        ib.setMap(null);
      };
    }

    google.maps.event.addDomListener(closeImg, 'click', removeSmartInfoWindow(this));

    wrapperDiv.appendChild(topDiv);
    wrapperDiv.appendChild(contentDiv);
    div.appendChild(wrapperDiv);
    div.style.display = 'none';
    // Append to body, to avoid bug with Webkit browsers
    // attempting CSS transforms on IFRAME or SWF objects
    // and rendering badly.
    //document.body.appendChild(div);
    var mapDiv = map_id;
    mapDiv.appendChild(div);
  } else if (div.parentNode != panes.floatPane) {
    // The panes have changed.  Move the div.
    div.parentNode.removeChild(div);
    panes.floatPane.appendChild(div);
  } else {
    // The panes have not changed, so no need to create or move the div.
  }
};

SmartInfoWindow.mouseFilter = function(e) {
  e.returnValue = 'true';
  e['handled'] = true;
}

/**
 * Closes infowindow
 */
SmartInfoWindow.prototype.close = function() {
  this.setMap(null);
};

/**
 * Pan the map to fit the SmartInfoWindow,
 * if its top or bottom corners aren't visible.
 */
SmartInfoWindow.prototype.maybePanMap = function() {
  // if we go beyond map, pan map
  var map = this.map_;
  var projection = this.getProjection();
  var bounds = map.getBounds();
  if (!bounds) return;
  /*var scale = Math.pow(2,map.getZoom());
  var proj = map.getProjection();
  var wc = proj.fromLatLngToPoint(this.latlng_);
  var bounds = new google.maps.LatLngBounds();
  var sw = new google.maps.Point(((wc.x * scale) - 50)/ scale, ((wc.y * scale) - 50)/ scale);
  bounds.extend(proj.fromPointToLatLng(sw));
  var ne = new google.maps.Point(((wc.x * scale) + 50)/ scale, ((wc.y * scale) + 50)/ scale);
  bounds.extend(proj.fromPointToLatLng(ne));
  var opts = {
      bounds: bounds,
      map: map,
      editable:true
  }
  var rect = new google.maps.Rectangle(opts);
  console.log(rect);*/
  // The dimension of the infowindow
  /*var scale = Math.pow(2,map.getZoom());
  var bl = new google.maps.Point((anchorPixel.x*scale-50)/scale + iwOffsetX + 20,(anchorPixel.y*scale-50)/scale + iwOffsetY + iwHeight);
  var tr = new google.maps.Point((anchorPixel.x*scale+50)/scale + iwOffsetX + iwWidth,(anchorPixel.x*scale-50)/scale + iwOffsetY);*/
  var iwWidth = this.width_;
  var iwHeight = this.height_;
  // The offset position of the infowindow
  var iwOffsetX = this.offsetX_;
  var iwOffsetY = this.offsetY_;
  var anchorPixel = projection.fromLatLngToDivPixel(this.latlng_);
  var bl = new google.maps.Point(anchorPixel.x + iwOffsetX + 20,anchorPixel.y + iwOffsetY + iwHeight);
  var tr = new google.maps.Point(anchorPixel.x + iwOffsetX + iwWidth,anchorPixel.y + iwOffsetY);
  var sw = projection.fromDivPixelToLatLng(bl);
  var ne = projection.fromDivPixelToLatLng(tr);

  // The bounds of the infowindow
  if (!map.getBounds().contains(ne) || !map.getBounds().contains(sw)) {
    map.panToBounds(new google.maps.LatLngBounds(sw, ne));
  }
};

/**
 * @enum {number}
 */
SmartInfoWindow.Align = {
  ABOVE: 0,
  LEFT: 1,
  RIGHT: 2,
  BELOW: 3,
  /*TOPLEFT:4,
  TOPRIGHT:5,
  BOTTOMLEFT:6,
  BOTTOMRIGHT:7*/
};

/**
 * Finds best alignment for infowindow.
 * @return {number} Alignment.
 */
SmartInfoWindow.prototype.getBestAlignment = function() {
  var bestAlignment = SmartInfoWindow.Align.LEFT;
  var minPan = 0;
  var sortedPan=[];
  for (var alignment in SmartInfoWindow.Align) {
    var alignment = SmartInfoWindow.Align[alignment];
    var panValue = this.getPanValue(alignment);
    switch(alignment)
    {
      case 0:
      sortedPan.push({key:'above',value:panValue});
      break;
      case 1:
      sortedPan.push({key:'left',value:panValue});
      break;
      case 2:
      sortedPan.push({key:'right',value:panValue});
      break;
      case 3:
      sortedPan.push({key:'bottom',value:panValue});
      break;
    }
    if (panValue > minPan) {
      minPan = panValue;
      bestAlignment = alignment;
    }
  }
  var sorted = sortedPan.sort(function(a, b) {
    return b.value - a.value;
  });
  //console.log(sorted);
  sorted.push({best:bestAlignment});
  return sorted;
};

/**
 * Calculates distance of corner for each alignment.
 * @param {number} alignment An alignment constant.
 * @return {number} Distance for that alignment.
 */
SmartInfoWindow.prototype.getPanValue = function(alignment) {
  var mapSize = new google.maps.Size(this.map_.getDiv().offsetWidth,this.map_.getDiv().offsetHeight);
  var bounds = this.map_.getBounds();
  var sideLatLng;
  switch (alignment) {
    case SmartInfoWindow.Align.ABOVE:
      sideLatLng = new google.maps.LatLng(bounds.getNorthEast().lat(),
          this.latlng_.lng());
      break;
    case SmartInfoWindow.Align.BELOW:
      sideLatLng = new google.maps.LatLng(bounds.getSouthWest().lat(),
          this.latlng_.lng());
      break;
    case SmartInfoWindow.Align.RIGHT:
      sideLatLng = new google.maps.LatLng(this.latlng_.lat(),
          bounds.getNorthEast().lng());
      break;
    case SmartInfoWindow.Align.LEFT:
      sideLatLng = new google.maps.LatLng(this.latlng_.lat(),
          bounds.getSouthWest().lng());
      break;
  }
  var dist = SmartInfoWindow.distHaversine(this.latlng_.lat(), this.latlng_.lng(),
      sideLatLng.lat(), sideLatLng.lng());
  return dist;
};


/**
 * Converts degrees to radians.
 * @param {number} num Angle in degrees.
 * @return {number} Angle in radians.
 */
SmartInfoWindow.toRad = function(num) {
    return num * Math.PI / 180;
}

/**
 * Calculates distance between two coordinates.
 * @param {number} lat1 Latitude of first coord.
 * @param {number} lon1 Longitude of second coord.
 * @param {number} lat2 Latitude of second coord.
 * @param {number} lon2 Longitude of second coord.
 * @return {number} The distance.
 */
SmartInfoWindow.distHaversine = function(lat1, lon1, lat2, lon2) {
  var R = 6371; // earth's mean radius in km
  var dLat = SmartInfoWindow.toRad(lat2 - lat1);
  var dLon = SmartInfoWindow.toRad(lon2 - lon1);
  lat1 = SmartInfoWindow.toRad(lat1), lat2 = SmartInfoWindow.toRad(lat2);

  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
          Math.cos(lat1) * Math.cos(lat2) *
          Math.sin(dLon / 2) * Math.sin(dLon / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
  return d;
}
