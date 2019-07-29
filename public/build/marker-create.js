(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["marker-create"],{

/***/ "./assets/css/map.css":
/*!****************************!*\
  !*** ./assets/css/map.css ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/map-marker-create.js":
/*!****************************************!*\
  !*** ./assets/js/map-marker-create.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ../css/map.css */ "./assets/css/map.css");

var Mymarker = null;
var myIcon = L.icon({
  iconUrl: '../uploads/icons/marker_icon.png',
  iconSize: [52, 63],
  // size of the icon
  shadowSize: [64, 45],
  // size of the shadow
  iconAnchor: [26, 63],
  // point of the icon which will correspond to marker's location
  popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor

});

function onMapClick(e) {
  if (Mymarker == null) {
    Mymarker = new L.marker(e.latlng, {
      title: "nouvelle localisation",
      alt: "nouvelle localisation",
      icon: myIcon,
      draggable: 'true',
      autoPan: 'true'
    });
  }

  ;
  marker.on('dragend', function (event) {
    var Mymarker = event.target;
    var position = Mymarker.getLatLng();
    Mymarker.setLatLng(new L.LatLng(position.lat, position.lng), {
      draggable: 'true'
    });
    map.panTo(new L.LatLng(position.lat, position.lng));
    var arraypos = '[' + position.lat + ',' + position.lng + ']';
    $('#entry_lat').val(position.lat);
    $('#entry_lng').val(position.lng);
  });
  map.on('click', onMapClick);
}

;

/***/ })

},[["./assets/js/map-marker-create.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL21hcC5jc3MiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL21hcC1tYXJrZXItY3JlYXRlLmpzIl0sIm5hbWVzIjpbInJlcXVpcmUiLCJNeW1hcmtlciIsIm15SWNvbiIsIkwiLCJpY29uIiwiaWNvblVybCIsImljb25TaXplIiwic2hhZG93U2l6ZSIsImljb25BbmNob3IiLCJwb3B1cEFuY2hvciIsIm9uTWFwQ2xpY2siLCJlIiwibWFya2VyIiwibGF0bG5nIiwidGl0bGUiLCJhbHQiLCJkcmFnZ2FibGUiLCJhdXRvUGFuIiwib24iLCJldmVudCIsInRhcmdldCIsInBvc2l0aW9uIiwiZ2V0TGF0TG5nIiwic2V0TGF0TG5nIiwiTGF0TG5nIiwibGF0IiwibG5nIiwibWFwIiwicGFuVG8iLCJhcnJheXBvcyIsIiQiLCJ2YWwiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBLHVDOzs7Ozs7Ozs7OztBQ0FBQSxtQkFBTyxDQUFDLDRDQUFELENBQVA7O0FBS0EsSUFBSUMsUUFBUSxHQUFFLElBQWQ7QUFFQSxJQUFJQyxNQUFNLEdBQUdDLENBQUMsQ0FBQ0MsSUFBRixDQUFPO0FBQ2hCQyxTQUFPLEVBQUUsa0NBRE87QUFFaEJDLFVBQVEsRUFBTSxDQUFDLEVBQUQsRUFBSyxFQUFMLENBRkU7QUFFUTtBQUN4QkMsWUFBVSxFQUFJLENBQUMsRUFBRCxFQUFLLEVBQUwsQ0FIRTtBQUdRO0FBQ3hCQyxZQUFVLEVBQUksQ0FBQyxFQUFELEVBQUssRUFBTCxDQUpFO0FBSVE7QUFDeEJDLGFBQVcsRUFBRyxDQUFDLENBQUMsQ0FBRixFQUFLLENBQUMsRUFBTixDQUxFLENBS1E7O0FBTFIsQ0FBUCxDQUFiOztBQVFBLFNBQVNDLFVBQVQsQ0FBb0JDLENBQXBCLEVBQXVCO0FBQ3RCLE1BQUlWLFFBQVEsSUFBSSxJQUFoQixFQUFxQjtBQUNwQkEsWUFBUSxHQUFHLElBQUlFLENBQUMsQ0FBQ1MsTUFBTixDQUFhRCxDQUFDLENBQUNFLE1BQWYsRUFBc0I7QUFBQ0MsV0FBSyxFQUFFLHVCQUFSO0FBQWlDQyxTQUFHLEVBQUUsdUJBQXRDO0FBQThEWCxVQUFJLEVBQUNGLE1BQW5FO0FBQTJFYyxlQUFTLEVBQUMsTUFBckY7QUFBNEZDLGFBQU8sRUFBQztBQUFwRyxLQUF0QixDQUFYO0FBQ0E7O0FBQUE7QUFDREwsUUFBTSxDQUFDTSxFQUFQLENBQVUsU0FBVixFQUFxQixVQUFTQyxLQUFULEVBQWU7QUFDbEMsUUFBSWxCLFFBQVEsR0FBR2tCLEtBQUssQ0FBQ0MsTUFBckI7QUFDQSxRQUFJQyxRQUFRLEdBQUdwQixRQUFRLENBQUNxQixTQUFULEVBQWY7QUFDQXJCLFlBQVEsQ0FBQ3NCLFNBQVQsQ0FBbUIsSUFBSXBCLENBQUMsQ0FBQ3FCLE1BQU4sQ0FBYUgsUUFBUSxDQUFDSSxHQUF0QixFQUEyQkosUUFBUSxDQUFDSyxHQUFwQyxDQUFuQixFQUE0RDtBQUFDVixlQUFTLEVBQUM7QUFBWCxLQUE1RDtBQUNBVyxPQUFHLENBQUNDLEtBQUosQ0FBVSxJQUFJekIsQ0FBQyxDQUFDcUIsTUFBTixDQUFhSCxRQUFRLENBQUNJLEdBQXRCLEVBQTJCSixRQUFRLENBQUNLLEdBQXBDLENBQVY7QUFDQSxRQUFJRyxRQUFRLEdBQUUsTUFBS1IsUUFBUSxDQUFDSSxHQUFkLEdBQXFCLEdBQXJCLEdBQTBCSixRQUFRLENBQUNLLEdBQW5DLEdBQXVDLEdBQXJEO0FBQ0FJLEtBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JDLEdBQWhCLENBQW9CVixRQUFRLENBQUNJLEdBQTdCO0FBQ0FLLEtBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JDLEdBQWhCLENBQW9CVixRQUFRLENBQUNLLEdBQTdCO0FBR0QsR0FWRDtBQWFBQyxLQUFHLENBQUNULEVBQUosQ0FBTyxPQUFQLEVBQWdCUixVQUFoQjtBQUVBOztBQUFBLEMiLCJmaWxlIjoibWFya2VyLWNyZWF0ZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsInJlcXVpcmUoJy4uL2Nzcy9tYXAuY3NzJyk7XG5cblxuXG5cbnZhciBNeW1hcmtlcj0gbnVsbFxuXG52YXIgbXlJY29uID0gTC5pY29uKHtcbiAgICBpY29uVXJsOiAnLi4vdXBsb2Fkcy9pY29ucy9tYXJrZXJfaWNvbi5wbmcnLFxuICAgIGljb25TaXplOiAgICAgWzUyLCA2M10sIC8vIHNpemUgb2YgdGhlIGljb25cbiAgICBzaGFkb3dTaXplOiAgIFs2NCwgNDVdLCAvLyBzaXplIG9mIHRoZSBzaGFkb3dcbiAgICBpY29uQW5jaG9yOiAgIFsyNiwgNjNdLCAvLyBwb2ludCBvZiB0aGUgaWNvbiB3aGljaCB3aWxsIGNvcnJlc3BvbmQgdG8gbWFya2VyJ3MgbG9jYXRpb25cbiAgICBwb3B1cEFuY2hvcjogIFstMywgLTc2XSAvLyBwb2ludCBmcm9tIHdoaWNoIHRoZSBwb3B1cCBzaG91bGQgb3BlbiByZWxhdGl2ZSB0byB0aGUgaWNvbkFuY2hvclxufSk7XG5cbmZ1bmN0aW9uIG9uTWFwQ2xpY2soZSkge1xuIGlmIChNeW1hcmtlciA9PSBudWxsKXtcblx0XHRNeW1hcmtlciA9IG5ldyBMLm1hcmtlcihlLmxhdGxuZyx7dGl0bGU6IFwibm91dmVsbGUgbG9jYWxpc2F0aW9uXCIsIGFsdDogXCJub3V2ZWxsZSBsb2NhbGlzYXRpb25cIixpY29uOm15SWNvbiwgZHJhZ2dhYmxlOid0cnVlJyxhdXRvUGFuOid0cnVlJ30pXG4gfTtcdFxuIG1hcmtlci5vbignZHJhZ2VuZCcsIGZ1bmN0aW9uKGV2ZW50KXtcbiAgIHZhciBNeW1hcmtlciA9IGV2ZW50LnRhcmdldDtcbiAgIHZhciBwb3NpdGlvbiA9IE15bWFya2VyLmdldExhdExuZygpO1xuICAgTXltYXJrZXIuc2V0TGF0TG5nKG5ldyBMLkxhdExuZyhwb3NpdGlvbi5sYXQsIHBvc2l0aW9uLmxuZykse2RyYWdnYWJsZTondHJ1ZSd9KTtcbiAgIG1hcC5wYW5UbyhuZXcgTC5MYXRMbmcocG9zaXRpb24ubGF0LCBwb3NpdGlvbi5sbmcpKTtcbiAgIHZhciBhcnJheXBvcz0gJ1snKyBwb3NpdGlvbi5sYXQgICArJywnKyBwb3NpdGlvbi5sbmcrJ10nO1xuICAgJCgnI2VudHJ5X2xhdCcpLnZhbChwb3NpdGlvbi5sYXQpO1xuICAgJCgnI2VudHJ5X2xuZycpLnZhbChwb3NpdGlvbi5sbmcpO1xuXG4gICBcbiB9KTtcblxuIFxuIG1hcC5vbignY2xpY2snLCBvbk1hcENsaWNrKTtcblxufTsiXSwic291cmNlUm9vdCI6IiJ9