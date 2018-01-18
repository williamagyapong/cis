$(document).ready(function(){

    $('.mark').click(function() {
        handle = $(this);
        counter = handle.data('counter');
        status = handle.data('status');
        at = handle.data('at');
        url = handle.data('url');
        presentClass = 'w3-text-green';
        absentClass = 'w3-text-red';
        presentHtml = ' <i class="fa fa-check"></i>';
        absentHtml = '<i class="fa fa-remove"></i> ';
        statusBtn = $('#status'+counter);
        $.post(url,{'status':status,'at':at},function(data){
            console.log(data)
            statusBtn.toggleClass(presentClass).toggleClass(absentClass);
            if(status == "absent"){
                // Changing state from present to absent
                handle.data('status','present');
                statusBtn.empty().html(absentHtml+'absent');
                // increment pcount by 1
                $("#pcount").html(parseInt($("#pcount").html())-1);
                // decrement acount by 1
                $("#acount").html(parseInt($("#acount").html())+1);
            }else if (status == "present") {
                // Changing state from absent to present
                handle.data('status','absent');
                statusBtn.empty().html('present'+presentHtml);
                // increment acount by 1
                $("#acount").html(parseInt($("#acount").html())-1);
                // decrement acount by 1
                $("#pcount").html(parseInt($("#pcount").html())+1);
            }

        }).fail(function(data){
            console.log(data)
        });
    });

});
