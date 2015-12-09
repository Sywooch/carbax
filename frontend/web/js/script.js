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


    if($('span').hasClass('img_link')){
        var allImg = [];
        $('.img_link').each(function(){
            allImg.push('<img src="/'+ $(this).attr('data-img') +'" class="file-preview-image">');
        });
        $("#input-4").fileinput({
            language: "ru",
            showCaption: true,
            maxFileCount: 5,
            showRemove: false,
            showUpload: false,
            multiple: true,
            initialPreview: allImg
        });
    }



    (function($) {
        $(function() {
            jQuery('#listColumn').columnize({
                columns: 4,
                min: 2
            });
        })
    })(jQuery)

    $(document).on('change', '#selectAutoWidget', function(){
        $(this).nextAll().remove();
        var id = $(this).val();
        var type = $(this).attr('type');

        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_auto",
            data: 'id=' + id + '&type=' + type,
            success: function (data) {
                $('.selectCar').append(data);
            }
        });

    });

    $(document).on('change', '#selectRegionWidgetEdit', function(){
        $(this).nextAll().remove();
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_city_select",
            data: 'id=' + id ,
            success: function (data) {
                $('.regionWidgetBox').append(data);
            }
        });
    });

    $(document).on('click', '#changeRegion', function(){
        $('#hiddenRegionId').remove();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_region_select",
            data: 'get=region',
            success: function (data) {
                $('.regionWidgetBox').html(data);
            }
        });
        return false;
    });

    $(document).on('change', '.catSel', function(){
        $(this).nextAll().remove();
        if($(this).hasClass('firstCatSel')){
            var cat_id = 10001;
        }
        else {
            var cat_id = $(this).val();
        }
        $.ajax({
            type: 'POST',
            url: "/flea_market/default/get_cat",
            data: 'cat_id=' + cat_id,
            success: function (data) {
                $('#categoryBox').append(data);
            }
        });
    });

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

    $(document).on('change', '#typeSelect', function(){
        var prodType = $('#prodType').val();
        if(prodType == 'zap'){
            $.ajax({
                type: 'POST',
                url: "/flea_market/default/get_categ",
                data: 'type_id=' + $(this).val(),
                success: function (data) {
                    $('#categBox').html(data);
                }
            });
        }
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

    $('.updateCat').on('click',function(){
        $('.categoryProduct').remove();
        $.ajax({
            type: 'POST',
            url: "/flea_market/default/show_cat",
            success: function(data){
                $('#parent').html(data);
            }
        });
        return false;
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
        var id = $(this).prev().attr('id');
        console.log(id);
        $(this).prev().remove();
        $(this).remove();
        $('#' + id + '_region').remove();
        $('#' + id + '_city').remove();

        /*var count = parseInt($('#addressCount').attr('count'), 10);
        count = count - 1;
        $('#addressCount').attr('count', count);*/

        $('#map').empty();
        var myMap;

        var myGeocoder = ymaps.geocode($('.addContent__adress').val());
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

    $('#selectRegionWidget').on('change', function(){
        var region = $(this).val();
        $('#addressBoxWidget').html('');
        $.ajax({
            type: 'POST',
            url: "/services/services/get_city_select",
            data: 'region=' + region,
            success: function(data){
                $('#cityBoxWidget').html(data);
            }
        });
    });

    $(document).on('change','#selectCityWidget', function(){
        $('#addressBoxWidget').html('<input id="inputAddressWidget" type="text" placeholder="Адрес">')
    });

    $(document).on('click', '.addressEvent', function(){
        var active = $('#addressCount').attr('active-id', $(this).attr('id'));
        $('#myModal').modal('show');
    });

    $('#addAddressTo').on('click', function(){
        var region = $('#selectRegionWidget option:selected').text();
        var regionId = $('#selectRegionWidget option:selected').val();
        var city = $('#selectCityWidget option:selected').text();
        var cityId = $('#selectCityWidget option:selected').val();
        var address = $('#inputAddressWidget').val();
        var active = $('#addressCount').attr('active-id');
        var count = parseInt($('#addressCount').attr('count'), 10);

        $('#' + active).val(region + ', г. ' + city + ', ' + address);
        if(document.getElementById(active + '_region')!==null) {
            $('#' + active + '_region').remove();
            $('#' + active + '_city').remove();
        }
        $('#addressCount').append('<input type="hidden" id="' + active + '_region" name="address[' + count + '][regionId]" value="' + regionId + '">');
        $('#addressCount').append('<input type="hidden" id="' + active + '_city" name="address[' + count + '][cityId]" value="' + cityId + '">');

        var map = new Map();
        $('#map').empty();

        var address = [];
        var i = 0;
        $('.addContent__adress').each(function () {
            address.push($(this).val());
            i = i + 1;
        });
        map.addToMap(address, false);

        $('#inputAddressWidget').val('');
    });

    $('#addAddress').on('click', function () {
        var count = parseInt($('#addressCount').attr('count'), 10);
        count = count + 1;
        $('#addressCount').attr('count', count);

        $('<a href="#nowhere" id="delAddress" class="addContent__adress-add">-</a><input type="text" name="address[' + count + '][title]" class="addContent__adress addressEvent" id="address_' + count + '" placeholder="Адрес автосервиса">').insertBefore('#firstAddress');
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

