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
        var center = this.center;
        var zoom = this.zoom;
        var element = this.element;
        var myMap;
        var t = ymaps.ready(function(){
            myMap = new ymaps.Map(element, {
                center: center,
                zoom: zoom
            });
            console.log(myMap);
        });
        console.log(t);
        /*function init(){
            myMap = new ymaps.Map(element, {
                center: center,
                zoom: zoom
            });
            console.log(myMap);
        };*/

    }

    this.addToMap = function(mapObj, address){

    }


    //console.log(this.option);
};
