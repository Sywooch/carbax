function Map( options ) {
    //public
    var defaultOptions = {
        element: 'map' //id карты
        ,center: [55.76, 37.64]
        ,zoom: 7
    }
    for(var option in defaultOptions) this[option] = options && options[option]!==undefined ? options[option] : defaultOptions[option];

    /*тут будем кодить дальше…  */

    this.map;

    this.mapInit = function(){
        ymaps.ready(init);
        var center = this.center;
        var zoom = this.zoom;
        var element = this.element;
        var myMap;
        function init(){
            myMap = new ymaps.Map(element, {
                center: center,
                zoom: zoom
            });
        }
    }

    this.addToMap = function(address){
        ymaps.ready(init);
        function init(){
            var myGeocoder = ymaps.geocode(address[0]);
            myGeocoder.done(
                function (res) {
                    var myMap = new ymaps.Map("map", {
                        center: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]],
                        zoom: 7
                    });
                    address.forEach(function(a){
                        var objects = ymaps.geoQuery(ymaps.geocode(a));
                        objects.addToMap(myMap);
                    });
                }
            );
        }
    }


    //console.log(this.option);
};
