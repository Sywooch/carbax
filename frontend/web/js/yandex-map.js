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

    this.addToMap = function(address, center){
        ymaps.ready(init);
        var centerInit = this.center;
        var element = this.element;
        var zoom = this.zoom;
        function init(){
            if(center === false){
                var centerAddress = address[0];
            }
            else {
                var centerAddress = centerInit;
            }
            var myGeocoder = ymaps.geocode(centerAddress);
            myGeocoder.done(
                function (res) {
                    var myMap = new ymaps.Map(element, {
                        center: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]],
                        zoom: zoom
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
