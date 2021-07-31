$(document).ready(function(){
    // ------------------------------------------COMPUTER--------------------------
    // Xử lý giao diện trang
        $(window).scroll(function(){
            if($('html').scrollTop()>60){
                $('.sub-header').addClass('stop-subheader')
                $('.menu').addClass('stop-menu')
            }
            else{
                $('.sub-header').removeClass('stop-subheader')
                $('.menu').removeClass('stop-menu')
    
            }
        })
    
        $('.btn-support').click(function(){
            $('.block-support').slideToggle();
        })
        $('.fa-times').click(function(){
            $('.block-support').fadeOut('fast');
        })
        var url = $(location).attr('href')
        var currentMethod = url.split('/')[url.split('/').length-1]
        if(currentMethod == 'apps'){
            $('.app').css('backgroundColor','#689f38')
            $('.app a').css('color','#ffffff')
            $('.game').css('backgroundColor','#ffffff')
            $('.game a').css('color','#444')
        }
        if(currentMethod == 'movies'){
            $('.film').css('backgroundColor','#ed3b3b')
            $('.film a').css('color','#ffffff')
            $('.game').css('backgroundColor','#ffffff')
            $('.game a').css('color','#444')
        }
        if(currentMethod == 'books'){
            $('.book').css('backgroundColor','#039be5')
            $('.book a').css('color','#ffffff')
            $('.game').css('backgroundColor','#ffffff')
            $('.game a').css('color','#444')
    
        }
        if(currentMethod == 'store' || currentMethod == ''){
            $('.game').css('backgroundColor','#444')
            $('.game a').css('color','#ffffff')
        }
    
    
    // Xử lý ajax login
        $('#login').click(function(){
            $.get('/demoGooglePlay/ajax/login',function(data){
                $('.cover-main').fadeIn('fast')
                $('body').append(data)
            })
        })
        $('#register').click(function(){
            $.get('/demoGooglePlay/ajax/register',function(data){
                $('body').append(data)
                $('.cover-main').fadeIn('fast')
            })
        })
        $('.cover-main').click(function(){
            $('.cover-main').fadeOut('fast')
            $('.page-login').remove();
            $('.page-register').remove();
        })
    
        
    // -----------------------------------------MOBILE-------------------------
    //Xử lý responsive Mobie--------------------------------------------------- 
    $(window).scroll(function(){
        if($('html').scrollTop()!=0){
            $('.nav-bar').css('background','rgba(6, 8, 30, 0.9)')
        }
        else{
            $('.nav-bar').css('background','rgba(6, 8, 30, 1)')
        }
    })

    //Sự kiện kích thước màn hình thay đổi qua lại giữa computer và mobile
        $(window).resize(function(){
            var wWindow = $(window).width()
            if(wWindow > 45*16){
                $('.item-container').css('display','block')
                if($('.page-login')[0]!=undefined || $('.page-register')[0]!=undefined){
                    $('.cover-main').fadeIn('fast')
                }
            }
            else{
                $('.cover-main').fadeOut('fast')
            }
        })
        
    //Xử lý slide bar
        $('.fa-bars').click(function(){
            $('.slide-navbar').slideToggle()
            $('.slide-user').fadeOut()
        })
    
    //Xử lý slide user
        $('.block-user1').click(function(){
            $('.slide-user').slideToggle("fast")
            $('.slide-navbar').fadeOut()
        })
    
    //Xử lý login register
        $('.slide-user .login').click(function(){
            $.get('/demoGooglePlay/ajax/login',function(data){
                $('.item-container').css('display','none')
                $('.container').append(data)
            })
        })
        $('.slide-user .register').click(function(){
            $.get('/demoGooglePlay/ajax/register',function(data){
                $('.item-container').css('display','none')
                $('.container').append(data)
            })
        })
        
    //Xử lý load dữ liệu của trang
        $('.container.mobile .btn-filmBestSale').click(function(){
            var t = $('.container.mobile .btn-filmBestSale').parents('.item-container')
            var title = t.find(".container-title > p").html()
            var classBtn = t.find('.container-title > button').attr('class')
            var classBLock = t.find('.container-title > button').attr('class').split(' ')[0].split('-')[1]
            $.post('/demoGooglePlay/ajax/loadData',
                {
                    title:title,
                    classBtn:classBtn,
                    classBLock:classBLock
                }
                ,function(data){
                $('.item-container').css('display','none')
                $('.container.mobile').append(data)
            })
        })
        $('.container.mobile .btn-filmEarly').click(function(){
            var t = $('.container.mobile .btn-filmEarly').parents('.item-container')
            var title = t.find(".container-title > p").html()
            var classBtn = t.find('.container-title > button').attr('class')
            var classBLock = t.find('.container-title > button').attr('class').split(' ')[0].split('-')[1]
            $.post('/demoGooglePlay/ajax/loadData',
                {
                    title:title,
                    classBtn:classBtn,
                    classBLock:classBLock
                }
                ,function(data){
                $('.item-container').css('display','none')
                $('.container.mobile').append(data)
            })
        })
        $('.container.mobile .btn-bookBestSale').click(function(){
            var t = $('.container.mobile .btn-bookBestSale').parents('.item-container')
            var title = t.find(".container-title > p").html()
            var classBtn = t.find('.container-title > button').attr('class')
            var classBLock = t.find('.container-title > button').attr('class').split(' ')[0].split('-')[1]
            $.post('/demoGooglePlay/ajax/loadData',
                {
                    title:title,
                    classBtn:classBtn,
                    classBLock:classBLock
                }
                ,function(data){
                $('.item-container').css('display','none')
                $('.container.mobile').append(data)
            })
        })
        $('.container.mobile .btn-appBestDown').click(function(){
            var t = $('.container.mobile .btn-appBestDown').parents('.item-container')
            var title = t.find(".container-title > p").html()
            var classBtn = t.find('.container-title > button').attr('class')
            var classBLock = t.find('.container-title > button').attr('class').split(' ')[0].split('-')[1]
            $.post('/demoGooglePlay/ajax/loadData',
                {
                    title:title,
                    classBtn:classBtn,
                    classBLock:classBLock
                }
                ,function(data){
                $('.item-container').css('display','none')
                $('.container.mobile').append(data)
            })
        })

        //Xử lý menu
        $('.menu-mobile .item-search').click(function(){
            $('.slide-navbar').fadeOut("fast")
        })
        $('.menu-mobile .item-home').click(function(){
            window.location.href = '/demoGooglePlay/store'
        })
        $('.menu-mobile .item-app').click(function(){
            console.log(3)
        })
        $('.menu-mobile .item-film').click(function(){
            console.log(4)
        })
        $('.menu-mobile .item-book').click(function(){
            console.log(5)
        })
        $('.menusub-mobile .faq').click(function(){
            console.log(6)
        })
        $('.menusub-mobile .setting').click(function(){
            console.log(7)
        })

        //Xử lý loading trang
        $(window).ready(function(){
            $('.loader-computer').delay(700).fadeOut('slow');
            $('.loader-mobile').delay(700).fadeOut('slow');
        })
        $(window).resize(function(){
            var wWindow = $(window).width()
            if(wWindow > 45*16){
                $('.loader-computer').css('display','none')
            }
            else{
                $('.loader-mobile').css('display','none')
            }
        })
})
    
    
    