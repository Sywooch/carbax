$(document).ready(function(){
    $(document).on('change', '.filterServicesRegion', function(){
        //Показываем города выбранного региона
        var idReg = $(this).val();
        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/get_filter_city",
            data: 'idReg=' + idReg,
            success: function (data) {
                $('.FilterCity').html(data);
            }
        });

       filterCount();

    });
    $(document).on('change', '.filterServicesCity', function(){
        filterCount();
    });

    $(document).on('click', '.checkTypeServ', function(){
        filterCount();
    });

});


function filterCount(){

    setTimeout(function(){
        var idReg;
        var idCity;

        if($(".filterServicesRegion").val()){
            idReg = $('.filterServicesRegion').val();
        }

        if($(".filterServicesCity").val()){
           idCity = $('.filterServicesCity').val();
        }

        var type = '';
        $('.checkTypeServ').each(function(){
            if($(this).prop('checked')){
                type += $(this).val() + ',';
            }
        });


        $.ajax({
            type: 'POST',
            url: "/ajax/ajax/filtercount",
            data: 'idReg=' + idReg + '&idCity=' + idCity + '&typeId=' + type,
            success: function (data) {
                $('.resultValueFilter').html(data);
            }
        });

        $('.showResultFilter').attr('href','?idReg=' + idReg + '&idCity=' + idCity + '&typeId=' + type);
    },1000);
}
