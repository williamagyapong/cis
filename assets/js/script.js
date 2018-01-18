function myslide(elem,button){
    $(button).find('i.arrow').toggleClass('fa-caret-right').toggleClass('fa-caret-down');
   $(elem).slideToggle();
}

function spypopdown(to='#spypopup .content'){
    $(to).empty();
    $('#spypopup .w3-modal-content').animate({width: "20%"},250,function(){
        $('#spypopup .w3-modal-content').animate({height: "20%"},250,function(){
            img = `<img src="/static/church/images/ajax-loader.gif" alt="Loading..." class="w3-display-middle">`;
            $(to).html(img);
            $('#spypopup').hide();
        });
    });
}

function render(data,to){
    $(to).empty().html(data);
}

function spypopup(url,to='#spypopup .content'){
    // show spypopup
    $('#spypopup').show();
    // get data from server
    $.get( url, function(data) {
        $('#spypopup .w3-modal-content').animate({height: "90%"},500,function(){
            $('#spypopup .w3-modal-content').animate({width: "70%"},500,function(){
                render(data,to);
            });
        });
    })
    .fail(function(data) {
        console.log(data);
    });
    // render data to
}

function spypopdown1(to='#spypopup1 .content'){

    img = `<img src="/static/church/images/ajax-loader.gif" alt="Loading..." class="w3-display-middle">`;
    render(img,to);
    $('#spypopup1').hide();
}

function spypopup1(url,to='#spypopup1 .content'){
    // show spypopup
    $('#spypopup1').show();
    // get data from server
    $.get( url, function(data) {
        render(data,to);
        spysubmit();
    })
    .fail(function(data) {
        console.log(data);
    });
    // render data to
}
// Application Ajax Calls

function loadURL(url){
    $.get( url, function(data) {
        render(data,'main');
    })
    .fail(function(data) {
        console.log(data);
    });
}

function spysubmit(){
    $("#group_form").submit(function(event){
        event.preventDefault();
        data = $(this).serialize();
        url = $(this).attr('action');
        $.post(url,data,function(response){
            console.log(response);
            loadUI('nav');
            spypopdown1();
        })
        .fail(function(response){
            console.log(response);
        });
    });
}

function loadUI(ui){
    $.get( 'api/'+ui, function(data) {
        render(data,ui);
    })
    .fail(function(data) {
        console.log(data);
    });
}
