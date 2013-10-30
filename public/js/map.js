
;(function($){

  google.maps.visualRefresh = true;
  var geocoder = new google.maps.Geocoder();
  $(function(){

    var aMapOptions = {
      disableDefaultUI:true,
      scrollwheel:false,
      zoom: 7,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center:new google.maps.LatLng(50.5,4)
    }
    var map = new google.maps.Map(document.getElementById('gmap'),aMapOptions);

  })

  $('#map').change(function(){

    var position = document.getElementById('map').value;
    getCity(position);

  });
  var getCity = function(sPosition){
    console.log(sPosition);
    var aMapOptions = {
      disableDefaultUI:true,
      scrollwheel:false,
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.HYBRID,
      center:geocoder.geocode({
        address:sPosition,
      },function(aResults,sStatus)
      {
        if(sStatus ===google.maps.GeocoderStatus.OK)
        {
          var myLat = aResults[0].geometry.location.lb;
          var myLg = aResults[0].geometry.location.mb;
          
        //createMarker(sPosition);
      }
    })
    }
    var map = new google.maps.Map(document.getElementById('gmap'),aMapOptions);
  }
  var createMarker = function(sPosition){
    console.log('marker');
    var displayU = new google.maps.Marker({
      title:"Tu habites ici",
      position: sPosition,
      map:map,
    });
  }
}).call(this,jQuery);