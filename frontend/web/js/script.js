/*-------------GOOGLE MAPS-----------------*/
function initialize() {

    var myLatlng = new google.maps.LatLng(55.662561, 37.540873);
    var mapOptions = {
        center: new google.maps.LatLng(55.662561, 37.540873),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    var image = '/media/img/service_icon.png';
    var myLatLng = new google.maps.LatLng(55.662561, 37.540873);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
    });
}

function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE&callback=initialize";
    document.body.appendChild(script);
}

window.onload = loadScript;


jQuery(document).ready(function ($) {
    var img = $('.example-image');
    setTimeout(function () {
        img.each(function () {
            var heightEl = $(this).height();
            var topEl = (330 - heightEl) / 2;
            $(this).css({
                top: topEl
            });
        });
    }, 3000);
});

jQuery(document).ready(function ($) {

    $('#offers-region_id').on('change', function(){
        $.post(
            "/offers/offers/get_city",
            {
                region_id:$(this).val()
            },
            onAjaxSuccess
        );

        function onAjaxSuccess(data)
        {
            // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
            $('.city').html(data);
        }
    });


    /*ymaps.ready(init);
    var myMap,
        myPlacemark;

    function init() {
         myMap = new ymaps.Map("map", {
         center: [55.76, 37.64],
         zoom: 7
         });

    }*/

    var map = new Map({ center:[39.923562,35.820755], zoom:4 });
    map.mapInit();



    $(document).on('focusout', '.addContent__adress', function () {
        if($(this).val() != ''){
            $('#map').empty();
            var myMap;

            var myGeocoder = ymaps.geocode($(this).val());
            myGeocoder.done(
                function (res) {
                    myMap = new ymaps.Map("map", {
                        center: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]],
                        zoom: 7
                    });

                    var i = 0;
                    $('.addContent__adress').each(function () {
                        var text = $(this).val();
                        var objects = ymaps.geoQuery(ymaps.geocode(text));
                        objects.addToMap(myMap);
                        i = i + 1;
                    });
                }
            );
        }
    });

    $('#manSelect').on('change', function(){
        $('#typesBox').html('');
        $.ajax({
            type: 'POST',
            url: "/flea_market/default/get_model",
            data: 'mfa_id=' + $(this).val(),
            success: function (data) {
                $('#modelBox').html(data);
            }
        });
    });

    $(document).on('change', '#modSelect', function(){
        $.ajax({
            type: 'POST',
            url: "/flea_market/default/get_types",
            data: 'mod_id=' + $(this).val(),
            success: function (data) {
                $('#typesBox').html(data);
            }
        });
    });

    $('#regionSelect').on('change',function(){
       // alert($(this).val());
        $.ajax({
            type: 'POST',
            url: "/flea_market/default/get_city",
            data: 'reg_id=' + $(this).val(),
            success: function(data){
                $('#addCity').html(data);
            }
        });
    });

    $('#addUserOrService').on('change',function(){
        var id = $('input[name=userOrService]:checked').val();
        if(id == 1){
            $('#selectServiseWr').empty();
        }else{
            $.ajax({
                type: 'POST',
                url: "/flea_market/default/get_service",
                data: 'id=' + id,
                success: function(data){
                    $('#selectServiseWr').html(data);
                }
            });
        }
    });

    $('#autoTupeSelect').on('change',function(){
        var id = $('#autoTupeSelect').attr('data-id');
        alert(id);
        $.ajax({
            type: 'POST',
            url: "/flea_market/default/get_parent_category",
            data: 'id=' + id,
            success: function(data){
                $('#parent').html(data);
            }
        });
    });

    $(document).on('click', '#delAddress', function(){
        $(this).prev().remove();
        $(this).remove();

        $('#map').empty();
        var myMap;

        var myGeocoder = ymaps.geocode($('.addContent__adress').val());
        console.log(myGeocoder);
        myGeocoder.done(
            function (res) {
                myMap = new ymaps.Map("map", {
                    center: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]],
                    zoom: 7
                });

                var i = 0;
                $('.addContent__adress').each(function () {
                    var text = $(this).val();
                    var objects = ymaps.geoQuery(ymaps.geocode(text));
                    objects.addToMap(myMap);
                    i = i + 1;
                });
            }
        );

    });

    $('#addAddress').on('click', function () {
        $('<a href="#nowhere" id="delAddress" class="addContent__adress-add">-</a><input type="text" name="address[]" class="addContent__adress" placeholder="Адрес автосервиса">').insertBefore('#firstAddress');
    });
    $('#addContentPhone').on('click', function () {
        $('<a href="#nowhere" id="delPhone" class="addContent__cont-add">-</a><div class="cleared"></div><label for="phonenumber_last"></label><input type="text" class="addContent__cont" name="phoneNumber[]">').insertBefore('#firstPhone');
    });

    $(document).on('click', '#delPhone', function() {
        $(this).prev().prev().prev().remove();
        $(this).prev().prev().remove();
        $(this).prev().remove();
        $(this).remove();
    });

    var txt = $('.advantages__block__text');
    txt.each(function () {
        var h = $(this).height();
        var t = (320 - h) / 2;
        $(this).css({
            top: t
        });
    });
    /*txt.each(function(){
     var heightEl = $(this).height();

     });*/
    $(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function () {
            $('body,html').animate({scrollTop: 0}, 1000);
        });

        $('.smoothScroll').click(function (event) {
            event.preventDefault();
            var href = $(this).attr('href');
            var target = $(href);
            var top = target.offset().top;
            console.log(top);
            $('html,body').animate({
                scrollTop: top
            }, 1000);
        });
    });
    setTimeout(function() {
        $('#serviceInfo').fadeOut('fast');
    }, 5000);
});

$(".first__but--but").click(function () {
    $(".first-nav").slideToggle('slow');
});

$(".header--request--open").click(function () {
    $(".head-nav").slideToggle('slow');
});

$(".menu-open-flag").click(function () {
    $(".side-nav").slideToggle('slow');
});

function reloadMap(){
    $('#map').empty();
    var myMap;

    var myGeocoder = ymaps.geocode($(this).val());
    console.log(myGeocoder);
    myGeocoder.done(
        function (res) {
            myMap = new ymaps.Map("map", {
                center: [res.geoObjects.get(0).geometry.getCoordinates()[0], res.geoObjects.get(0).geometry.getCoordinates()[1]],
                zoom: 7
            });

            var i = 0;
            $('.addContent__adress').each(function () {
                var text = $(this).val();
                var objects = ymaps.geoQuery(ymaps.geocode(text));
                objects.addToMap(myMap);
                i = i + 1;
            });
        }
    );
}
