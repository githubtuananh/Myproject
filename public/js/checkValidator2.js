$(document).ready(function(){
    //Xử lý ajax đăng kí
    var error = {
        e_email:      1,
        e_username:   1,
        e_password:   1,
        e_passwordCf: 1,
    }
    $(document).on('keyup','input',function(){
        $(document).find('.page-register .status').html('')
    })
    //Xử lý username
    $(document).on('keyup','input[name="username"]',function(e){
        var username = this.value
        $.post('/demoGooglePlay/ajax/checkUsername',{username: username,},function(data){
            var message = $(document).find('.form-group .exist-username')
            if(data==true){
                message.fadeOut('fast')
                error.e_username = 0
            }
            else{
                message.fadeIn('fast')
                message.html('Tài khoản này đã tồn tại !')
                error.e_username = 1
            }
            if(username==''){
                message.fadeOut('fast')
            }
        })
    })
    //Xử lý email
    $(document).on('keyup','input[name="email"]',function(e){
        var email = this.value
        var regex  = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        var message = $(document).find('.form-group .check-email')
        if(regex.test(email)){
            message.fadeOut('fast')
            error.e_email = 0
        }
        else{
            message.fadeIn('fast')
            message.html('Email không hợp lệ !')
            error.e_email = 1
        }
        if(email==''){
            message.fadeOut('fast')
        }
    })
    //Xử lý password
    $(document).on('keyup','input[name="password"]',function(e){
        var password = this.value
        var message = $(document).find('.form-group .check-password')
        var passwordConfirm = $(document).find('input[name="password-confirm"]').val()
        var messageConfirm = $(document).find('.form-group .check-passwordCf')
        if(passwordConfirm!=''){
            if(passwordConfirm!=password){
                messageConfirm.fadeIn('fast')
                messageConfirm.html('Nhập lại mật khẩu không khớp')
                error.e_passwordCf = 1
            }
            else{
                messageConfirm.fadeOut('fast')
                error.e_passwordCf = 0
            }
            if(passwordConfirm==''){
                messageConfirm.fadeOut('fast')
            }
        }
        if(password.length<6){
            message.fadeIn('fast')
            message.html('Tối thiểu 6 kí tự')
            error.e_password = 1
        }
        else{
            message.fadeOut('fast')
            error.e_password = 0
        }
        if(password==''){
            message.fadeOut('fast')
        }
    })
    //Xử lý password confirm
    $(document).on('keyup','input[name="password-confirm"]',function(e){
        var password = $(document).find('input[name="password"]').val()
        var passwordConfirm = this.value
        var message = $(document).find('.form-group .check-passwordCf')
        if(passwordConfirm!=password){
            message.fadeIn('fast')
            message.html('Nhập lại mật khẩu không khớp')
            error.e_passwordCf = 1
        }
        else{
            message.fadeOut('fast')
            error.e_passwordCf = 0
        }
        if(passwordConfirm==''){
            message.fadeOut('fast')
        }
    })  
    //Xử lý submit register
    $(document).on('submit','.registerForm',function(e){
        e.preventDefault()
        var flag = 0
        Object.values(error).forEach(value => {
            flag+=value
        })
        if(flag==0){
            var email = $(document).find('input[name="email"]').val()
            var username = $(document).find('input[name="username"]').val()
            var password = $(document).find('input[name="password"]').val()
            var passwordConfirm = $(document).find('input[name="password-confirm"]').val()
            if(email!='' && username!='' && password!='' && passwordConfirm!=''){
                $.post('/demoGooglePlay/ajax/registerForm',
                {
                    email: email,
                    username: username,
                    password: password,
                    'password-confirm': passwordConfirm,
        
                },function(data){
                    if(data==true){
                        $(document).find('.page-register .status').addClass('success')
                        $(document).find('.page-register .status').removeClass('error')
                        $(document).find('.page-register .status').html(
                            '<i class="fa fa-check" aria-hidden="true"></i> <p>Đăng kí thành công</p>'
                        )
                        $(document).find('input').val('')
                    }else{
                        $(document).find('.page-register .status').addClass('error')
                        $(document).find('.page-register .status').removeClass('success')
                        $(document).find('.page-register .status').html(
                            '<i class="fa fa-times" aria-hidden="true"></i> <p>Đăng kí thất bại</p>'
                        )
                    }
                })
            }else{
                $(document).find('.page-register .status').addClass('error')
                $(document).find('.page-register .status').removeClass('success')
                $(document).find('.page-register .status').html(
                    '<i class="fa fa-times" aria-hidden="true"></i> <p>Vui lòng điền đầy đủ</p>'
                )                
            }
        }else{
            $(document).find('.page-register .status').addClass('error')
            $(document).find('.page-register .status').removeClass('success')
            $(document).find('.page-register .status').html(
                '<i class="fa fa-times" aria-hidden="true"></i> <p>Đăng kí thất bại</p>'
            )
        }
    })

    console.log(123)
    //Xử lý login ajax
})