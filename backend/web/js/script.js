$(document).ready(function ($) {
    $(document).on('change','#itemImg',function(){
        var path = $('#itemImg').val();
        $('.media__upload_img').html('<img src="' +path + '"/>');
    });
});
