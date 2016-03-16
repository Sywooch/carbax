$(document).ready(function ($) {
    $(document).on('change','#itemImg',function(){
        var path = $('#itemImg').val();
        $('.media__upload_img').html('<img src="' +path + '"/>');
    });

    if($(".view_mark_auto").prop("checked")){
        $('.view_widget_auto').prop('checked',false);
        $('.view_widget_auto').prop('disabled',true);
        $('.view_category_auto').prop('checked',false);
        $('.view_category_auto').prop('disabled',true);

    }
    else{
        $('.view_widget_auto').prop('disabled',false);
        $('.view_category_auto').prop('disabled',false);
    }

    $(document).on('change','.view_mark_auto',function(){
        if($(".view_mark_auto").prop("checked")){
            $('.view_widget_auto').prop('checked',false);
            $('.view_widget_auto').prop('disabled',true);
            $('.view_category_auto').prop('checked',false);
            $('.view_category_auto').prop('disabled',true);

        }
        else{
            $('.view_widget_auto').prop('disabled',false);
            $('.view_category_auto').prop('disabled',false);
        }
    });

    $(document).on('change', '.statusReviews', function(){
        var status = $(this).val();
        var id = $(this).attr('data-id');
        $.ajax({
            type: 'POST',
            url: "/secure/reviews/default/set_status",
            data: 'status=' + status + '&id=' + id,
            success: function (data) {

            }
        });
    });

});
