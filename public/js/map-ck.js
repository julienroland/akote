(function(e){"use strict";var t,n=[],r=[],i,s,o,u,a,f=[],l=[],c=new google.maps.LatLng,h=[],p,u,d=new google.maps.Circle,v=new google.maps.Rectangle,m=[],g=[],y=new RegExp("[,]"),b=new google.maps.Geocoder,w,E=new google.maps.Marker,S=google.maps.geometry.spherical,x=document.getElementById("map"),T;e(function(){L();k();C();e("#rapide input").on("click",C);var t={types:["(cities)"],componentRestrictions:{country:"be"}};T=new google.maps.places.Autocomplete(x,t);B()});var N=function(t){e("#filtrer").click(function(){var n=document.getElementById("distance").value;e.isNumeric(n)?u=n:u=0;var r=document.getElementById("map").value;t==="ville"?F(r,u):t==="ecole"&&D(u)});e("#map").change(function(){var n=document.getElementById("distance").value;e.isNumeric(n)?u=n:u=0;var r=document.getElementById("map").value;t==="ville"?F(r,u):t==="ecole"&&D(u);C(r,u)})},C=function(t,n){if(e("#rapide input:checked").val()==="ville"){e("label.type").text("Indiquez l'adresse");e("input.type").attr("placeholder","Namur");p="ville"}else if(e("#rapide input:checked").val()==="ecole"){e("label.type").text("Ecole ciblée");e("input.type").attr("placeholder","Haute Ecole de La Province de Liège ou HEPL");p="ecole"}else e("#rapide input:checked").val()==="aucun"&&console.log("tout");N(p)},k=function(){e.ajax({dataType:"json",url:"dataKot",success:function(e){o=e.data;A(o);console.log("ajaxKot")}})},L=function(){e.ajax({dataType:"json",url:"dataEcole",success:function(e){a=e.data;O(a);console.log("ajaxEcole")}})},A=function(e){var t=new google.maps.MarkerImage("http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png");for(var n=0;n<=e.length-1;n++){var r=e[n].lat,i=e[n].lng,s=[r,i];m.push(s);M(Number(m[n][0]),Number(m[n][1]),e[n].adresse,t)}},O=function(e){var t=new google.maps.MarkerImage("http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png");for(var n=0;n<=e.length-1;n++){var r=e[n].lat,i=e[n].lng,s=[r,i];g.push(s);_(Number(g[n][0]),Number(g[n][1]),e[n].nom,t)}},M=function(e,r,s,o){var u=new google.maps.LatLng(e,r);i=new google.maps.Marker({position:u,map:t,animation:google.maps.Animation.DROP,title:s,icon:o});n.push(i)},_=function(n,o,u,f){var p=new google.maps.LatLng(n,o);s=new google.maps.Marker({position:p,map:t,animation:google.maps.Animation.DROP,title:u,icon:f});r.push(i);google.maps.event.addListener(s,"click",function(n){h=[];t.setZoom(12);t.panTo(s.getPosition());for(var r=0;r<=a.length-1;r++){h={latlng:new google.maps.LatLng(a[r].lat,a[r].lng),nom:a[r].nom};l.push(h)}for(var r=0;r<=l.length-1;r++)if(n.latLng.lat()===l[r].latlng.lat()&&n.latLng.lng()===l[r].latlng.lng()){e(".type").attr("value",l[r].nom);c=new google.maps.LatLng(l[r].latlng.lat(),l[r].latlng.lng())}})},D=function(e){j("ecole",c,u)},P=function(e,n,r){return{strokeColor:r,strokeOpacity:.8,strokeWeight:2,fillColor:r,fillOpacity:.35,map:t,center:e,radius:n}},H=function(r,i){f=[];var s=P(r,i);d.setOptions(s);var u=d.getBounds();for(var a=0;a<=o.length-1;a++)if(!u.contains(new google.maps.LatLng(o[a].lat,o[a].lng)))n[a].setMap(null);else{f.push(o[a]);n[a].setMap(t);t.fitBounds(u)}e("#listKot").attr("value",JSON.stringify(f))},B=function(){var e={disableDefaultUI:!0,scrollwheel:!1,zoom:8,mapTypeId:google.maps.MapTypeId.ROADMAP,center:new google.maps.LatLng(50.5,4)};t=new google.maps.Map(document.getElementById("gmap"),e)},j=function(e,n,r){d&&d.setMap(null);u=Number(r);var i=n,s=S.computeOffset(i,u,0);if(e==="ville"){E.setPosition(i);E.setMap(t);var o="#FF0000"}else e==="ecole";var o="#0000FF",u=google.maps.geometry.spherical.computeDistanceBetween(i,s),a=P(n,u,o);d.setOptions(a);H(n,u)},F=function(n,r){var i=Number(r),s={disableDefaultUI:!0,scrollwheel:!1,zoom:8,mapTypeId:google.maps.MapTypeId.HYBRID,center:b.geocode({address:n,region:"BE"},function(n,s){if(s===google.maps.GeocoderStatus.OK){var o=n[0].geometry.location;t.setZoom(14);t.panTo(o);e("#coords").attr("value",o);var u=S.computeOffset(o,i,360);E.setPosition(o);E.setMap(t);j("ville",o,r)}else s===google.maps.GeocoderStatus.ZERO_RESULTS?alert("La google map n'a rien trouvé car aucune donnée n'a été entré"):s===google.maps.GeocoderStatus.INVALID_REQUEST&&alert("La google map n'a rien trouvé car la requête est incorrect")})}}}).call(this,jQuery);