jQuery(document).ready(function ($){

    if(document.getElementsByClassName('addContent__adress')!==null){//те такие блоки есть
        var address = $('.addContent__adress').val();
        var map = new Map();
        if(address == ''){
            map.mapInit();
        }
        else{
            var address = [];
            var i = 0;
            $('.addContent__adress').each(function () {
                address.push($(this).val());
                i = i + 1;
            });
            map.addToMap(address);
        }
    }


    $(document).on('focusout', '.addContent__adress', function () {
        if($(this).val() != ''){
            var map = new Map();
            $('#map').empty();

            var address = [];
            var i = 0;
            $('.addContent__adress').each(function () {
                address.push($(this).val());
                i = i + 1;
            });
            map.addToMap(address);
        }
    });

});
