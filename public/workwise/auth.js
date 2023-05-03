$(document).ready(function () {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    var validateLogin = $('#login').validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "email": {
                required: true,
                email: true,
            },
            "password": {
                required: true,
                minlength: 8
            },
        },
        messages: {
            "email": {
                required: "Vui lòng nhập email.",
                email: "Email không đúng định dạng.",
            },
            "password": {
                required: "Vui lòng nhập mật khẩu.",
                minlength: "Mật khẩu phải ít nhất 8 ký tự."
            },
        },

        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
              $(placement).append(error)
            } else {
              error.insertAfter(element);
            }
          }
    });
    
    $('#login').on('submit', function(event) {
        event.preventDefault();

        if(!validateLogin.valid()) {
            return false;
        }else{
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    
                    if(response.data.status == 1) {
                        toastr.error(response.data.message);
                    }else if(response.data.status == 0) {
                        window.location = "/";
                    }
                }
            });
        }
    })

    var validateRegister = $('#register').validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "name": {
                required: true,
            },
            "email": {
                required: true,
                email: true,
            },
            "password": {
                required: true,
                minlength: 8
            },
            "repeat-password": {
                required: true,
                equalTo: "#password",
                minlength: 8

            }
        },
        messages: {
            "name": {
                required: "Vui lòng nhập họ và tên.",
            },
            "email": {
                required: "Vui lòng nhập email.",
                email: "Email không đúng định dạng.",
            },
            "password": {
                required: "Vui lòng nhập mật khẩu.",
                minlength: "Mật khẩu phải ít nhất 8 ký tự."
            },
            "repeat-password": {
                required: "Vui lòng nhập lại mật khẩu.",
                equalTo: "Mật khẩu không trùng khớp.",
                minlength: "Mật khẩu phải ít nhất 8 ký tự."
            }
        },

        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
              $(placement).append(error)
            } else {
              error.insertAfter(element);
            }
          }
    });
        $('#register').on('submit', function(event) {
            event.preventDefault();
            if(!validateRegister.valid()) {
                return false;
            }else{
                $.ajax({
                    method: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    dataType: "JSON",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (response) { 
                        if(response.data.status == 1) {
                            $('#errEmR').append('<label>'+ response.data.error +'</label>');
                        }else if(response.data.status == 0 ) {
                            toastr.success(response.data.message);

                            $('.form-auth')[1].reset();
                            $('#tab-1, #li-tab-1').addClass('current');
                            $('#tab-2, #li-tab-2').removeClass('current');
                        }
                    }
                });
            }
        });
   
    $('.enter-input').on('keyup', function() {
        var element = $(this).data('error');
        $(element).children("label:first").remove();

    });

    $('.tab-current').on('click', function() {
        if(!$(this).parent('li').hasClass('current')) {
            $('.form-auth')[0].reset();
            $('.form-auth')[1].reset();
            $('.error-register').children("label").remove();
        }
        
    })
});