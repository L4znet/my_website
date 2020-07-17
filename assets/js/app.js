$(document).ready(function(){
    let button = $('.button');
    let menu = $('.menu');
    let content = $('.content');
    let main = $('main');

    let translate_value = menu.width() + 'px';
    console.log(translate_value);

    button.click(function(){
        if(main.attr('data-state') === "closed"){
            menu.css("transform", "translateX(0px)");
            content.css({
                "transform":"translateX(-" + translate_value + ")",
            });

            main.attr('data-state', 'opened');
            button.children('i').attr('class', 'fa fa-arrow-right');
        } else {
            main.attr('data-state', 'closed');
            menu.css({
                "transform":"translateX(" + translate_value + ")",
            });
            content.css({
                "transform":"translateX(0)",
                "transition":"all 0.3s",
                "opacity":"1"
            });
            button.children('i').attr('class', 'fa fa-arrow-left');
        }
    });
});

