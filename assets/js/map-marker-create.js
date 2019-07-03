require('../css/map.css');




var Mymarker= null

var myIcon = L.icon({
    iconUrl: '../uploads/icons/marker_icon.png',
    iconSize:     [52, 63], // size of the icon
    shadowSize:   [64, 45], // size of the shadow
    iconAnchor:   [26, 63], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

function onMapClick(e) {
 if (Mymarker == null){
		Mymarker = new L.marker(e.latlng,{title: "nouvelle localisation", alt: "nouvelle localisation",icon:myIcon, draggable:'true',autoPan:'true'})
 };	
 marker.on('dragend', function(event){
   var Mymarker = event.target;
   var position = Mymarker.getLatLng();
   Mymarker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
   map.panTo(new L.LatLng(position.lat, position.lng));
   var arraypos= '['+ position.lat   +','+ position.lng+']';
   $('#entry_lat').val(position.lat);
   $('#entry_lng').val(position.lng);

   
 });

 
 map.on('click', onMapClick);

};