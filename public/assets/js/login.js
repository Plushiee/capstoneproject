"use strict"
$(window).on("load", function () {
    // Bawaan
    $('.btn-forget').on('click', function (e) {
        e.preventDefault();
        var inputField = $(this).closest('form').find('input');
        if (inputField.attr('required') && inputField.val()) {
            $('.error-message').remove();
            $('.form-items', '.form-content').addClass('hide-it');
            $('.form-sent', '.form-content').addClass('show-it');
        } else {
            $('.error-message').remove();
            $('<small class="error-message">Please fill the field.</small>').insertAfter(inputField);
        }

    });

    $('.btn-tab-next').on('click', function (e) {
        e.preventDefault();
        $('.nav-tabs .nav-item > .active').parent().next('li').find('a').trigger('click');
    });
    $('.custom-file input[type="file"]').on('change', function () {
        var filename = $(this).val().split('\\').pop();
        $(this).next().text(filename);
    });

    // Custom Mulai
    // ambil id
    var x = document.getElementById("passwordLogin");
    var show_eye = document.getElementById("showPass");
    var hide_eye = document.getElementById("hidePass");

    // Change Color Background eye
    var pass = document.getElementById('pass');

    // Preparation
    hide_eye.classList.remove("d-none");
    show_eye.style.display = "none";
    hide_eye.style.display = "block";

    $('.input-group-text.pass').mousedown(function () {
        x.type = "text";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
        pass.style.backgroundColor = "rgb(206, 208, 209)";0
    });

    $('.input-group-text.pass').mouseup(function () {
        x.type = "password";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
        pass.style.backgroundColor = "rgb(233, 236, 239)";
    });
    // Custom Selesai
});
