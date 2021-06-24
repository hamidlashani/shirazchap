$(document).ready(function () {

    (function ($) {
        $.fn.persianCalendar = function (extra) {
            return this.each(function (index, element) {
                var id = jQuery(element).attr("id");
                new AMIB.persianCalendar(id, extra);
            });
        };
    })(jQuery);

    jQuery(".datepickerinput").persianCalendar();

    try {
        if ($('.light-box').length) {
            $('.light-box').lightGallery({});
        }
    } catch (error) {
        console.log(error);
    }

    try {
        $(".persian-date-picker").pDatepicker({
            responsive: true,
            format: 'YYYY/MM/DD',
            initialValue: false,
            calendar: {
                persian: {
                    locale: 'fa',
                }
            }
        });
    } catch (error) {

    }

    try {
        $('input.number-format').number(true, 0);
    } catch (error) {

    }
});
$(window).bind('load', function() {
    $('.img-fluid ,.img-responsive').each(function(){
        var img = $(this);
        var image = new Image();
        image.src = $(img).attr('src');
        var no_image = '/images/no_image1.jpg';
        if (image.naturalWidth == 0 || image.readyState == 'uninitialized'){
            $(img).unbind('error').attr('src', no_image).css({
                height: $(img).css('height'),
                width: $(img).css('width'),
            });
        }
    });
});
$(document).ajaxComplete(function (event, request, settings) {
    (function ($) {
        $.fn.persianCalendar = function (extra) {
            return this.each(function (index, element) {
                var id = jQuery(element).attr("id");
                new AMIB.persianCalendar(id, extra);
            });
        };
    })(jQuery);

    jQuery(".datepickerinput").persianCalendar();

    try {
        $('.light-box').lightGallery({});
    } catch (error) {
        console.log(error);
    }
});
/*$(document).ready(function(){
 $(".datepickerinput").click(function(){
 $(".light-box").trigger("click");
 });
 });*/

//comma seperator
formatNum = function (num) {
    num = parseFloat(num);
    return  Number(num.toFixed(0)).toLocaleString();
};

intFormat = function (num) {
    num = parseFloat(num).toString();
    var regex = /(\d)((\d{3},?)+)$/;
    num = num.split(',').join('');

    while (regex.test(num)) {
        num = num.replace(regex, '$1,$2');
    }

    //num = parseFloat(num);
    return num.toString();
};

$('.number.float').keypress(function (event) {

    if (event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46)
        return true;

    else if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57))
        event.preventDefault();

});

$('.number.numeric').keypress(function (event) {

    if (event.which == 8 || event.keyCode == 37 || event.keyCode == 39)
        return true;

    else if (event.which < 48 || event.which > 57)
        event.preventDefault();

});


$('.go-cart').on('click', function () {
    location.href = '/cart/index';
});

//events
//modals
$('.bs-example-modal-lg').on('show.bs.modal', function (event) {
    showLoader();
    var page;
    var button = $(event.relatedTarget);
    var id = button.data('id');
    if (button.data('page'))
        page = button.data('page');
    else
        page = '';

    var modal = $(this);
    var url = '/factors/details/?id=' + id + '&page=' + page;
    $.get(url, function (data) {
        //console.log(data);
        hideLoader();
        modal.find('.modal-content').html(data);
    });
    modal.find('.modal-content').html('');

});

$('#modal-charge').on('show.bs.modal', function (event) {
    showLoader();
    var button = $(event.relatedTarget);
    var url = button.data('url');

    var modal = $(this);
    $.get(url, function (data) {
        //console.log(data);
        hideLoader();
        modal.find('.modal-content').html(data);
    });
    modal.find('.modal-content').html('');

});

var clicked = false;

$('#modal-factor').on('show.bs.modal', function (event) {
    if (clicked) {
        return;
    }

    clicked = true;
    showLoader();
    var button = $(event.relatedTarget);
    var id = button.data('id');

    var modal = $(this);
    var url = '/factors/details/' + id;
    $.get(url, function (data) {
        clicked = false;
        //console.log(data);
        hideLoader();
        modal.find('.modal-content').html(data);
    });
    modal.find('.modal-content').html('');
});

$('.magnify').on('click', function () {
    var target = $(this).attr('data-target');
    $('#' + target).click();
})
// $('.submitoreder').on('click',function () {
//     var target = $(this).attr('data-target');
//     $('#'+target).click();
// })
/*$('.productbox').on('mouseout', function () {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.magnify img').css('visibility', 'hidden');
        $('.magnify img').css('display', 'none');
    }
})*/

$('.productbox').on('click', function () {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.magnify img').css('visibility', 'hidden');
        $('.magnify img').css('display', 'none');
        var item = $(this).find('.magnify img');
        $(item[0]).css('visibility', 'visible');
        $(item[0]).css('display', 'inline-block');
    }
})


$('.productbox').on('click', function () {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.submitoreder').css('visibility', 'hidden');
        $('.submitoreder').css('display', 'none');
        var item = $(this).find('.submitoreder');
        $(item[0]).css('visibility', 'visible');
        $(item[0]).css('display', 'inline-block');
    }
})

$('.show-list').on('click', function () {
    setCookie('viewProduct', 'list', 1000)
    $('.show-grid').removeClass('active');
    $('.product-list-view').removeClass('hidden');
    $('.show-list').addClass('active');
    $('.product-group').removeClass('grid');
    $('.product-group').addClass('list');
});

$('.show-grid').on('click', function () {
    setCookie('viewProduct', 'grid', 1000)
    $('.show-list').removeClass('active');
    $('.show-grid').addClass('active');
    $('.product-group').removeClass('list');
    $('.product-group').addClass('grid');
});
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
var view = getCookie('viewProduct');
if (view) {
    if (view == 'grid') {
        $('.show-list').removeClass('active');
        $('.show-grid').addClass('active');
        $('.product-group').removeClass('list');
        $('.product-group').addClass('grid');
    }
    if (view == 'list') {
        $('.show-grid').removeClass('active');
        $('.product-list-view').removeClass('hidden');
        $('.show-list').addClass('active');
        $('.product-group').removeClass('grid');
        $('.product-group').addClass('list');
    }
}

$('body').on('click', '.pay-bank', function () {
    var id = $(this).data("id");
    payBank(id);
});

$('body').on('click', '.pays-bank', function () {
    var countFactor = $('.selectable-item:checked').size();
    if (countFactor == 0) {
        alert('لطفا یک سفارش انتخاب کنبد.');
        return false;
    }
    else {
        var answer = confirm('شما ' + countFactor + ' سفارش را جهت پرداخت گروهی انتخاب کرده اید، در صورتی که اعتبار شما شارژ داشته باشد پس از تایید مبلغ از اعتبار شما کسر میشود، در غیراینصورت جهت پرداخت آنلاین به درگاه بانک وصل خواهید شد.');
        if (answer) {
            payBank(0);
        }
        else {
            return false;
        }
    }
});

function    payBank(id) {
    try {
        sweetAlert({
            title: "لطفا صبر کنید...",
            imageUrl: '/images/search.gif',
            showConfirmButton: false
        });
    } catch (error) {

    }
    $.ajax({
        type: "POST",
        url: "/factors/pay/?id=" + id,
        data: $("#factor").serialize(),
        dataType: "json",
        success: function (data) {
            if (data.result === "true" || data.result === true) {
                if (data.act === 'success') {
                    window.location.href = "/factors/offset";
                }
                if (data.act === 'pay') {
                    creditPay(data.credit, data.price, data.invoice, data.type);
                }
            }
            else {
                $(".messageError").show();
                $(".messageError").html(data.msg);
                $('html, body').animate({
                    scrollTop: $('#message-error').offset().top - 50
                }, 2000);
                sweetAlert.close();
            }
        },
        error: function (data) {
            alert(data.msg);
        }
    });
}

function creditPay(credit, price, invoice, type) {
    credit = Math.floor(credit / unit);
    price = Math.ceil(price / unit);
    var sum = Number(price) - Number(credit);
    var negative = false;
    if (credit < 0) {
        credit = credit * (-1);
        negative = true;
    }
    var priceContent = numberFormatting(price.toString()) + ' ' + unitName;
    if (type == 'group') {
        type = 'سفارشات';
    }
    if (type == 'not-paid') {
        type = 'سفارش';
    }
    if (type == 'deposit') {
        type = 'بیعانه';
    }

    priceContent += '<br>';
    priceContent += 'موجودی فعلی : ';

    if (negative) {
        priceContent += numberFormatting(credit.toString()) + '- ' + unitName;
    }
    else {
        priceContent += numberFormatting(credit.toString()) + ' ' + unitName;
    }
    priceContent += '<br>';
    priceContent += 'مبلغ قابل پرداخت : ';
    priceContent += (numberFormatting(sum.toString())) + ' ' + unitName;
    sweetAlert.close();

    sweetAlert({
        title: "اعتبار شما کافی نمی باشد",
        type: "error",
        showConfirmButton: false,
        html: '<form id="pay" action="/digital/pay/?id=' + invoice + '&group=1" enctype="multipart/form-data" method="post">' +
        '<div class="chap_col-12 col-xs-12 col-12" style="padding-top:20px">مبلغ ' + type + ' : ' +
        priceContent +
        '</div>' +
        '<div class="chap_col-12 col-xs-12 col-12" style="padding-top:20px">' +
        '<select name="Receipts[receipt_bank]" class="form-control flat-control input-item banks" style="margin-top:15px">' +
        '</select>' +
        '</div>' +
        '<div class="chap_col-12 col-xs-12 col-12" style="padding-top:20px">' +
        '<input type="hidden" name="group" value="1" >' +
        '<button type="submit" class="green-btn go-bank" style="float: initial;">پرداخت آنلاین</button>' +
        '</div>' +
        '</form>',
        onClose: function () {
            $('input:checkbox').prop('checked', false);
        }
    });

    $.post("/transactions/banks/",
        function (data) {
            var sel = $(".banks");
            sel.empty();
            for (var i = 0; i < data.length; i++) {
                sel.append('<option value="' + data[i].id + '">' + data[i].description + '</option>');
            }
        }, "json");
}

function sendAddress(id) {
    $.ajax({
        type: "POST",
        url: "/digital/order/" + id,
        data: $("#pd-address").serialize(),
        dataType: "json",
        success: function (data) {
            if (data.result === "true") {
                if (data.act === 'refresh') {
                    window.location.href = "/digital/order/" + id;
                }
                if (data.act === 'factor') {
                    window.location.href = "/factors/offset/?id=" + data.factor_id;
                }
                if (data.act === 'pay') {
                    crediterror(data.credit, data.factor_id);
                }
                if (data.act === 'discount_code') {
                    discountcode(data.factor_id);
                }
            }
            else {
                $(".messageError").show();
                $(".messageError").html(data.msg);
                $('html, body').animate({
                    scrollTop: $('#message-error').offset().top - 50
                }, 2000);
                sweetAlert.close();
            }
        },
        error: function (data) {
            alert(data.msg);
        }
    });
}

function passCode(id) {
    $.ajax({
        type: "POST",
        url: "/digital/order/" + id,
        data: $("#pass-code").serialize(),
        dataType: "json",
        success: function (data) {
            if (data.result === "true") {
                if (data.act === 'refresh') {
                    window.location.href = "/digital/order/" + id;
                }
                if (data.act === 'factor') {
                    window.location.href = "/factors/offset/?id=" + data.factor_id;
                }
                if (data.act === 'pay') {
                    crediterror(data.credit, data.factor_id);
                }
            }
            else {
                $(".messageError").show();
                $(".messageError").html(data.msg);
                $('html, body').animate({
                    scrollTop: $('#message-error').offset().top - 50
                }, 2000);
                sweetAlert.close();
            }
        },
        error: function (data) {
            alert(data.msg);
        }
    });
}

function sendCode(id) {
    $.ajax({
        type: "POST",
        url: "/digital/discount/" + id,
        data: $("#send-code").serialize(),
        dataType: "json",
        success: function (data) {
            if (data.result === "true") {
                var factor_paid = Math.floor(data.factor_paid / unit);
                var discount = Math.floor(data.discount / unit);
                var deposit_discount = Math.floor(data.deposit_discount / unit);
                if (deposit_discount > 0) {
                    discountPrice = deposit_discount;
                }
                if (deposit_discount == 0) {
                    discountPrice = discount;
                }

                var total = factor_paid - discount;

                var priceContent = 'مبلغ سفارش : ';
                priceContent += factor_paid + ' ' + unitName;
                priceContent += '<br>';
                priceContent += 'کسر بابت کد تخفیف : ';
                priceContent += discount + ' ' + unitName;
                priceContent += '<br>';
                priceContent += 'مبلغ نهایی سفارش : ';
                priceContent += total + ' ' + unitName;

                $('.c1-show').html('');
                $('.c2-show').html('');
                $('.c1-show').html(priceContent);
                $('.error-discount').hide();
                $('.send-code').hide();
            }
            else {
                if (data.msg === 'err_connect') {
                    var msg = 'در برقراری ارتباط مشکلی بوجود آمده است.';
                }
                if (data.msg === 'err_usage') {
                    var msg = 'هر مشتری فقط یکبار میتواند از این کد استفاده کند ،شما قبلا از این کد استفاده کرده اید.';
                }
                if (data.msg === 'err_code') {
                    var msg = 'کد معتبر نمی باشد.';
                }
                if (data.msg === 'err_min') {
                    var value = Math.floor(data.value / unit);
                    var msg = 'مبلغ سفارش شما برای استفاده از این کد تخفیف حداقل باید '+value+' '+unitName+' باشد.';
                }
                if (data.msg === 'err_first') {
                    var msg = 'این کد نخفیف فقط برای اولین خرید فعال است.';
                }
                if (data.msg === 'err_limit') {
                    var msg = 'کد معتبر نمی باشد.';
                }
                if (data.msg === 'err_product') {
                    var msg = 'کد معتبر نمی باشد.';
                }
                if (data.msg === 'err_user') {
                    var msg = 'کد معتبر نمی باشد.';
                }
                $('.error-discount').html(msg);
                $('.error-discount').show();
                $('.send-code').html('ثبت کد تخفیف');
            }
        },
        error: function (data) {
            alert(data.msg);
        }
    });
}

function sendAddressDetail() {
    $.ajax({
        type: "POST",
        url: "/factors/offset/",
        data: $("#pd-address").serialize(),
        dataType: "json",
        success: function (data) {
            if (data.result === "true") {
                window.location.href = "/factors/offset/";
            }
            else {
                alert(data.msg);
                sweetAlert.close();
            }
        },
        error: function (data) {
            alert(data.msg);
            sweetAlert.close();
        }
    });
}
jQuery(".notif-link").click(function () {
    /*jQuery(this).children(".notif-ul-1").slideToggle(400, function (){});*/
    if (jQuery(".notif-ul-1").css("display", "none")) {
        jQuery(".notif-ul-1").css("display", "block");
    } else {
        jQuery(".notif-ul-1").css("display", "none");
    }
});

function removeAllNotification() {
    swal({
        title: 'آیا مطمئن هستید؟',
        text: "تمامی اعلان ها حذف می شوند.",
        type: 'warning',
        showCancelButton: false,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#16b661',
        confirmButtonText: 'بله،حذف شوند!',
        cancelButtonText: 'انصراف'
    }).then(function () {
        jQuery.ajax({
            type: 'GET',
            url: '/users/delete-notifications',
            success: function (data) {
                if (data.success) {
                    //fix it
                    jQuery('.cartbadge-notif').html('0');
                    jQuery('.notification-count-badge').html('0');
                    jQuery('.inside-notif').html('' +
                        '<li><a>هیچ پیامی جهت نمایش وجود ندارد.</a></li>');
                    setTimeout(function () {
                        swal({
                            title: 'حذف شدند!',
                            text: "تمامی اعلان ها با موفقیت حذف شدند.",
                            confirmButtonText: 'بسیار خب',
                            type: 'success'
                        });
                    }, 300);
                    jQuery('.footer-notif a').css('display', 'none');
                    jQuery('.footer-sidenav .del-notif').css('display', 'none');
                } else {
                    setTimeout(function () {
                        swal({
                            title: 'انصراف',
                            text: data.message[0],
                            confirmButtonText: 'انصراف',
                            type: 'error'
                        });
                    }, 100);
                }
            }
        });
    });
};

function openInNewTab(href) {
    Object.assign(document.createElement('a'), {
        target: '_blank',
        href,
    }).click();
}

function removeNotification(delId) {
    var img = jQuery('<img src="/images/ajax-loader2.gif" width="25" heigh="25" />');
    img.attr("id", "loader-notification-" + delId);
    img.css("margin-left", "-7px");
    img.css("z-index", "-1");
    jQuery(".notification-id-" + delId).find('.one-trash a').remove();
    jQuery(".notification-id-" + delId).find('.one-trash').append(img);
    jQuery.ajax({
        type: 'GET',
        url: '/users/delete-notification',
        data: {
            id: delId
        },
        complete: function () {
            jQuery("#loader-notification-" + delId).remove();
        },
        success: function (data) {
            if (data.success) {
                //fix it
                jQuery('.notification-id-' + data.result.id).fadeOut("slow");
                setTimeout(function () {
                    jQuery('.notification-id-' + data.result.id).remove();
                }, 4000);
                var countNotification = jQuery('.cartbadge-notif').html();
                var countNotifications = parseInt(countNotification) - 1;
                jQuery('.cartbadge-notif').html(countNotifications);

                var countNotification = jQuery('.notification-count-badge').html();
                var countNotifications = parseInt(countNotification) - 1;
                jQuery('.notification-count-badge').html(countNotifications);
                // countNotification.html(countNotification);
            } else {
                /*alert(data.message[0]);*/
                sweetAlert(data.message[0]);
            }

        }
    });
}

function loginFrom(event) {
    sweetAlert({
        text: "<div id='login-box'>" +
        "<p>ورود به سایت</p>" +
        "<input autocomplete='off' class='user all-input' type='text' placeholder='نام کاربری یا ایمیل یا شماره همراه' />" +
        "<div class='user-check'></div><br/>" +
        "<input type='password' class='pass all-input' placeholder='کلمه عبور' />" +
        "<div class='pass-check'></div><br/>" +
        "<button class='login-send layout6 layout9 layout10 all-btn' data-click-trigger='" + event + "' type='button'>ورود</button>" +
        "<br/><div class='login-loading'></div>" +
        "<a target='_blank' class='all-a' href='../users/register' > <i class='fa fa-arrow-left arrow-order-modal' aria-hidden='true'></i> رفتن به صفحه ثبت نام</a><br/>" +
        "<a target='_blank' class='all-a' href='../users/forget' > <i class='fa fa-arrow-left arrow-order-modal' aria-hidden='true'></i> یادآوری رمز عبور</a></div>",
        showConfirmButton: false
    });
}

$(document).on('click', '.login-send', function () {
    var user = $('#login-box .user').val();
    var pass = $('#login-box .pass').val();
    var trigger = $(this).data('click-trigger');
    var errlogin = false;
    if (user == "") {
        $('.user-check').html("*اجباری");
        errlogin = true;
    }
    else {
        $('.user-check').html('');
    }
    if (pass == "") {
        $('.pass-check').html("*اجباری");
        errlogin = true;
    }
    else {
        $('.pass-check').html('');
    }
    if (!errlogin) {
        $('.login-loading').html("لطفا صبر کنید...");
        $.ajax({
            type: "POST",
            url: "/site/ajax-login",
            data: {username: user, password: pass},
            success: function (data1) {
                if (data1.status === 'success') {
                    login = true;
                    sweetAlert.close();
                    if (trigger) {
                        $(trigger).trigger("click");
                    } else {
                        location.reload();
                    }
                }
                else {
                    $('.login-loading').html(data1.message);
                }
            },
            error: function () {
                alert('متاسفانه در ورود شما مشکلی بوجود آمده!');
            }
        });
    }
});

function supportPdf() {
    function hasAcrobatInstalled() {
        function getActiveXObject(name) {
            try {
                return new ActiveXObject(name);
            } catch (e) {
            }
        }

        return getActiveXObject('AcroPDF.PDF') || getActiveXObject('PDF.PdfCtrl')
    }

    function isIos() {
        return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream
    }

    return navigator.mimeTypes['application/pdf'];
};
