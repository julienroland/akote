createMarkerBDD : Crée les markers pour chaque kot dans ma base de donnée.
reçoit: Object des kots d'ajax (latlng, adresse, ...)

inRange : Test si les kots sont bien en range du circle
si oui, les affiches, sinon les retires.
reçoit: circle, lat, lng 

createMarker : Crée des markers
reçoit: lat, lng, adresse 

displayGoogleMap : affiche la google map en fonction des options

drawCircle : dessine le cercle et lance le test de range
reçoit: le centre et la distance

getCity : Transforme adresse humaine en lat lng deplace la carte vers l'emplacement, crée un marker et dessine le cercle
reçoit: position et distance

defineRectangle: défini les options d'un rectangle.
reçoit: le point botleft et le point topright

defineCircle: défini les options d'un cercle
reçoit: un radius (en m) et un centre.
