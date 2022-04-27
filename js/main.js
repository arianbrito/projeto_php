$( function(){
    //movimentação do menu
    var open = true;
    var windowSize = $(window)[0].innerWidth;

    var targetSizeMenu = (windowSize <= 400) ? 200 : 300;

    if(windowSize <= 768){
        $('.menu-lateral').css('width','0').css('padding','0');
        open = false;
    }
    $('.barra-topo-menu-btn').click(function(){
        if(open){
            $('.menu-lateral').animate({'width':'0'}, function(){
                open = false;
            });
            $('.content, barra-topo').animate({'width':'100%'});
            $('.content, barra-topo').animate({'left':'0'}, function(){
                open = false;
            });
        }else{
            $('.menu-lateral').css('display','block');
            $('.menu-lateral').animate({'width':targetSizeMenu+'px'}, function(){
                open = true;
            });
            $('.content').animate({'left':targetSizeMenu+'px'}, function(){
                open = true;
            });

        }
    })

})
