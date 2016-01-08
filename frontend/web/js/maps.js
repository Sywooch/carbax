jQuery(document).ready(function ($){


    if(document.getElementsByClassName('addContent__adress').length > 0){//те такие блоки есть
        var address = $('.addContent__adress').val();
        var map = new Map();
        if(address == ''){
            map.mapInit();
        }
        else{
            console.log('123');
            var address = [];
            var i = 0;
            $('.addContent__adress').each(function () {
                address.push({
                    address:$(this).val()
                });
                //address.push($(this).val());
                i = i + 1;
            });
            map.addToMap(address, false);
        }
    }

    if(document.getElementById('main_map')){
        console.log('321');
        var center = [];
        center.push($('#coordinates').attr('lat'));
        center.push($('#coordinates').attr('lng'));

        var map = new Map({
            element:'main_map',
            center: center,
            zoom: 11
        });
        map.mapInit();
    }


    /*$(document).on('focusout', '.addContent__adress', function () {
        if($(this).val() != ''){
            var map = new Map();
            $('#map').empty();

            var address = [];
            var i = 0;
            $('.addContent__adress').each(function () {
                address.push($(this).val());
                i = i + 1;
            });
            map.addToMap(address, false);
        }
    });*/

    $('.main_category_to_map').on('click', function(){
        var cityId = $('#coordinates').attr('cityId');
        var regionId = $('#coordinates').attr('regionId');
        $(this).toggleClass('mapFilterActivate');
        var serviceTypeIds = '';
        $('.mapFilterActivate').each(function(){
            serviceTypeIds = serviceTypeIds + $(this).attr('service-type') + ',';
        });
        $.ajax({
            type: 'POST',
            url: "/mainpage/mainpage/get_address",
            data: 'serviceTypeIds=' + serviceTypeIds.slice(0, -1) + '&cityId=' + cityId + '&regionId=' + regionId,
            success: function (data) {
                /*console.log(data);*/
                $('#setAddress').html(data);

                var addresses = [];
                var balloon = [];
                $('.main_map_address').each(function(){
                    addresses.push({
                        address:$(this).attr('address'),
                        balloon: {
                            title:$(this).attr('title'),
                            email:$(this).attr('email'),
                            serviceId: $(this).attr('service_id'),
                            photo:$(this).attr('photo'),
                            phone:$(this).attr('phone')
                        }
                    });
                });
                //console.log(addresses);

                var center = [];
                center.push($('#coordinates').attr('lat'));
                center.push($('#coordinates').attr('lng'));
                var map = new Map({
                    element:'main_map',
                    center: center,
                    zoom: 11
                });
                $('#main_map').empty();
                map.addToMap(addresses, true);
            }
        });
    });

});
