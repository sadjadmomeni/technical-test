<script>
  var turbines=<?php echo json_encode($farm->turbines); ?>;

  require(
  [
      "esri/config",
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
      "esri/symbols/TextSymbol",
      "esri/symbols/Font"
  ],
    function(esriConfig, Map, MapView, Graphic, GraphicsLayer, TextSymbol, Font) {
    esriConfig.apiKey = "AAPK89c9fe8e13344e80b44b1d968a1638adxYnjl8S2LQBPxzpjFuKY5a0ru19HoQfo14rcuu1UZRTDMBqW29cx3QpnlHvnYCwF";

    const map = new Map({
      basemap: "arcgis-topographic" // Basemap layer service
    });

    const view = new MapView({
      map: map,
      center: [-1.8206857153429397, 54.768336993764834], // Longitude, latitude
      zoom: 15, // Zoom level
      container: "viewDiv" // Div element
    });

    const graphicsLayer = new GraphicsLayer();
    map.add(graphicsLayer);

  
    const simpleMarkerSymbol = {
      type: "simple-marker",
      color: [226, 119, 40],  // Orange
      outline: {
          color: [255, 255, 255], // White
          width: 1
      }
    };

    turbines.forEach(function(turbine) {
      var point = { //Create a point
        type: "point",
        longitude: turbine.long,
        latitude: turbine.lat
      };

      var textSym = new TextSymbol(turbine.name);
      textSym.backgroundColor = [13, 160, 253]

      var pointGraphic = new Graphic({
        geometry: point,
        symbol: textSym
      });
      graphicsLayer.add(pointGraphic);
    });

  });
</script>