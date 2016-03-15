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

function coverBg(){
    var title = $('input[name="cover"]').val();
    $('[title="'+title+'"]').parent().css('box-shadow', '1px 1px 5px 0 #ff6b00');
}

jQuery(document).ready(function ($) {

    $('.fileinput-remove').on('click',function(){
        alert(123);
        $('.photoAuto').val('');
    });

    $(document).on('click','.fileinput-remove',function(){
        alert(123);
        $('.photoAuto').val('');
    });

    $('#saveInfoNoValid').on('click', function(){
        e.preventDefault();
        if(document.getElementsByClassName('hasEdit').length > 0){
            $('#addForm').submit();
        }
        else {
            $('#input-5').fileinput('upload');
        }
    });

    //Загрузка изображений
    $('#saveInfo').on('click', function(e){
        e.preventDefault();
        if($('#addForm')[0].checkValidity()){
            if(document.getElementsByClassName('hasEdit').length > 0){
                $('#addForm').submit();
            }
            else {
                $('#input-5').fileinput('upload');
            }

        }
        else {
            $('#addForm :input:visible[required="required"]').each(function()
            {
                if(!this.validity.valid)
                {
                    $(this).focus();
                    $(this).addClass('errorInput');
                    // break
                    return false;
                }
            });
            /*$('#addForm :input:visible[pattern="[0-9]"]').each(function()
            {
                if(!this.validity.valid)
                {
                    $(this).focus();
                    $(this).addClass('errorInput');
                    // break
                    return false;
                }
            });*/
        }
    });
    $('#input-5').on('filedeleted', function(event, key) {
        //alert(123);
    });

    $('#input-5').on('filebatchselected', function(event, files) {
        $('.hasEdit').removeClass('hasEdit');
    });

    $('#input-5').on('filebatchuploadsuccess', function(event, data, previewId, index) {
        $('#addForm').submit();
    });

    $(document).on('focusout', '.errorInput', function(){
        $(this).removeClass('errorInput');
    });
    //Загрузили


    /*выбор главного изображения*/
    $(document).on('click', '.file-preview-frame', function(){
        var img = $(this).children('.file-preview-image');
        var imgName = img.attr('title');
        console.log(img);

        $(this).css('box-shadow', '1px 1px 5px 0 #ff6b00');
        $('.file-preview-frame').not($(this)).css('box-shadow', '1px 1px 5px 0 #a2958a');

        if(!$('input[name="cover"]').length){
            $('#prodType').after('<input type="hidden" name="cover" value="'+imgName+'">');
        }else{
            $('input[name="cover"]').val(imgName);
        }


        //console.log(imgName);
    });
    /*выбор главного изображения*/

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


    if($('span').hasClass('img_link')){
        var allImg = [];
        $('.img_link').each(function(){
            allImg.push('<img src="/'+ $(this).attr('data-img') +'" class="file-preview-image" title="'+ $(this).attr('data-img') +'">');
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
        coverBg();
    }
    if($("#input-4").length){
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

    $(document).on('change', '.selectAutoNew', function(){
        $(this).nextAll().remove();
        var step = $(this).attr('step');
        var val = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_auto_new",
            data: 'val=' + val + '&step=' + step,
            success: function (data) {
                $('#selectAutoNew').append(data);
            }
        });
    });

    $(document).on('change', '#selectAutoWidget', function(){
        $(this).nextAll().remove();
        var id = $(this).val();
        var type = $(this).attr('type');
        var view = $('.selectCar').attr('data-view');
        var brand_id = $('.brand_select_car').find(':selected').val();
        var year = $('.year_select_car').find(':selected').val();
        //regionSearchalert(view);
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_auto",
            data: 'id=' + id + '&type=' + type + '&view=' + view + '&brandId=' + brand_id + '&year=' + year ,
            success: function (data) {
                $('.selectCar').append(data);
            }
        });
        if(type == 'typeAuto' && view == 0){
            $.ajax({
                type: 'POST',
                url: "/ajax/ajax/get_auto_params",
                data: 'id=' + id ,
                success: function (data) {
                    $('.auto-params').html(data);
                }
            });
        }

    });


    $(document).on('click','.fleamarket__user_tel',function(){
        var user_id = $(this).attr('user-id');
        $('.info').css('display','block');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_tel_user",
            data: 'id=' + user_id,
            success: function (data) {
                $('.fleamarket__user_tel').html(data);
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

   $(document).on('click', '.link-request-type', function(){
    var id = $(this).attr('data-id');
        //alert(id);
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_request_type",
            data: 'id=' + id,
            success: function (data) {
                $('.my-request').html(data);
            }
        });
        return false;
    });

    $(document).on('click','.raply',function(){
        $('#raply').modal('show');
        var type = $(this).attr('type-request');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_raply",
            data: 'type=' + type,
            success: function (data) {
                $('.my-raply').html(data);
            }
        });
        return false;
    });

    $(document).on('click','.reset_request',function(){
        var id = $(this).attr('id');
        $(this).parent().html('Заявка отправленна');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/reset_request",
            data: 'id=' + id,
            success: function (data) {
                //$(this).html(data);
               // console.log(data);
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

    $(document).on('click', '#selectAutoFromGarage', function(){
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_garage",
            data: 'action=garage',
            success: function (data) {
                $('.selectCar').html(data);
            }
        });
        return false;
    });

    $('#selectAutoFromGarage').on('click', function(){
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_garage",
            data: 'action=garage',
            success: function (data) {
                $('.selectCar').html(data);
            }
        });
        return false;
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

    $(document).on('change', '#selectGarage', function(){
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_hidden_auto",
            data: 'id=' + id,
            success: function (data) {
                $('#hiddenInputs').html(data);
            }
        });
        var prodType = $('#prodType').val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_category_select",
            data: 'type=' + prodType,
            success: function (data) {
                $('.selectCarAutoWidget').append(data);
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
        //console.log(id);
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

    $('#selectAutoFromGarage').on('click', function(){
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_garage",
            data: 'user=user',
            success: function(data){
                $('#selectAuto').html(data);
            }
        });

        return false;
    });

    $(document).on('change','#selectCityWidget', function(){
        var printAddress = $('#addressBoxWidget').attr('print-address');
        if(printAddress == '1'){
            $('#addressBoxWidget').html('<input class="addContent__adress" id="inputAddressWidget" type="text" placeholder="Адрес">')
        }
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
        var serviceTypeid = $('#service_type_id').val();
        //console.log(serviceTypeid);
        //console.log(cityId);
        if(isNaN(regionId) || cityId == '' || address == ''){
            alert("Необходимо заполнить все поля");
            return false;
        }else {
            $('#' + active).val(region + ', г. ' + city + ', ' + address);
            if (document.getElementById(active + '_region') !== null) {
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
                address.push({
                    address: $(this).val(),
                    balloon: {
                        title: region + ' ' + city,
                        address: address,
                        serviceTypeId: serviceTypeid
                    }
                });
                //address.push($(this).val());
                i = i + 1;
            });
            map.addToMap(address, false);

            $('#inputAddressWidget').val('');
        }
    });

    $('#addAddress').on('click', function () {
        var count = parseInt($('#addressCount').attr('count'), 10);
        count = count + 1;
        $('#addressCount').attr('count', count);

        $('<a href="#nowhere" id="delAddress" class="addContent__adress-add">-</a><input type="text" name="address[' + count + '][title]" class="addContent__adress addressEvent" id="address_' + count + '" placeholder="Адрес автосервиса">').insertBefore('#firstAddress');
    });
    $('#addContentPhone').on('click', function () {
        $('<a href="#nowhere" id="delPhone" class="addContent__cont-add">-</a><div class="cleared"></div><label for="phonenumber_last"></label><input type="text" class="addContent__cont service_phone" name="phoneNumber[]">').insertBefore('#firstPhone');
        $(".service_phone").mask("+7 (999) 999-9999");
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

    $(document).on('change','.typeAuto',function(){
        var type = $(this).val();
        if($(this).prop('checked')) {
            $.ajax({
                type: 'POST',
                url: "/ajax/ajax/get_select_auto",
                data: 'type=' + type,
                success: function (data) {
                    if(type == 1){
                        $('.selectCar').html(data);
                    }
                    if(type == 2){
                        $('.selectCargoCar').html(data);
                    }
                    if(type == 3){
                        $('.selectMoto').html(data);
                    }
                   // $('.selectBrand').html(data);
                }
            });
        } else {
            if(type == 1){
                $('.selectCar').html('');
            }
            if(type == 2){
                $('.selectCargoCar').html('');
            }
            if(type == 3){
                $('.selectMoto').html('');
            }
        }
    });

    $(document).on('change','.regionSearch',function(){
        var regionId = $('.regionSearch').val();
        $('.filter__searchline--search').css({width:'195px'});
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_select_city",
            data: 'reg=' + regionId,
            success: function (data) {

                 $('.citySearch').html(data);
            }
        });
    });

    $(document).on('change','.typeAutoSearch',function(){
        $('.SearchSelectYear').html('');
        $('.TofCateg').html('');
        var typeProduct = $('.prodTypeSearch').find(':selected').val();
        var typeAuto = $('.typeAutoSearch').val();
        $(this).nextAll().remove();
        //alert(typeProduct);
        if(typeProduct == 1){
            $.ajax({
                type: 'POST',
                url: "/ajax/ajax/show_widget_categ",
                data: 'type=' + typeAuto,
                success: function (data) {
                    $('.paramsSearch').append(data);
                }
            });
        }else {
            $.ajax({
                type: 'POST',
                url: "/ajax/ajax/get_select_brand_auto",
                data: 'type=' + typeAuto,
                success: function (data) {
                    $('.paramsSearch').append(data);
                }
            });
        }
    });

    $(document).on('change','.brandAutoSearch',function(){
        /*$('.SearchSelectYear').html('');*/
        var idBrand = $('.brandAutoSearch').val();
        var typeAuto = $('.typeAutoSearch').find(':selected').val();
        //$(this).next().remove();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_select_model",
            data: 'type=' + typeAuto + '&idBrand=' + idBrand,
            success: function (data) {
                //$(' + data + ').insertAfter($('.brandAutoSearch'));
                $('.modelSearch').html(data);
            }
        });
    });

    $(document).on('change','.motoTypeSearch',function(){
        $('.SearchSelectYear').html('');
        var cat = $('.motoTypeSearch').val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_select_brand_moto",
            data: 'cat=' + cat,
            success: function (data) {

                $('.motomodelSearch').html(data);
            }
        });
    });

    $(document).on('click','a.fleamarket__ads__item--desc--star',function(){
        var productId = $(this).attr('product_id');
        if($(this).hasClass('delFavorites')){
            $(this).removeClass('delFavorites');
            $(this).attr('title','Добавить в избранное');
        }else{
            $(this).addClass('delFavorites');
            $(this).attr('title','Убрать из избранного');
        }

        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/add_favorites",
            data: 'productid=' + productId,
            success: function (data) {


            }
        });
    });

    $(document).on('click','a.favorites_products',function(){
        var productId = $(this).attr('product_id');
        if($(this).hasClass('del_favorites')){
            $(this).removeClass('del_favorites');
            $(this).text('В избранное');
        }else{
            $(this).addClass('del_favorites');
            $(this).text('Из избранного');
        }

        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/add_favorites",
            data: 'productid=' + productId,
            success: function (data) {


            }
        });
        return false;
        //alert(productId);
    });

    $(document).on('click','.radioTypeSelect',function(){
        var radio = $('input[name=radio_type_product]:checked').val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/view_widget",
            data: 'type=' + radio,
            success: function (data) {
                $('.view_widget').html(data);
            }
        })
    });

    $(document).on('change','.prodTypeSearch',function(){
        var prodType = $('.prodTypeSearch').val();
        $('.TofCateg').html('');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/show_params",
            data: 'type=' + prodType,
            success: function (data) {
                $('.paramsSearch').html(data);
            }
        })

    });

    //Шаблон телефона

    $("#user_telephon").mask("+7 (999) 999-9999");
    $(".service_phone").mask("+7 (999) 999-9999");
    $("#dateStart").mask("99/99/9999");

    /*//Шаблон сайта
    $(".service_website").mask("http://!**********************************************************************************");*/
    $(document).on('click','.service_website', function(){
        $(this).val('http://');
    } );
    //Запрет ввода букв в поле "Цена"
    if(document.getElementById('addPrice') || document.getElementById('probeg') || document.getElementById('summaStrah')) {
        document.getElementById("addPrice").onkeypress = function (event) {
            event = event || window.event;
            if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                return false;
        };
        document.getElementById("probeg").onkeypress = function (event) {
            event = event || window.event;
            if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                return false;
        };
        document.getElementById("summaStrah").onkeypress = function (event) {
            event = event || window.event;
            if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                return false;
        };
    }
    if(document.getElementById('run')) {
        document.getElementById("run").onkeypress = function (event) {
            event = event || window.event;
            if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                return false;
        };
    }
    if(document.getElementById('run')) {
        document.getElementById("user_isq").onkeypress = function (event) {
            event = event || window.event;
            if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                return false;
        };
    }

    if(document.getElementsByClassName('number')){

        document.getElementsByClassName("number").onkeypress = function (event) {
            event = event || window.event;
            if (event.charCode && (event.charCode < 48 || event.charCode > 57))// проверка на event.charCode - чтобы пользователь мог нажать backspace, enter, стрелочку назад...
                return false;
        };
    }

    $(document).on('click','.addAddressMarket',function(){
        if($(".addAddressMarket").prop("checked")){
            $('.addAddressMarketInp').html('<input type="text" name="address" class="addContent__title">');
        }else{
            $('.addAddressMarketInp').html('');
        }
    });

    /*$(document).bind('input', '#itemImg',function(){
        alert("Hello");
    });*/

    $(document).on('click', '.deals__menu--service', function(){
        var serviceTypeId = $(this).attr('serviceTypeId');
        if(serviceTypeId != '0'){
            $('#allOffers').attr('href','/offers/offers/all_offers?id=' + serviceTypeId);
        }
        else{
            $('#allOffers').attr('href','/offers/offers/all_offers');
        }


        $('.deals__menu--service').removeClass('deals__menu--active');
        $(this).addClass('deals__menu--active');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/show_offers",
            data: 'serviceTypeId=' + serviceTypeId,
            success: function (data) {

                $('.deals__line').html(data);
            }
        });

        return false;
    });

    $(document).on('change', '.selectSrviceId', function(){
        var serviceId = $('.selectSrviceId').val();
        //alert(serviceId);
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_service_type_id",
            data: 'serviceId=' + serviceId,
            success: function (data) {
                $('.service_type_id').val(data);
            }
        });
    });


        $('div.filter__map--checklist').hover(function() {
            // Animate out when hovered, stopping all previous animations
            $(this)
                .stop(true, false)
                .animate({
                    right: 0
                }, 400);
            $('.hide_filter__map--checklist').css('display','none');
        }, function() {
            // Animate back in when not hovered, stopping all previous animations
            $(this)
                .stop(true, false)
                .animate({
                    right: -230
                }, 400);
            $('.hide_filter__map--checklist').css('display','block');
        });
    $(document).on('click', '.show_video', function(){
        $('#video').modal('show');
        return false;
    });

    $(document).on('change','#offers-old_price',function(){
        var oldPrice = $(this).val();
        var newPrice = $('#offers-new_price').val();
        var discount = Math.round(newPrice*100/oldPrice);
        $('#offers-discount').val(100 - discount);
    });

    $(document).on('change','#offers-new_price',function(){
        var oldPrice = $('#offers-old_price').val();
        var newPrice = $(this).val();
        var discount = Math.round(newPrice*100/oldPrice);
        $('#offers-discount').val(100 - discount);
    });

    $(document).on('change', '.servId', function(){
        var servicesId = '';
        $('.servId:checked').each(function(){
            servicesId = servicesId + $(this).val() + ',';
        });
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_address_services",
            data: 'servicesId=' + servicesId,
            success: function (data) {
                //console.log(data);
                $('.selectAddressForServices').html(data);
            }
        });

        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_info_services",
            data: 'servicesId=' + servicesId,
            success: function (data) {
                console.log(data);
                $('.addressToServises').html(data);
            }
        });
        return false;
    });

    $(document).on('click','.typeAutoRequest',function(){
        $(".requestYear").css('display','block');
        $('#selectAutoGarage').html('');
        $('.typeAutoRequest').prop('checked', false);
        $(this).prop('checked', true);
    });

    $(document).on('click','#a',function(){
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_select_car",
            data: '',
            success: function (data) {

                $('.requestManufacture').html(data);
            }
        });
    });

    $(document).on('click','#g',function(){
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_select_cargo",
            data: '',
            success: function (data) {

                $('.requestManufacture').html(data);
            }
        });
    });

    $(document).on('click','#b',function(){
        $(".requestYear").css('display','none');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_select_moto",
            data: '',
            success: function (data) {

                $('.requestManufacture').html(data);
            }
        });
    });

    $(document).on('change', '.requestMarkAuto', function(){
        var typeAuto = $(".typeAutoRequest:checked").val();
        var brandId = $(".requestMarkAuto option:selected").val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_model_auto",
            data: 'typeAuto=' + typeAuto + '&brandId=' + brandId,
            success: function (data) {
                console.log(data);
                $('.requestModelAuto').html(data);
            }
        });
    });

    $(document).on('change', '.requestModelAuto', function(){
        var typeAuto = $(".typeAutoRequest:checked").val();
        var brandId = $(".requestMarkAuto option:selected").val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_year_auto",
            data: 'typeAuto=' + typeAuto + '&brandId=' + brandId,
            success: function (data) {
                console.log(data);
                $('.requestYear').html(data);
            }
        });
    });

    $(document).on('click','.selectAutoGarage',function(){
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/select_auto_garage",
            data: '',
            success: function (data) {

                $('#selectAutoGarage').html(data);
            }
        });
        return false;
    });

    $(document).on('change', '.selAutoGarage', function(){
        $('.typeAutoRequest').prop('checked', false);
        $(".requestYear").css('display','block');
        $(".requestMarkAuto :last").remove();
        $(".requestModelAuto :last").remove();
        $(".requestYear :last").remove();
        var idAuto = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_auto_params_auto",
            data: 'id=' + idAuto,
            success: function (data) {
                var params = JSON.parse(data);
                //Если легковой
                if(params.autoWidget.auto_type == 1){
                    $('#a').prop('checked', true);
                }
                //если грузовой
                if(params.autoWidget.auto_type == 2){
                    $('#g').prop('checked', true);
                }

                //если мото
                if(params.autoWidget.auto_type == 3){
                    $('#b').prop('checked', true);
                    $(".requestYear").css('display','none');
                }
                $("select.requestMarkAuto").append( $('<option selected value="' + params.autoWidget.brand_id + '">' + params.autoWidget.brand_name +'</option>'));
                $("select.requestModelAuto").append( $('<option selected value="' + params.autoWidget.model_id + '">' + params.autoWidget.model_name +'</option>'));
                $("select.requestYear").append( $('<option selected value="' + params.autoWidget.year + '">' + params.autoWidget.year +'</option>'));

                $('.probeg').val(params.autoParams.run);
                $('.vincodeauto').val(params.autoParams.vin);

                $('#kpp' + params.autoParams.transmission).prop('checked', true);
                $('#dvs' + params.autoParams.type_motor).prop('checked', true);
                $('#bodyAuto' + params.autoParams.body_type).prop('checked', true);
                //console.log(params.autoParams);
                //$('#selectAutoGarage').html(data);
            }
        });
        return false;
    });

    $(document).on('click','.requestBodyType',function(){
        /*$(".requestYear").css('display','block');
        $('#selectAutoGarage').html('');*/
        $('.requestBodyType').prop('checked', false);
        $(this).prop('checked', true);
    });

    $(document).on('click','.typeAutoAutosalon',function(){
        var type = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_auto_brand",
            data: 'id=' + type,
            success: function (data) {
                $('.manufactureRequest').html(data);
            }
        });

    });

    $(document).on('click', '.allBrands', function(){
        $('.allBrands').css('display','none');
        $('.hiddenBrand').css('display','block');
        return false;
    });

    $(document).on('click', '.add_zap_plus', function(){
        $(this).text('-');
        $(this).next().remove('.add_zap_del');
        $(this).removeClass('add_zap_plus');
        $(this).addClass('add_zap_del');
        $("<div class='mileage'><div class='mileage_wr'><p class='parag_text'>Укажите наименование запчасти:</p><input class='mileage__next' name='name_zap[]' placeholder='Наименование запчасти'> </div> <div class='mileage_wr'> <p class='parag_text'>Укажите номер детали (если знаете):</p> <input class='mileage__next' name='kod_zap[]' placeholder='Введите код'> </div> <div class='save_plus'> <span class='add_zap add_zap_plus'> + </span><span class='add_zap add_zap_del'> - </span></div></div>").insertBefore('.infoZap');
    });

    $(document).on('click', '.add_zap_del', function(){
        $(this).parent().parent().remove();
        if($(this).prev().hasClass('add_zap_plus')){
            var elem = $('.mileage:last').children(".save_plus").children(".add_zap_del");

            //console.log(elem);
            $("<span class='add_zap add_zap_plus'> + </span>").insertBefore(elem);
        }
        var count = $(".add_zap_del").length;
        if(count == 1){
            $('.add_zap_del').remove();
        }

    });


    $(document).on('click', '.add_infoDriver', function(){
        var count =  $('#driveinfo').attr('data-count');
        count++;
        $("<div class='driveInfoWr'><hr class='separator'><div class='save_plus--sm save_plus--sm--del'><span class='del_infoDriver'> - </span> </div>" +
            "<div class='mileage_sm'>" +
          "<p class='parag_text'>Возраст, лет:</p><input class='mileage__next' name='driveInfo[" + count + "][year]' placeholder='Введите'></div><div class='mileage_sm'><p class='parag_text'>Стаж, лет:</p>" +
          "<input class='mileage__next' name='driveInfo[" + count + "][stag]' placeholder='Введите'></div><div class='mileage_sm'><p class='parag_text'>Или дата рождения:</p>" +
          "<input class='mileage__next--sm' name='driveInfo[" + count + "][datarozgd][]]' placeholder='ДД'><input class='mileage__next--sm' name='driveInfo[" + count + "][datarozgd][]' placeholder='ММ'>" +
          "<input class='mileage__next--sm' name='driveInfo[" + count + "][datarozgd][]' placeholder='ГГГГ'></div><div class='mileage_sm'><p class='parag_text'>Или дата получения:</p>" +
          "<input class='mileage__next--sm' name='driveInfo[" + count + "][datapol][]' placeholder='ДД'><input class='mileage__next--sm' name='driveInfo[" + count + "][datapol][]' placeholder='ММ'>" +
          "<input class='mileage__next--sm' name='driveInfo[" + count + "][datapol][]' placeholder='ГГГГ'></div><div class='select_type__driver'> <p class='parag_text'>Пол:</p>" +
          "<select class='select_type__driver--sel' name='driveInfo[" + count + "][pol]'><option value=''>Выберите</option><option value='Мужской'>Мужской</option><option value='Женский'>Женский</option>" +
          "</select></div><div class='select_type__driver'><p class='parag_text'>Семейное положение:</p><select class='select_type__driver--sel' name='driveInfo[" + count + "][pologenie]'>" +
          "<option value=''>Выберите</option><option value='Женат/Замужем'>Женат/Замужем</option><option value='Холост'>Холост</option></select></div>" +
          "<div class='select_type__driver'><p class='parag_text'>Дети:</p><select class='select_type__driver--sel' name='driveInfo[" + count + "][deti]'><option value=''>Выберите</option>" +
          "<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='более'>более</option></select></div></div>" +
          "<div class='cleared'></div>").insertBefore('#driveinfo');

        $('#driveinfo').attr('data-count', count);
    });

    $(document).on('click', '.del_infoDriver', function(){
        $(this).parent().parent().remove();
    });

    $(document).on('click', '#driveboch', function(){
        if($(this).prop("checked") == true) {
            $('.save_plus--sm--wr').css('display','none');
            $('.driveInfoWr').css('display','none');
        } else {
            $('.save_plus--sm--wr').css('display','block');
            $('.driveInfoWr').css('display','block');
        }
    });


    $(".menu-open-flag").click(function () {
        $(".side-nav").slideToggle('slow');
    });

    $(".header--request--open").click(function () {
        $(".head-nav").slideToggle('slow');
    });

    $(".first__but--but").click(function () {
        $(".first-nav").slideToggle('slow');
    });

    $(document).on('click', '.offers_attend', function(){
        var decison = $(this).attr('decison');
        var offersId = $(this).attr('offersId');
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_attend_decison",
            data: 'decison=' + decison + '&offersId=' + offersId,
            success: function (data) {
                //console.log(data.decisonY);
                var count = JSON.parse(data);

                $('.decisonY').text(count.decisonY);
                $('.decisonN').text(count.decisonN);

                //$('.manufactureRequest').html(data);
            }
        });
        return false;
    });

    $(document).on('click', '.addressId', function(){
        var address = [];
        $('.addressId:checked').each(function(){
            address.push([$(this).next().text(),$(this).attr('serviceTypeId')]);
        });
        var map = new Map({element:'mapOffers'});
        var add = [];
        address.forEach(function(item, i, arr){
            add.push({
                address:item[0],
                balloon: {
                    serviceTypeId:item[1],
                    title:item[0],
                    hintContent:item[0]
                }
            });
        });
        $('#mapOffers').empty();
        map.addToMap(add,false);

        console.log(add);
    });



    if($(".addressToMap").length>0) {
        var address = [];
        $('.addressToMap').each(function () {
            address.push([$(this).text(), $(this).attr('serviceTypeId')]);
        });

        var map = new Map({element: 'mapOffers'});
        var add = [];
        address.forEach(function (item, i, arr) {
            add.push({
                address: item[0],
                balloon: {
                    serviceTypeId: item[1],
                    title: item[0],
                    hintContent: item[0]
                }
            });
        });
        $('#mapOffers').empty();
        map.addToMap(add, false);
        //console.log($(this).text());
    }
});






