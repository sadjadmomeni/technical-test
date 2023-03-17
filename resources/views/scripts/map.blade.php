<script>
  require(
  [
      "esri/config",
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer"
  ],
    function(esriConfig, Map, MapView, Graphic, GraphicsLayer) {
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

    const point = { //Create a point
    type: "point",
    longitude: -1.8206857153429397,
    latitude: 54.768336993764834
 };
 const simpleMarkerSymbol = {
    type: "simple-marker",
    color: [226, 119, 40],  // Orange
    outline: {
        color: [255, 255, 255], // White
        width: 1
    }
 };
    const pointGraphic = new Graphic({
    geometry: point,
    symbol: simpleMarkerSymbol
 });
 graphicsLayer.add(pointGraphic);

  });
</script>