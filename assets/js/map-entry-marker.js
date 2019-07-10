 $(document).ready(function() {
  var map = L.map('map').setView([46.1202996, 5.2091508], 10.2);
  
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: ' <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  L.marker([46.2027, 5.2111],{draggable:'true'}).addTo(map)
      .bindPopup('Bourg en Bresse pretty CSS3 popup.<br> Easily customizable.')
      .openPopup();
  getentries();
  
  function getentries (event){
	  		  var qs = require('qs');
        	  var axios = require('axios');
        	  var entries=[];
        	   var url='http://localhost:8000/'+'getentries';
        	    axios.post(url).then(function(response){
        	    		entries.push(response.data.entries);
        	    	
        	          	console.log(entries);
        	          	entries.forEach(function(element){
        	          		alert(qs.stringify(element))
        	          	})
        
        	    		
        	    	})
        	}
  })



  