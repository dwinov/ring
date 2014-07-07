/**
 * Created by roger on 7/7/14.
 */

var CustomMap = (function(){

    var map;

    /**
     * base load map using google api.
     */
    function baseFunction()
    {
        map = new GMaps({
            div: "#map-container",
            lat: 0.175781,
            lng: 114.250487
        })
    }

    /**
     * set marker on map.
     */
    function markerBuilder(lat, long)
    {
        baseFunction();

        var point = new google.maps.LatLng(parseFloat(lat), parseFloat(long));
        var info = "";

        var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: ''
        });

        bindInfoWindow(marker, map, new google.maps.InfoWindow, info);
    }

    /**
     * info popup when clicking marker.
     * @param marker
     * @param map
     * @param infoWindow
     * @param info
     */
    function bindInfoWindow(marker, map, infoWindow, info){
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(info);
            infoWindow.open(map, marker);
        });
    }

    return {
        baseMap: baseFunction,
        marker: markerBuilder
    }
});