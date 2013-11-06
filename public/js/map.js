
;(function($){

  "use strict";
  var gMap,
  gMarkerKot,
  cityCircle = new google.maps.Circle(),
  rectangle = new google.maps.Rectangle(),
  listKot = [],
  regLatLng = new RegExp("[,]"),
  geocoder = new google.maps.Geocoder(),
  oRayon,
  gMarker = new google.maps.Marker,
  cityCircle,
  gSpherical = google.maps.geometry.spherical,
  input = document.getElementById('map'),
  gPlaceAutoComplete;
  
  $(function(){

   ajaxAllKot();


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
  });

  displayGoogleMap();

});

  var ajaxAllKot = function(){
   $.ajax({
    dataType: "json",
    url:"dataKot",
    success: function ( oResponse ){

      createMarkerBDD(oResponse.data);
    }
  })
 }
 var createMarkerBDD = function(oData){

   for(var i=0;i<=oData.lat.length-1;i++)
   {
    var lat = oData.lat[i];
    var lng = oData.lng[i];
    var LatLng = [lat,lng];
    listKot.push(LatLng);
    createMarker( Number(listKot[i][0]) , Number(listKot[i][1]), oData.adresse[i] );
    //inRange(Number(listKot[i][0]) , Number(listKot[i][1]));   
  }
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
console.log(bounds);
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
  
  defineCircle(oCenter, nDistance);

  var oCircleRangeN = gSpherical.computeOffset(oCenter, nDistance, 0); //marker limitant au NORD
  var oCircleRangeE = gSpherical.computeOffset(oCenter, nDistance, 90); //marker limitant au EST
  var oCircleRangeS = gSpherical.computeOffset(oCenter, nDistance, 180); //marker limitant au SUD
  var oCircleRangeO = gSpherical.computeOffset(oCenter, nDistance, 360); //marker limitant au OUEST

  var recBounds = new google.maps.LatLngBounds(
    oCircleRangeN, 
    oCircleRangeS,
    oCircleRangeE,
    oCircleRangeO
    
    );

  var rOptions = defineRectangle(recBounds);
  rectangle.setOptions(rOptions);
 // cityCircle.setOptions(aCircleOptions);

   // cityCircle.setOptions(aCircleOptions);
    // var bounds = cityCircle.getBounds();
     //console.log(bounds.contains(new google.maps.LatLng(nLat,nLng)));


 //console.log(bounds.contains(new google.maps.LatLng(nLat,nLng)));
}
var createMarker = function ( nLat , nLng, sAdresse )
{
  var position = new google.maps.LatLng(nLat,nLng);

  gMarkerKot = new google.maps.Marker({
    position:position,
    map : gMap,
    animation: google.maps.Animation.DROP,
    title : sAdresse

  });

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
  var oCircleRangeE = gSpherical.computeOffset(oCenterCity, nDistance, 90); //marker limitant au EST
  var oCircleRangeS = gSpherical.computeOffset(oCenterCity, nDistance, 180); //marker limitant au SUD
  var oCircleRangeO = gSpherical.computeOffset(oCenterCity, nDistance, 360); //marker limitant au OUEST

  var oNordLatLng = 'data:'+oCircleRangeN.lb+','+oCircleRangeN.mb;
  var oEstLatLng = 'data:'+oCircleRangeE.lb+','+oCircleRangeE.mb; //COORDS O.N.E.S
  var oSudLatLng = 'data:'+oCircleRangeS.lb+','+oCircleRangeS.mb;
  var oOuestLatLng = 'data:'+oCircleRangeO.lb+','+oCircleRangeO.mb;

  var latN = Number(oCircleRangeN.lb);
  var lngN = Number(oCircleRangeN.mb);

  //console.log( oNordLatLng );
  gMarker.setPosition( oCenterCity );
  //gMarker.setPosition( oCircleRangeS );
  gMarker.setMap( gMap );

  var nDistance = google.maps.geometry.spherical.computeDistanceBetween(oCenterCity, oCircleRangeN);

  var aCircleOptions = defineCircle(oCenter, nDistance);

  cityCircle.setOptions(aCircleOptions);

  inRange(oCenter, nDistance);

    //var bounds = cityCircle.getBounds();
    //console.log(bounds.contains(new google.maps.LatLng(50.4658,4.8677)));
  //inRange (range);
 // cityCircle = new google.maps.Circle(aCircleOptions);

 //var bounds = cityCircle.getBounds();
 //console.log(bounds.contains(new google.maps.LatLng(50.4658,4.8677)));

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
var toRad = function(number){

  return number * Math.PI / 180;


}
var toDegree = function(number){
  return Math.PI * number / 180;
}
}).call(this,jQuery);