// header scrolls
var hassticky = $('.has_stickyD');
var hasstickyBeta = $('.has_stickyD').prev();
var sticky = hassticky.offset();
hasstickyBeta.css('height', hassticky.height());
$(document).bind('scroll', function () {
    if ($('body *').hasClass('has_stickyD')) {
        if (parseInt(sticky.top) <= parseInt($(document).scrollTop())) {
            if (!hassticky.hasClass('fadeHeader') && !hassticky.hasClass('transpaertHeader')) {
                hasstickyBeta.css('display', 'block');
            }
            hassticky.addClass('sticky');
            if ($('#AFHeaderMain').hasClass('hasMinimizeHeader')) {
                $('#AFHeaderMain').addClass('minimize');
            }
            if ($('#AFHeaderMain').hasClass('hasMinimizeHeaderCustomize')) {
                $('#AFHeaderMain').addClass('minimizeCustomize');
            }
            if ($('#AFHeaderMain').hasClass('fadeHeader') || $('#AFHeaderMain').hasClass('transpaertHeader')) {
                if (!$('#AFHeaderMainLogoImg').hasClass('changeImage')) {
                    $('#AFHeaderMainLogoImgFade').css('opacity', 0);
                    $('#AFHeaderMainLogoImg').css('opacity', 1);
                    $('#AFHeaderMainLogoImg').addClass('changeImage');
                }
            }
            // for #pay-fixed in porduct order
            if ($(window).width() > 991) {
                if ($('#pay-fixed').hasClass('sticky')) {
                    $('#pay-fixed').css('top', (hassticky.height() + 10) + 'px');
                } else {
                    $('#pay-fixed').css('top', 0);
                }
            }
        }
        if (hassticky.hasClass('sticky')) {
            if (parseInt($(document).scrollTop()) <= parseInt(sticky.top)) {
                if (!hassticky.hasClass('fadeHeader') && !hassticky.hasClass('transpaertHeader')) {
                    hasstickyBeta.css('display', 'none');
                }
                hassticky.removeClass('sticky');
                if ($('#AFHeaderMain').hasClass('hasMinimizeHeader')) {
                    $('#AFHeaderMain').removeClass('minimize');
                }
                if ($('#AFHeaderMain').hasClass('hasMinimizeHeaderCustomize')) {
                    $('#AFHeaderMain').removeClass('minimizeCustomize');
                }
                if ($('#AFHeaderMain').hasClass('fadeHeader') || $('#AFHeaderMain').hasClass('transpaertHeader')) {
                    if ($('#AFHeaderMainLogoImg').hasClass('changeImage')) {
                        $('#AFHeaderMainLogoImgFade').css('opacity', 1);
                        $('#AFHeaderMainLogoImg').css('opacity', 0);
                        $('#AFHeaderMainLogoImg').removeClass('changeImage');
                    }
                }
            }

            // for #pay-fixed in porduct order
            if ($(window).width() > 991) {
                if ($('#pay-fixed').hasClass('sticky')) {
                    $('#pay-fixed').css('top', (hassticky.height() + 30) + 'px');
                } else {
                    $('#pay-fixed').css('top', 0);
                }
            }
        }
    }
})

var hasstickyM = $('.has_stickyM');
var stickyM = hasstickyM.offset();
$(document).bind('scroll', function () {
    if ($('body *').hasClass('has_stickyM')) {
        if (parseInt(stickyM.top) <= parseInt($(document).scrollTop())) {
            hasstickyM.addClass('sticky');
        }
        if (hasstickyM.hasClass('sticky')) {
            if (parseInt($(document).scrollTop()) <= parseInt(stickyM.top)) {
                hasstickyM.removeClass('sticky');
            }
        }
    }
})

// header Menu functions
$(".MainMenuUlLi").hover(function () {
        $(this).children(".MainMenuUlLiUl").stop(true, true).fadeIn("fast", function () {
        });
    }
    , function () {
        $(this).children(".MainMenuUlLiUl").delay(200).fadeOut("fast", function () {
        });
    });


$(".MainMenuUlLiUlLi").hover(function () {
        $(this).children(".MainMenuUlLiUlLiUl").stop(true, true).fadeIn("fast", function () {
        });
    }
    , function () {
        $(this).children(".MainMenuUlLiUlLiUl").delay(100).fadeOut("fast", function () {
        });
    });

//mega menu
$(".MainMenuUlLi.mega").hover(function () {
        $("#productMegaMenu , #productMegaMenuv2").stop(true, true).fadeIn("fast", function () {
        });
    }
    , function () {
        $("#productMegaMenu , #productMegaMenuv2").delay(100).fadeOut("fast", function () {
        });
    });
$("#productMegaMenu , #productMegaMenuv2").mouseover(function () {
    $(".MainMenuUlLi.mega").trigger('mouseover');
})
$("#productMegaMenu , #productMegaMenuv2").mouseleave(function () {
    $(".MainMenuUlLi.mega").trigger('mouseleave');
})

//mega menu V2

$('#megaMenuNavs a').on('mouseover', function () {
    $(this).tab('show');
    var attrs = $(this).attr('id'),
        variable = '#megaMenuTabContent .tab-pane#' + attrs;
    $('#megaMenuTabContent .tab-pane').removeClass('active');
    $(variable).addClass('active').addClass('show');
})

//megaMenu End

$(".MainMenuUlLi.list").hover(function () {
        $(this).children("#productListMenu").stop(true, true).fadeIn("fast", function () {
        });
    }
    , function () {
        $(this).children("#productListMenu").delay(100).fadeOut("fast", function () {
        });
    });

$(".productListMenuUlLi").hover(function () {
        $(this).children(".productListMenuUlLiUl").stop(true, true).fadeIn("fast", function () {
        });
    }
    , function () {
        $(this).children(".productListMenuUlLiUl").delay(100).fadeOut("fast", function () {
        });
    });

$(".productListMenuUlLiUlLi").hover(function () {
        $(this).children(".productListMenuUlLiUlLiUl").stop(true, true).fadeIn("fast", function () {
        });
    }
    , function () {
        $(this).children(".productListMenuUlLiUlLiUl").delay(100).fadeOut("fast", function () {
        });
    });

// $('.TopBarSearchBoxInput').keyup(function () {
//     var valueSearch = $(this).val();
//     if (valueSearch.length > 3) {
//         $('#searchModal .searchModalInput').val(valueSearch);
//         $('#searchModal .searchModalInput').trigger('keyup');
//     }
// })
//
// $('.TopBarSearchBoxInput').on('keypress', function (e) {
//     var valueSearch = $(this).val();
//     if (e.which == 13) {
//         if (valueSearch.length > 3) {
//             $('#searchModal .searchModalInput').val(valueSearch);
//             $('#searchModal .searchModalInput').trigger('keyup');
//             $('#TopBarSearchBox .TopBarSearchBoxA').trigger('click');
//         } else {
//             alert('کلمه حداقل 4 کارکتر باید داشته باشد!');
//         }
//     }
// });

//
function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this, args = arguments;
        var later = function () {
            timeout = null;
            if (!immediate) {
                func.apply(context, args);
            }
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) {
            func.apply(context, args);
        }
    };
}

function imageThumbnail(img) {
    var dotLocation = img.lastIndexOf(".");
    var imgLength = img.length;
    var extentionlength = imgLength - dotLocation;
    var extentionWithDot = img.substr(extentionlength * -1);
    var ImageWithOutextention = img.slice(0, extentionlength * -1);
    return ImageWithOutextention + '-tmb' + extentionWithDot;
}

var searchRequest = null;
$(document).on('keyup', '#searchModal .searchModalInput', debounce(function () {
    var searchString = $(this).val();
    if (searchString.length > 3) {
        var products = "";
        var Dproducts = "";
        var categories = "";
        var Dcategories = "";
        $('#searchModal .searchModalInputCancleBox .fa-search').fadeOut(150, function () {
            $('#searchModal .searchModalInputCancleBox .loadingIcon').fadeIn();
        });
        $('#searchModalContentCategories').slideUp();
        $('#searchModalContentProducts').slideUp();
        setTimeout(function () {
            if (searchRequest != null) {
                searchRequest.abort();
            }
            searchRequest = $.ajax({
                type: "POST",
                url: "/product/search-ajax",
                data: {search_key: searchString},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    var linkSearch = '';
                    Dproducts = data.result.products;
                    Dcategories = data.result.categories;
                    if ((Dproducts.length > 0) || (Dcategories.length > 0)) {
                        $('.searchModalContentLoading').fadeOut(500, function () {
                            if (Dproducts.length > 0) {
                                products = '';
                                for (i = 0; i < Dproducts.length; i++) {
                                    if (Dproducts[i]['seo_slug']) {
                                        linkSearch = '/product/' + btoa(Dproducts[i]['id']) + '=/' + Dproducts[i]['seo_slug'];
                                    } else {
                                        linkSearch = '/product/' + btoa(Dproducts[i]['id']) + '=/' + Dproducts[i]['name'].replaceAll(" ", "-");
                                    }
                                    products += '<li class="searchModalContentProductUlLi" data-id="' + Dproducts[i]['id'] + '">';
                                    products += '<img class="searchModalContentProductUlLiImg" src="' + ((Dproducts[i]['image_path']) ? imageThumbnail(Dproducts[i]['image_path']) : '/themes/master/image/nophoto.png') + '" />';
                                    products += '<a href="' + linkSearch + '" class="searchModalContentProductUlLiA">' + Dproducts[i]['name'] + '</a>';
                                    products += '</li>';
                                }
                                $('#searchModalContentProductsUl').html(products);
                                $('#searchModalContentProducts').slideDown();
                            } else {
                                $('#searchModalContentProducts').slideUp();
                            }

                            if (Dcategories.length > 0) {
                                categories = '';
                                for (i = 0; i < Dcategories.length; i++) {
                                    if (Dcategories[i]['seo_slug']) {
                                        linkSearch = '/category/' + btoa(Dcategories[i]['id']) + '/' + Dcategories[i]['seo_slug'];
                                    } else {
                                        linkSearch = '/category/' + btoa(Dcategories[i]['id']) + '/' + Dcategories[i]['name'].replaceAll(" ", "-");
                                    }
                                    categories += '<li class="searchModalContentCategoriesUlLi" data-id="' + Dcategories[i]['id'] + '">';
                                    categories += '<img class="searchModalContentCategoriesUlLiImg" src="' + ((Dcategories[i]['image_path']) ? imageThumbnail(Dcategories[i]['image_path']) : '/themes/master/image/nophoto.png') + '" />';
                                    categories += '<a href="' + linkSearch + '" class="searchModalContentCategoriesUlLiA">' + Dcategories[i]['name'] + '</a>';
                                    categories += '</li>';
                                }
                                $('#searchModalContentCategoriesUl').html(categories);
                                $('#searchModalContentCategories').slideDown();
                            } else {
                                $('#searchModalContentCategories').slideUp();
                            }
                        });
                    }
                    else {
                        $('.searchModalContentLoading').fadeIn();
                        $('.searchModalContentLoading p').text('دسته یا محصولی با این نام وجود ندارد.');
                    }
                    $('#searchModal .searchModalInputCancleBox .loadingIcon').fadeOut(150, function () {
                        $('#searchModal .searchModalInputCancleBox .fa-search').fadeIn();
                    });
                }
            })
        }, 100);

    }
}, 500));

//for mobile menu

$(document).on('click', '.mobileMenuBoxIcon', function () {
    $('section#mobileMenu').addClass('active');
    $('section#mobileMenu').css({'left': '0px'});
});

$(document).on('click', '.mobileMenuBoxIconV2', function () {
    $('section#mobileMenuV2').addClass('active');
    $('section#mobileMenuV2').css({'left': '0px'});
});

$(document).click(function (event) {
    if (
        !$(event.target).closest("section#mobileMenu").length &&
        $('section#mobileMenu').hasClass('active') &&
        !$(event.target).closest(".mobileMenuBoxIcon").length
    ) {
        $("body").find("section#mobileMenu").removeClass("active");
        $('section#mobileMenu').css({'left': '-630px'});
    }
});

$(document).click(function (event) {
    if (
        !$(event.target).closest("section#mobileMenuV2").length &&
        $('section#mobileMenuV2').hasClass('active') &&
        !$(event.target).closest(".mobileMenuBoxIconV2").length
    ) {
        $("body").find("section#mobileMenuV2").removeClass("active");
        $('section#mobileMenuV2').css({'left': '-630px'});
    }
});

$(document).on('click', 'section#mobileMenu .close', function () {
    $("body").find("section#mobileMenu").removeClass("active");
    $('section#mobileMenu').css({'left': '-630px'});
});

$(document).on('click', 'section#mobileMenuV2 .close', function () {
    $("body").find("section#mobileMenuV2").removeClass("active");
    $('section#mobileMenuV2').css({'left': '-630px'});
});

$(document).on('click', '.mobileMenuMainUlLiIcon', function () {
    if (!$(this).hasClass('active')) {
        $('.mobileMenuMainUlLiIcon').css('transform', 'rotate(90deg)');
        $('.mobileMenuMainUlLiIcon').parent().removeClass('active');
        $('.mobileMenuMainUlLiIcon').removeClass('active');
        $('.mobileMenuMainUlLiIcon').siblings('.mobileMenuMainUlLiUl').slideUp();

        $(this).css('transform', 'rotate(0deg)');
        $(this).parent().addClass('active');
        $(this).addClass('active');
        $(this).siblings('.mobileMenuMainUlLiUl').slideDown();
    }
    else {
        $(this).css('transform', 'rotate(90deg)');
        $(this).removeClass('active');
        $(this).closest('.mobileMenuMainUlLi').removeClass('active');
        $(this).siblings('.mobileMenuMainUlLiUl').slideUp();
    }
});

//v2
$(document).on('click', '.mobileMenuListLiIconV2', function () {
    if ($(this).hasClass('active')) {
        $(this).css('transform', 'rotate(90deg)');
        $(this).removeClass('active');
        $(this).parent().removeClass('active');
        $(this).siblings('.mobileMenuMainUl').slideUp();
    }
    else {
        $(this).parent().siblings('.mobileMenuMainUlli').each(function () {
            if ($(this).hasClass('active')) {
                $(this).find('.mobileMenuListLiIconV2').css('transform', 'rotate(90deg)');
                $(this).removeClass('active');
                $(this).find('.mobileMenuListLiIconV2').removeClass('active');
                $(this).find('.mobileMenuMainUl').slideUp();
            }
        })
        $(this).css('transform', 'rotate(0deg)');
        $(this).parent().addClass('active');
        $(this).addClass('active');
        $(this).siblings('.mobileMenuMainUl').slideDown();
    }
});

$(document).on('click', '#mobileMenuV2 .mobileMenuMainUlliA.menuHasChildren', function () {
    $(this).siblings('.mobileMenuListLiIconV2 ').trigger('click');
});

// for fix footer
$(document).ready(function () {
    if ($(window).width() > 991) {
        if ($('#AFFooterBox').hasClass('fixFooter')) {
            var footerHeight = $('#AFFooterBox').height();
            $('#bodyBox').css({
                'position': 'relative',
                'margin-bottom': footerHeight + 'px',
                'display': 'inline-block'
            });
        } else if ($('#AFFooterBox').hasClass('MinifixFooter')) {
            var footerHeight = $('#AFFooterBox').height();
            $('#bodyBox').css({
                'position': 'relative',
                'margin-bottom': footerHeight + 'px',
                'display': 'flow-root'
            });
        }
    }
})
// for mega with sticky menu

$(document).ready(function () {
    if ($('#AFHeaderMain').hasClass('has_sticky')) {
        var $el = $('div.mainheaderBox');
        var bottom = $el.outerHeight(true);
        $('div#productMegaMenuv2').css('top', bottom + 'px')
    }
})

// for menu v2 for desktop

$("#MenuV2 .MenuList ,#secondMenu .MenuList").hover(function () {
    $(this).children(".MenuMainUl").stop(true, true).fadeIn("fast", function () {
        if ($(this).offset().left <= 0) {
            $(this).css({'left': '102%', 'right': 'auto'})
        }
    });
}, function () {
    $(this).children(".MenuMainUl").delay(100).fadeOut("fast");
});

$("#MenuV2 .MenuMega ,#secondMenu .MenuMega").hover(function () {
    $(this).children(".MegaMenuv2").stop(true, true).fadeIn("fast");
}, function () {
    $(this).children(".MegaMenuv2").delay(100).fadeOut("fast");
});

$('#megaMenuV2Navs a').on('mouseover', function () {
    $('#megaMenuV2Navs a').removeClass('active')
    $(this).tab('show');
    var attrs = $(this).attr('id'),
        variable = '#megaMenuTabContent .tab-pane#' + attrs;
    $('#megaMenuTabContent .tab-pane').removeClass('active').removeClass('show');
    $(variable).addClass('active').addClass('show');
});

$(document).ready(function () {
    if ($('#mobileLogoHeader .headerLogoImg').width() > ($('#mobileLogoHeader .headerLogoImg').height())*2) {
        $('#mobileLogoHeader .headerLogoImg').css('width', '120px');
    }
});