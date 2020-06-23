$(function () {
    var fx = {
        'initModal': function () {
            if ($('.modal-window').length == 0) {
                $('<div>').addClass('overlay').appendTo('body');
                return $('<div>').addClass('modal-window').appendTo('body');
            } else {
                return $('.modal-window');
            }
        }
    }
    $('.my_mod').click(function () {
        var id = $(this).attr('data-id');
        var modal = fx.initModal();
        $('<a>').attr('href', '#').addClass('modal-close-btn').html('&times;').click(function(){
            $('.overlay').remove();
            modal.remove();
            }
        ).appendTo(modal);
        $.ajax({
            data:'id='+id,
            type:'post',
            url:'/ajax/modal',
            success:function(data){
                modal.append(data);
            },
            error:function(msg){
                console.log(msg);
            }
        });
    });
});
