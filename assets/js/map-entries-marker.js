
  var bounds=[[46.2, 5.2]];
  var map = L.map('map',{scrollWheelZoom:false});

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

	class EntryMarker {
		constructor (lat, lng, logo, name, text){
			this.text= null;
			this.shortText='<img class="thumbnail-logo" src="'+logo+'">' +name
			this.popup = L.popup({
			     autoClose:false,
			     closeOnEscapeKet: false,
			     closeOnClick:false,
			     closeButton:false,
			     className:'entry-marker',
			     maxWidth:300
					
				}).setLatLng([lat,lng])
				  .setContent(this.shortText)
				  .openOn(map)
			}

			setActive(){
				this.popup.getElement().classList.add('active')

				}
			unsetActive(){
				this.popup.getElement().classList.remove('active')

				}
			addEventListener (event,cb){
				this.popup.addEventListener('add', () =>{
					this.popup.getElement().addEventListener(event,cb)
					})
				}
			setContent (text){
				this.popup.setContent(text)
			    this.popup.setCloseButton(true),
				
				this.popup.getElement().classList.add('expanded')
				this.popup.update()
				}
			resetContent(){
				this.popup.setContent(this.shortText)
				this.popup.getElement().classList.remove('expanded')
				this.popup.update()
				
				}

		}
  
  let hoverMarker = null
  let activeMarker = null 
	  
  Array.from(document.querySelectorAll('.js-marker')).forEach((item) => {


	  let marker = new EntryMarker (item.dataset.lat, item.dataset.lng,item.dataset.logo, item.dataset.name);
	  var point=[item.dataset.lat, item.dataset.lng];
	  bounds.push(point);
	  item.addEventListener('mouseover', function() {
		  if (hoverMarker !== null) {
			hoverMarker.unsetActive();
			  }
		marker.setActive()
		hoverMarker = marker
		 })
		item.addEventListener('mouseleave', function(){
			if (hoverMarker !==null){
			hoverMarker.unsetActive()
				}
			})
		 marker.addEventListener('click', function(){
				if (activeMarker !==null){
				activeMarker.resetContent()
					}
			marker.setContent(item.innerHTML)
			activeMarker = marker
			 })
	  });




		
 	map.fitBounds(bounds);

	  
