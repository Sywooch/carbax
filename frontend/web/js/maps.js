jQuery(document).ready(function ($){
    ymaps.ready(init);
    function init() {
        myMap = new ymaps.Map("map", {
            center: [55.76, 37.64],
            zoom: 7
        });

        $('.addContent__adress').each(function () {
            var text = $(this).val();
            var objects = ymaps.geoQuery(ymaps.geocode(text));
            objects.addToMap(myMap);

        });
    }

});
