
;(function($){

  "use strict";
  var gMap,
  gMarkerArrayKot = [],
  gMarkerArrayEcole = [],
  gMarkerKot,
  oKots,
  oEcoles,
  aKots = [],
  cityCircle = new google.maps.Circle(),
  rectangle = new google.maps.Rectangle(),
  listKot = [],
  listEcole = [],
  regLatLng = new RegExp("[,]"),
  geocoder = new google.maps.Geocoder(),
  oRayon,
  gMarker = new google.maps.Marker,
  gSpherical = google.maps.geometry.spherical,
  input = document.getElementById('map'),
  gPlaceAutoComplete;
  
  $(function(){

   ajaxAllKot();
   ajaxAllEcole();

   var options = {
    types: ['(cities)'],
    componentRestrictions: {country:"be"}
  };
  gPlaceAutoComplete = new google.maps.places.Autocomplete(input,options);

  $('#filtrer').click(function(){
    var sDistanceValue = document.getElementById('distance').value;

    if($.isNumeric(sDistanceValue))
    {
      var nDistanceValueOk = sDistanceValue;
    }
    else
    {
      var nDistanceValueOk = 0;
    }
    var sCityValue = document.getElementById('map').value;
    getCity( sCityValue , nDistanceValueOk );
  }); 

  $('#map').change(function(){
    var sDistanceValue = document.getElementById('distance').value;

    if($.isNumeric(sDistanceValue))
    {
      var nDistanceValueOk = sDistanceValue;
    }
    else
    {
      var nDistanceValueOk = 0;
    }
    var sCityValue = document.getElementById('map').value;
    getCity( sCityValue , nDistanceValueOk );
   // ajaxAllKot();
  });

  displayGoogleMap();

});

  var ajaxAllKot = function(){
   $.ajax({
    dataType: "json",
    url:"dataKot",
    success: function ( oResponse ){
      oKots = oResponse.data;
      createMarkerKot(oResponse.data);
    }
  })
 }
 var ajaxAllEcole = function(){
   $.ajax({
    dataType: "json",
    url:"dataEcole",
    success: function ( oResponse ){
      oEcoles= oResponse.data;
      createMarkerEcole(oResponse.data);
    }
  })
 }
 var createMarkerKot = function(oData){
   var redIcon = new google.maps.MarkerImage('http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png');
  

   for(var i=0;i<=oData.length-1;i++)
   {
    var lat = oData[i].lat;
    var lng = oData[i].lng;
    var LatLng = [lat,lng];
    listKot.push(LatLng);
    drawMarkerKot( Number(listKot[i][0]) , Number(listKot[i][1]), oData[i].adresse, redIcon);
  }

} 
var createMarkerEcole = function(oData){
 var blueIcon = new google.maps.MarkerImage('http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png');

 for(var i=0;i<=oData.length-1;i++)
 {
  var lat = oData[i].lat;
  var lng = oData[i].lng;
  var LatLng = [lat,lng];
  listEcole.push(LatLng);
  drawMarkerEcole( Number(listEcole[i][0]) , Number(listEcole[i][1]), oData[i].nom, blueIcon);
}
}

var drawMarkerKot = function ( nLat , nLng, sNom , icon)
{
  var position = new google.maps.LatLng(nLat,nLng);

  gMarkerKot = new google.maps.Marker({
    position:position,
    map : gMap,
    animation: google.maps.Animation.DROP,
    title : sNom,
    icon : icon
  });

  gMarkerArrayKot.push(gMarkerKot);

}
var drawMarkerEcole = function ( nLat , nLng, sAdresse , icon)
{
  var position = new google.maps.LatLng(nLat,nLng);

  gMarkerKot = new google.maps.Marker({
    position:position,
    map : gMap,
    animation: google.maps.Animation.DROP,
    title : sAdresse,
    icon : icon
  });

  gMarkerArrayEcole.push(gMarkerKot);

}
var defineCircle = function(center, radius){
  return {
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35,
    map: gMap,
    center: center,
    radius: radius
  };
}
var defineRectangle = function(bounds){

  return {
   bounds: bounds,
   map: gMap,
   strokeColor: "#FF0000",
   strokeOpacity: 0.8,
   strokeWeight: 2,
   fillColor: "#FF0000",
   fillOpacity: 0.35,
 };
}
var inRange = function ( oCenter, nDistance )
{
  aKots = [];
  
  var options = defineCircle(oCenter, nDistance);
  cityCircle.setOptions( options );

  var boundd = cityCircle.getBounds();
  for(var i=0;i<=oKots.length-1;i++)
  {
   //console.log(oKots[i].id+boundd.contains(new google.maps.LatLng(oKots[i].lat,oKots[i].lng)));
   if(!boundd.contains(new google.maps.LatLng(oKots[i].lat,oKots[i].lng))){
    gMarkerArrayKot[i].setMap(null);
    //console.log(gMarkerArrayKot[i]);
    //clearMarkers();

  }
  else
  {
    aKots.push(oKots[i]);
    //showMarkers();
    gMarkerArrayKot[i].setMap( gMap );
    gMap.fitBounds (boundd);
  }
}
$('#listKot').attr('value',JSON.stringify(aKots));
}

var clearMarkers = function() {
  setAllMap(null);
}
function setAllMap(map) {
  for (var i = 0; i < gMarkerArrayKot.length; i++) {
    gMarkerArrayKot[i].setMap(map);
  }
}
function showMarkers() {
  setAllMap(gMap);
}
var displayGoogleMap = function (){

  var aMapOptions = {
    disableDefaultUI:true,
    scrollwheel:false,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center:new google.maps.LatLng(50.5,4)
  }
  gMap = new google.maps.Map(document.getElementById('gmap'),aMapOptions);

}
var drawCircle = function(oCenter,sDistance){
  if( cityCircle )
  {
    cityCircle.setMap( null );
  }
  nDistance = Number(sDistance);

  var oCenterCity = oCenter;
  var oCircleRangeN = gSpherical.computeOffset(oCenterCity, nDistance, 0); //marker limitant au NORD

  gMarker.setPosition( oCenterCity );
  gMarker.setMap( gMap );

  var nDistance = google.maps.geometry.spherical.computeDistanceBetween(oCenterCity, oCircleRangeN);

  var aCircleOptions = defineCircle(oCenter, nDistance);

  cityCircle.setOptions(aCircleOptions);

  inRange(oCenter, nDistance);


}
var getCity = function(sPosition,sDistance){
 var nDistance = Number(sDistance);

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
      gMap.setZoom( 14 );
      gMap.panTo ( center );

      var sCoords = center;
      $('#coords').attr('value',sCoords);

      var oCircleRangeN = gSpherical.computeOffset(center, nDistance, 360);

      gMarker.setPosition( center );
      gMarker.setMap( gMap );

      drawCircle( center , sDistance );
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
}).call(this,jQuery);