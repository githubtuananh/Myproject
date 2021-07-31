$(document).ready(function(){
    //Xử lý show/hide password
    $(document).on('click','.show-password input',function(){
        var status = $('input[name="password"]').attr('unmark')
        if(status=='show'){
            $('input[name="password"]').attr('type','text')
            $('input[name="password"]').attr('unmark','hide')
            $('input[name="password-confirm"]').attr('type','text')
            $('input[name="password-confirm"]').attr('unmark','hide')
            $('input[type="checkbox"]').prop("checked", true);
        }
        else{
            $('input[name="password"]').attr('type','password')
            $('input[name="password"]').attr('unmark','show')
            $('input[name="password-confirm"]').attr('type','password')
            $('input[name="password-confirm"]').attr('unmark','show')
            $('input[type="checkbox"]').prop("checked", false);
        }
    })

    //Xử lý đăng nhập bằng google
    $(document).on('click','form .login-google',function(){
        $.post("/demoGooglePlay/API/loginGoogle",function(data){
            console.log(data);
            window.location.href = data;
        })
    })

})