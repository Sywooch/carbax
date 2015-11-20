$(document).ready(function ($) {
    function singleClick(e,key) {
        if(key == true){
            $(this).addClass('curent');
        }
        else{
            $('*').removeClass('curent');
            $(this).addClass('curent');
        }
        return false;
    }

    function doubleClick(e, path) {
        $('#media__path_upload').val(path);
        if(path === undefined){
            return;

        }else{
            $.ajax({
                type: 'POST',
                url: "/secure/media/default/print_dir",
                data: 'path=' + path,
                success: function (data) {
                    $('.media-default-index').html(data);

                }
            });
            return false;
        }

    }


    $(document).on('click', '.dir', function (e) {
        var that = this;
        var path = $(this).attr('path');
        $('.media_panel').data("path", path);
        if(event.ctrlKey == true){
            var key = true;
        }
        setTimeout(function () {
            var dblclick = parseInt($(that).data('double'), 10);
            if (dblclick > 0) {
                $(that).data('double', dblclick - 1);

            } else {
                singleClick.call(that, e, key);
            }
        }, 300);
        return false;
    }).dblclick(function (e) {
        $(this).data('double', 2);
        var path = $('.media_panel').data("path");
        doubleClick.call(this, e, path);
    });

    $(document).on('click', '.file', function () {
        if(event.ctrlKey == true){
            var key = true;
        }
        if(key == true){
            $(this).addClass('curent');
        }
        else{
            $('*').removeClass('curent');
            $(this).addClass('curent');
        }
        return false;
    });

    $(document).on('click', '.media__creat_folder', function () {
        var nameFolder = $('.media__name_folder').val();
        var path = $(this).attr('pathFolder');
        $.ajax({
            type: 'POST',
            url: "/secure/media/default/new_folder",
            data: 'path=' + path + '&namefolder=' + nameFolder,
            success: function (data) {
                $('.media-default-index').html(data);
            }
        });
        $('.bs-example-modal-sm').modal('hide');
        $('.media__name_folder').val('');
        return false;
    });

    $(document).on('click', '.media_ago', function () {
        var path = $(this).attr('pathfolder');
        $.ajax({
            type: 'POST',
            url: "/secure/media/default/print_dir",
            data: 'path=' + path,
            success: function (data) {
                $('.media-default-index').html(data);
            }
        });
        return false;
    });



        $(document).on('mousedown','.dir',function (event) {
            $("body").on("contextmenu", false);
            $('*').removeClass('selected-html-element');
            var path = $(this).attr('path');
            $('.context-menu').remove();
            if (event.which === 3) {
                $('.dir').each(function(){
                    $(this).removeClass('curent');
                });
                $(this).addClass('curent');
                var target = $(event.target);
                target.addClass('selected-html-element');
                $('<div/>', {class: 'context-menu'}).css({
                    left: event.pageX + 'px',
                    top: event.pageY + 'px'
                }).appendTo('body').append($('<ul/>').append('<li><a class="media__remove_dir" path="'+path+'" href="#">Переименовать</a></li>').append('<li><a class="media_del" href="#">Удалить</a></li>')).show('slow');
            }
        });

    $(document).on('mousedown','.file',function (event) {

        $("body").on("contextmenu", false);
        $('*').removeClass('selected-html-element');
        var path = $(this).attr('path');
        $('.context-menu').remove();
        if (event.which === 3) {
            $('*').removeClass('curent');
            $(this).addClass('curent');
            var target = $(event.target);
            target.addClass('selected-html-element');
            $('<div/>', {class: 'context-menu'}).css({
                left: event.pageX + 'px',
                top: event.pageY + 'px'
            }).appendTo('body').append($('<ul/>').append('<li><a class="media_del" href="#">Удалить</a></li>')).show('slow');
        }
    });


    $(document).on('click','.media_del',function(){
       if($('.dir').hasClass('curent')){
           $('.curent').each(function(){
               var path = $(this).attr('path');
               $.ajax({
                   type: 'POST',
                   url: "/secure/media/default/remove_dir",
                   data: 'path=' + path,
                   success: function (data) {
                       $('.media-default-index').html(data);
                   }
               });

           });

       }
       if($('.file').hasClass('curent')){
           $('.curent').each(function(){
               var path = $(this).attr('path');
               $.ajax({
                   type: 'POST',
                   url: "/secure/media/default/remove_dir",
                   data: 'path=' + path,
                   success: function (data) {
                       $('.media-default-index').html(data);
                   }
               });
           });


       }

    });

    $(document).on('click','.maedia__uploadFiles',function(){
        var path = $("#media__path_upload").val();
        $.ajax({
            type: 'POST',
            url: "/secure/media/default/print_dir",
            data: 'path=' + path,
            success: function (data) {
                $('.media-default-index').html(data);
                $(this).modal('hide');
            }
        });
    });

    $(document).on('click','.media__remove_dir',function(){
        var path = $(this).attr('path');
        var nameFolder = path.split('/');
        var count = nameFolder.length;
        $('.media__rename_folder').val(nameFolder[count-2]).attr('path',path);
        $('.bs-example-modal-sm-rename').modal('show');
        return false
    });

    $(document).on('click','.media__rename__folder',function(){
        var path = $('.media__rename_folder').attr('path');
        var nameFolder = $('.media__rename_folder').val();
        $.ajax({
            type: 'POST',
            url: "/secure/media/default/rename_dir",
            data: 'path=' + path + '&namefolder=' + nameFolder,
            success: function (data) {
                $('.media-default-index').html(data);
            }
        });
        $('.bs-example-modal-sm-rename').modal('hide');
        return false;
    });

    $(document).on('click','.wrap',function(){
        $('*').removeClass('curent');
        $('*').removeClass('selected-html-element');
        $('.context-menu').hide('slow');
    });

    $(document).on('click','.modal',function(){
        $('*').removeClass('curent');
        $('*').removeClass('selected-html-element');
        $('.context-menu').hide('slow');
    });

    $(document).on('click','.dirAddress',function(){
        var path = $(this).attr('path');
        $.ajax({
            type: 'POST',
            url: "/secure/media/default/print_dir",
            data: 'path=' + path,
            success: function (data) {
                $('.media-default-index').html(data);

            }
        });
        return false;
    });

    $(document).on('click','.select_img',function(){
        var path = $('.curent').attr('pathFile');
        $('.media__upload_img').html('<img src="/secure/' + path + '"/><input id="mediaUploadInputFile" name="mediaUploadInputFile" type="hidden" value="'+path+'"/>');
    });
});
