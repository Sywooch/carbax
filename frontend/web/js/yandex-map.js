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
                zoom: zoom,
                controls: ['zoomControl', 'searchControl', 'typeSelector',  'fullscreenControl']
            });
        }
    }

    this.addToMap = function(address, center, balloon){
        balloon = balloon || false;
        ymaps.ready(init);
        var centerInit = this.center;
        var element = this.element;
        var zoom = this.zoom;
        function init(){
            if(center === false){
                var centerAddress = address[0].address;
            }
            else {
                var centerAddress = centerInit;
            }
            var myGeocoder = ymaps.geocode(centerAddress);
            myGeocoder.done(
                function (res) {
                    var myMap = new ymaps.Map(element, {
                        center: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]],
                        zoom: zoom,
                        controls: ['zoomControl', 'searchControl', 'typeSelector',  'fullscreenControl']
                    });
                    var i = 0;
                    address.forEach(function(a){
                        var geoItem = ymaps.geocode(a.address);
                        geoItem.done(
                            function(res) {
                                if(a.balloon){
                                    if(a.balloon.photo){
                                        var prop = {
                                            /*iconContent: 'Я тащусь',*/
                                            hintContent: '<b>' + a.balloon.title + '</b><br> ' + a.address,
                                            balloonContentHeader: "<a href='/services/services/view_service?service_id=" + a.balloon.serviceId + "'>" + '<b>' + a.balloon.title + '</b>' + '</a>',
                                            balloonContentBody: "<a href='/services/services/view_service?service_id=" + a.balloon.serviceId + "'>" + "<img src='" + a.balloon.photo + "' width='75px'><br>"+ '</a>' + "Адврес: " + a.address + "<br>Телефоны: " + a.balloon.phone +"<br>Email: " + a.balloon.email,
                                            balloonContentFooter: "<a href='/services/services/view_service?service_id=" + a.balloon.serviceId + "'>Подробнее" + "</a>"
                                        }
                                    }
                                    else {
                                        var prop = {}
                                    }
                                }
                                else {
                                    var prop = {}
                                }
                                var objects = new ymaps.GeoObject(
                                    {
                                        geometry: {
                                            type: "Point",
                                            coordinates: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]]
                                        },
                                        properties: prop
                                    },
                                    {
                                        iconLayout: 'default#image',
                                        iconImageHref: '/media/img/iconMaps/' + a.balloon.serviceTypeId + '.png',
                                        iconImageSize: [40, 70]
                                    });

                                myMap.geoObjects.add(objects);
                                i++;
                                //objects.addToMap(myMap);
                            }
                        );
                        /*var objects = ymaps.geoQuery(ymaps.geocode(a));
                        objects.addToMap(myMap);*/
                    });
                }
            );
        }
    }

    this.getAddressBalloon = function(balloon, address){
        var i = 0;
        var prop = [];
        address.forEach(function(a){
            prop.push({
                hintContent: '<b>' + balloon[i].title + '</b><br> ' + a
            });
            console.log(a);
            i++;
        });
        return prop;
    }
    //console.log(this.option);
};
