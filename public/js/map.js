
;(function($){

  "use strict";
  var gMap,
  geocoder = new google.maps.Geocoder(),
  oRayon,
  gMarker = new google.maps.Marker,
  cityCircle,
  gSpherical = google.maps.geometry.spherical,
  input = document.getElementById('map'),
  gPlaceAutoComplete;
  //gRestriction = new google.maps.places.ComponentRestrictions( "be" );
  
  $(function(){

    //gPlaceAutoComplete.bindTo('bounds', gMap);
    var options = {
      types: ['(cities)'],
      componentRestrictions: {country: "be"}
    };
    gPlaceAutoComplete = new google.maps.places.Autocomplete(input,options);

    //gPlaceAutoComplete.setComponentRestrictions({'country': 'fr'});

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
    var lat = oCenter.lb;
    var lng = oCenter.mb;
    nDistance = Number(sDistance);

    var oCenterCity = new google.maps.LatLng(lat, lng);
    var oCircleRange = gSpherical.computeOffset(oCenterCity, nDistance, 0);

    gMarker.setPosition( oCenterCity );
    gMarker.setMap( gMap );

    var nDistance = google.maps.geometry.spherical.computeDistanceBetween(oCenterCity, oCircleRange);

    var aCircleOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: gMap,
      center: oCenter,
      radius: nDistance
    };
    cityCircle = new google.maps.Circle(aCircleOptions);
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
          gMap.setZoom( 14 );
          gMap.panTo ( center );
          console.log(center);
          var sCoords = center.lb +','+ center.mb;
          $('#coords').attr('value',sCoords);

          gMarker.setPosition( center);
          gMarker.setMap( gMap );

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
  var toRad = function(number){

    return number * Math.PI / 180;


  }
  var toDegree = function(number){
    return Math.PI * number / 180;
  }
}).call(this,jQuery);