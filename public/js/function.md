createMarkerBDD : Crée les markers pour chaque kot dans ma base de donnée.
reçoit: Object des kots d'ajax (latlng, adresse, ...)

inRange : Test si les kots sont bien en range du circle
si oui, les affiches, sinon les retires.
reçoit: circle, lat, lng 

createMarkerKot / Ecole : Crée les données pour les markers
reçoit: les données ajax

drawMarkerKot / ecole: dessine les markeurs
reçoit: lat, lng, nom et l'icone à utiliser

displayGoogleMap : affiche la google map en fonction des options

drawCircle : dessine le cercle et lance le test de range
reçoit: le centre et la distance

getCity : Transforme adresse humaine en lat lng deplace la carte vers l'emplacement, crée un marker et dessine le cercle
reçoit: position et distance

defineRectangle: défini les options d'un rectangle.
reçoit: le point botleft et le point topright

defineCircle: défini les options d'un cercle
reçoit: un radius (en m) et un centre.

autoriseFiltre : en fonction du choix de recherche (ecole, ville) au click ou change, il fournis les bonnes fonction

actionChangeType: en fonction du choix de recherche, il donne un cachet et modifie les inputs.

ajaxAllKot / ecole : recupère en ajax les données des kots / ecoles et les envoies au createur de marker

actionEcoleClick: au click sur une ecole, 
