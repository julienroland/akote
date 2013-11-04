
;(function($){

  google.maps.visualRefresh = true;
  var geocoder = new google.maps.Geocoder();
  var oRayon;
  var marker;
  var aMapOptions = {
    disableDefaultUI:true,
    scrollwheel:false,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center:new google.maps.LatLng(50.5,4)
  }
  var map = new google.maps.Map(document.getElementById('gmap'),aMapOptions);
  $(function(){



  })

  $('#filtrer').click(function(){
    var position = document.getElementById('map').value;
    var distance = document.getElementById('distance').value;
    getCity(position,distance);
  }); 
  $('#map').change(function(){
    var position = document.getElementById('map').value;
    var distance = document.getElementById('distance').value;
    getCity(position,distance);
  });
  var drawCircle = function(oCenter,sDistance){

    var lat = oCenter.lb;
    var lng = oCenter.mb;
    nDistance = Number(sDistance);
    var oCenterCity = new google.maps.LatLng(lat, lng);
    var gSpherical = google.maps.geometry.spherical; 
    var oCircleRange = gSpherical.computeOffset(oCenterCity, nDistance, 0);

    createMarker(oCircleRange);

    var nDistance = google.maps.geometry.spherical.computeDistanceBetween(oCenterCity, oCircleRange);

    var aCircleOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: oCenter,
      radius: nDistance
    };
    var  cityCircle = new google.maps.Circle(aCircleOptions);
  }

  var getCity = function(sPosition,sDistance){

    var aMapOptions = {
      disableDefaultUI:true,
      scrollwheel:false,
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.HYBRID,
      center:geocoder.geocode({
        address:sPosition,
        region:"BE"
      },function(aResults,sStatus)
      {
        if(sStatus ===google.maps.GeocoderStatus.OK)
        {
          var center = aResults[0].geometry.location;
          map.setCenter(aResults[0].geometry.location);
          map.setZoom(14);
          
          

          createMarker(center);
          drawCircle(center,sDistance);
        }
        else if(sStatus ===google.maps.GeocoderStatus.ZERO_RESULTS)
        {
          alert('La google map n\'a rien trouvé car aucune donnée n\'a été entré');
        }
        else if(sStatus ===google.maps.GeocoderStatus.INVALID_REQUEST){
          alert('La google map n\'a rien trouvé car la requête est incorrect');
        }
      })
    }
    
  }
  var createMarker = function(center){
   if (marker) {

    marker.setPosition(center);

  } else {

    var marker = new google.maps.Marker({
      title:"Tu habites ici",
      position: center,
      map:map,

    });
  }
}
var toRad = function(number){

  return number * Math.PI / 180;


}
var toDegree = function(number){
  return Math.PI * number / 180;
}
}).call(this,jQuery);