@extends('layouts.app')

@section('content')
    <div id="wrap_all">
        <div class="dashboard chap_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item active">{{ $banner->name }}</li>
                </ol>
            </nav>
            <div id="chap_content">
                <div class="section">
                    <div class="chap_row">
                        <form class="chap_col-12 form-horizontal" action="{{ route('addorder') }}" method="POST" id="pd-form" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layouts.errors')
                            <input type="hidden" value="{{get_class($banner)}}" name="model">
                            <div id="bottom-right-side" class="left-side left-side-order chap_col-12 chap_col-md-5 order-12" style="min-height: 1109px;">
                                <div id="all-left-side" style="min-height: 1109px;">
                                    <!--total price-->
                                    <div id="pay-fixed" class="payments sticky"> <span class="click-d dargTopDownBtn hidden"> <img src="/img/arrow.gif"> </span>
                                        <div class="mobile-view w-100">
                                            <div class="header-inside chap_row overflow-y mCustomScrollbar _mCS_3 mCS-autoHide mCS-dir-rtl mCS_no_scrollbar" style="position: relative; overflow: visible;">
                                                <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
                                                    <div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="rtl">
                                                        <div class="header-payment chap_col-12">
                                                            <div class="prices hidden ">
                                                                <div class="clearfix final_cost fico hidden">
                                                                    <!--<i class="click-d hidden fa fa-plus-square"></i>-->
                                                                    <span id="pd-festival-totalAmount" class="clearfix" style="display: none;"></span> </div>
                                                                <div class="depe-box deb final_cost hidden1  hidden"> مبلغ بیعانه قابل پرداخت: <span id="pd-total-deposit-price" class="Mcolor">0 تومان</span> </div>
                                                            </div>
                                                            <div class="details-product-price">
                                                                <p>{{ $banner->name }}</p>
                                                            </div>
                                                            <div class="details-product-price d2p">
                                                                <ul>
                                                                    <li class="chap_row lfdevice" style="display: none;"> <i class="fa fa-angle-left"></i>نوع دستگاه چاپ : <span id="lf-device" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfthicknes" style="display: none;"> <i class="fa fa-angle-left"></i>سایز: <span id="lf-thicknes" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfpass" style="display: none;"> <i class="fa fa-angle-left"></i>پس : <span id="lf-pass" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lflength" style="display: none;"> <i class="fa fa-angle-left"></i>طول: <span id="length-order" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfwidth" style="display: none;"> <i class="fa fa-angle-left"></i>عرض: <span id="width-order" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfcount" style="display: none"> <i class="fa fa-angle-left"></i>تعداد : <span id="count-order" class="d2p-left"></span> </li>
                                                                    <li class="chap_row punch" style="display: none"> <i class="fa fa-angle-left"></i>تعداد پانچ : <span id="count-punch" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lifeh" style="display: none"> <i class="fa fa-angle-left"></i>سمت لیفه : <span id="lifehside" class="d2p-left"> <span id="lifehupside"></span> <span id="lifehdownside"></span> <span id="lifehleftside"></span> <span id="lifehrightside"></span> </span> </li>
                                                                    <li class="chap_row hidden">
                                                                        <input type="hidden" id="baseprice">
                                                                    </li>
                                                                    <li class="chap_row lfprice" style="display: none;"> <i class="fa fa-angle-left"></i>قیمت متر مربع :<span id="base-price" class="d2p-left"></span> </li>
                                                                    <li class="chap_row sheet-order" style="display: none;"> <i class="fa fa-angle-left"></i>تعداد در شیت: <span id="count-lat" class="d2p-left">NaN عدد </span> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="inside-payment chap_col-12">
                                                            <div class="chap_row">
                                                                <li class="details-price w-100">
                                                                    <ul class="prices price-d  ">
                                                                        <li class="final_cost clearfix"> قیمت نهایی: <span id="pd-total-paying-price" style="text-decoration: none;">0 تومان</span> <br>
                                                                        </li>
                                                                        <li class="mt-2 final_cost clearfix">
                                                                            <button id="sendorder" style="width: 100%;" class="btn btn-success btn-lg" type="submit">ثبت سفارش</button>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </div>
                                                            <li class="w-100 open-details">
                                                                <!--                                            <p class="--><!-- "> --><!--</p>-->
                                                                <!--                                            <p class="--><!-- "> --><!--</p>-->
                                                                <i class="fa fa-caret-up"></i> <i class="fa fa-caret-down hidden"></i> </li>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;">
                                                    <div class="mCSB_draggerContainer">
                                                        <div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; height: 0px; top: 0px;">
                                                            <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                                                        </div>
                                                        <div class="mCSB_draggerRail"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="footer-payment chap_col-12"></div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="top-right-side" class="right-side right-side-order chap_col-12 chap_col-md-7">
                                <div class="order_type color layout5 layout4">
                                    <h1>{{ $banner->name }}</h1>
                                </div>

                                <!--patterns-->
                                <div class="clearfix"></div>
                                <div id="trans-container">
                                    <div class="trans">
                                        <div class="form-group hidden"> </div>
                                        <div class="clearfix"></div>
                                        <div class="top-right-side">
                                            <div class="chap_row">
                                                <!--title-->
                                                <div class="chap_col-12" id="pd-title-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label"> عنوان سفارش <span>(جهت درج در فاکتور)</span> </label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myinput">
                                                                <input required placeholder="مثال : بنر مناسبتی آقای خلیلی" type="text" name="title" id="subject" class="form-control input-item text-input">
                                                                <label class="selectarrow1"> <span>جهت درج در فاکتور</span> </label>
                                                                <div class="title-error order-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--thickness-->
                                                <div class=" chap_col-12" id="pd-width-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label">ابعاد</label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myselect ">
                                                                <select required style="margin-bottom: 10px;" class="form-control input-item pd-offset-count-custom" id="size" name="size">
                                                                    <option value="">انتخاب کنید</option>
                                                                    <?php
                                                                    if($banner->prices){
                                                                    $prices = json_decode($banner->prices);
                                                                    foreach ($prices as $price){ ?>
                                                                    <option data-price="{{ $price->price }}" value="{{ $price->size }}">{{ $price->size }}</option>
                                                                    <?php }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--count-->
                                                <div class="chap_col-12" id="pd-count-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-count">
                                                            <label class="label"> تعداد </label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-count">
                                                            <div class="myinput">
                                                                <input required type="number" name="count" value="" id="pd-count" class="form-control input-item number text-input pd-length float ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>

                                            <!--price-->
                                            <div class="chap_col-12" id="pd-count-container">
                                                <div class="chap_row">
                                                    <div class="chap_col-12 chap_col-md-3 typeshow-count">
                                                        <label class="label">قیمت واحد</label>
                                                    </div>
                                                    <div class="chap_col-12 chap_col-md-9 typeshow-count">
                                                        <div class="myinput">
                                                            <input type="text" readonly value="" id="price" class="form-control input-item text-input float ">
                                                            <input type="hidden" name="product" readonly value="{{ $banner->name }}" class="form-control input-item number text-input pd-length float ">
                                                            <input type="hidden" name="price" readonly value="" id="pd-price" class="form-control input-item number text-input pd-length float ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <!--price-->
                                        <div class="chap_col-12" id="pd-count-container">
                                            <div class="chap_row">
                                                <div class="chap_col-12 chap_col-md-3 typeshow-count">
                                                    <label class="label">توضیحات </label>
                                                </div>
                                                <div class="chap_col-12 chap_col-md-9 typeshow-count">
                                                    <div class="myinput">
                                                        <textarea name="description" class="form-control text-input pd-length float"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="option-f-box chap_row">
                                        @if($banner->options)

                                        <div class="chap_col-12 option-f punchbox">
                                            <label class="label lable-f">مشخصات</label>
                                            <?php
                                            if($banner->options){
                                            $options = json_decode($banner->options);
                                            foreach ($options as $option){ ?>
                                            <div class="myinput">
                                                <input name="options[]" required placeholder="{{ $option }}" type="text" value="" id="price" class="form-control input-item text-input float ">
                                            </div>
                                            <?php }
                                            }?>
                                        </div>
                                        @endif
                                        <div class="chap_col-12 option-f punchbox">
                                            <label class="label lable-f">پانچ</label>
                                            <div class="myinput radioBtn">
                                                <ul class="chap_row">
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" value="0" class="pd-option-item radio with-gap" name="punch" id="nopanch">
                                                        <label class="radiolabel" for="nopanch">بدون پانچ</label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>
                                                    </li>
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" value="1" class="pd-option-item radio with-gap" name="punch" id="punch">
                                                        <label class="radiolabel" for="punch"> با پانچ </label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="chap_col-12 option-f">
                                            <label class="label lable-f">زمان تحویل</label>
                                            <div class="myinput radioBtn">
                                                <ul class="chap_row">
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" data-type="radio" value="{{ $banner->delivery }}" name="delivery" id="nolifeh">
                                                        <label class="radiolabel" for="nolifeh">{{ $banner->delivery }} روز کاری</label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!--files-->
                                        <div class="uploadboxs chap_row">
                                            <div style="padding: 0 !important; border: 2px solid #d8d8d8;border-radius: 5px 5px 0 0 ;" class=" chap_col-12 chap_col-sm-6 chap_col-md-12"> <span class="uploadbtn background layout4 layout2" style="display: flex">
                      <label type="button" style="display: inline-grid;background: transparent; border: none;width: 100%"  data-toggle="modal" data-target="#modal-select-galleries">انتخاب طرح</label>
                      </span> <img class="fileselected" style="width: 100%;padding: 10px" src="/img/no-img-placeholder-400x250.png">
                                                <input type="hidden" id="finalfile" name="file[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade " id="modal-select-galleries" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                            <h3 class="modal-title center" id="lineModalLabel">انتخاب طرح</h3>
                                        </div>
                                        <div class="modal-body modalimages">
                                            <div class="w-100 row modalSelectGalleriesContent">
                                                <div class="right-menu col-3 ">
                                                    <div class="right-menuHeader">
                                                        <h4 class="right-menuHeaderText"> <i class="flaticon-menu"></i> دسته بندی تصاویر </h4>
                                                    </div>
                                                    <div class="categories">
                                                        <ul id="modal-categories-container">
                                                            <?php
                                                            $category = \Illuminate\Support\Facades\DB::table('categories')->where('id',$banner->imagespath)->first();
                                                            $categoriess = \Illuminate\Support\Facades\DB::table('categories')->where('parent_id',$category->id)->get();

                                                            ?>

                                                            @foreach ($categoriess as $category)
                                                                <li class="modal-galley-category-id filter-button"  data-filter="{{ $category->id }}">
                                                                    <p class="inner_p toggle {{ 'li_'.$category->id }}">{{ $category->title }}</p>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="left-menu col-9 " style="filter: blur(0px); opacity: 1;">
                                                    <div class="gallery-images mCustomScrollbar _mCS_1 mCS-autoHide mCS-dir-rtl mCS_no_scrollbar" style="position: relative; overflow: visible;">
                                                        <div id="modal-galleries-image-container" class="imagescategory">

                                                            <div class="w-100 categoryBox row">

                                                                <?php
                                                                $categories = \Illuminate\Support\Facades\DB::table('categories')->where('parent_id',$banner->imagespath)->get();
                                                                $a = 0 ;
                                                                ?>
                                                                @foreach ($categories as $category)
                                                                    <div class="chap_col-sm-4 chap_col-6">
                                                                        <div class=" galleryBoxCategory">
                                                                            <div class="galleyCategoryBox id2493" data-target="2493">
                                                                                <i class="flaticon-photo"></i>
                                                                            </div>
                                                                            <p class="inner_p">{{ $category->title }}</p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                            </div>
                                                            <div class="w-100 imageBox imagescategory " style="display: none">
                                                                <div class="row imagesgeted">

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="clearfix"></div>
                                                        <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;">
                                                            <div class="mCSB_draggerContainer">
                                                                <div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; top: 0px; height: 0px;">
                                                                    <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                                                                </div>
                                                                <div class="mCSB_draggerRail"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="imageloader" style="display: none;"> <img src="/images/progress.gif" alt=""> </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">بستن</button>
                                                </div>
                                            </div>
                                            <input type="hidden" id="filename" class="filename" >
                                            <button disabled data-dismiss="modal"  id="acceptedfile" style="margin: 0 auto; background: green" type="button" class="btn btn-success"  role="button">تایید و ادامه</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="e"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="block - init block - border - color">
        <div class="row row - 70"></div>
    </div>
    <style>
        .containerimage {
            display: block;
            position: relative;
            margin-bottom: 13px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            bottom: 16px;
        }

        /* Hide the browser's default radio button */
        .containerimage input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 40px;
            width: 100%;
            text-align: center;
            background-color: #eee;
            border-radius: 0 0 5px 5px;
            line-height: 40px;
        }

        /* On mouse-over, add a grey background color */
        .containerimage:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .containerimage input:checked ~ .checkmark {
            background-color: green;
            color: #fff;
        }


        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .containerimage input:checked ~ .checkmark:after {
            display: block;
        }


        .modalimages{
            height: 500px;
            overflow-y: scroll;
        }
        .selectimage button {
            width: 100%;
            border-radius: 0 0 5px 5px;
        }
        .Portfolio{
            height: 273px;
            border:unset ;
            direction: ltr;
        }
        .preimage {
            height: 200px;
        }
        .Portfolio img {
            border-radius: 5px 5px 0 0;
            height: auto;
            top: 35%;
            position: relative;
            padding: 10px;
        }


        .Portfolio img {
            border-radius: 5px 5px 0 0;
            height: auto;
        }
        .modalimages:hover .Portfolio:hover {
            transform: scale(1);
            filter: blur(0px);
            opacity: 1;
            box-shadow: 0 8px 20px 0px rgba(0, 0, 0, 0.125);
        }
        .modalimages:hover .Portfolio:hover .selectimage{
            display: block;
        }




        .loading{
            background: #fff;
            background-position-x: 0%;
            background-position-y: 0%;
            background-repeat: repeat;
            background-image: none;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 9999999;
            top: 0;
            background-image: url(/img/preloaders/loading.gif);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 25%;
            display: none;
        }
        .loadingloading p{
            text-align: center;
            top: 33%;
            display: block;
            position: relative;
            font-size: 20px;
        }
        #importantRule { background: none !important; }

        .lable-f,.uploadbtn {
            background: #15A1B7 !important;
        }

        /* Hiding the checkbox, but allowing it to be focused */
        .badgebox
        {
            opacity: 0;
        }

        .badgebox + .badge
        {
            /* Move the check mark away when unchecked */
            text-indent: -999999px;
            /* Makes the badge's width stay the same checked and unchecked */
            width: 27px;
            background: #ffffff;
            color: #666666;
        }

        .badgebox:focus + .badge
        {
            /* Set something to make the badge looks focused */
            /* This really depends on the application, in my case it was: */

            /* Adding a light border */
            box-shadow: inset 0px 0px 5px;
            /* Taking the difference out of the padding */
        }

        .badgebox:checked + .badge
        {
            /* Move the check mark back when checked */
            text-indent: 0;
        }


        .progress {
            display: block;
            height: 1rem;
            overflow: hidden;
            line-height: 0;
            font-size: 0.675rem;
            background-color: #e9ecef;
            border-radius: 0;
            position: absolute;
            top: 42px;
            width: 100% !important;
            background: red;
        }

        .progress .bar {
            line-height:33px;
        }


        .mfp-bg {
            z-index: 100000;
        }
        .mfp-wrap {
            z-index: 999999;
        }
        .noimage {
            background: url(/img/no-image-available-icon-6.png);
            width: 100%;
            height: 350px;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <script>
        $("#size").change(function () {
            var size = $("#size").find(":selected");
            $('.lfthicknes').show('slow');
            $('#price').val(convertprice(size.data('price')));
            $('#pd-price').val(size.data('price'));
            $('#lf-thicknes').html(size.val());
            var count = $("#pd-count").val();

            $('#pd-total-paying-price').html(convertprice(size.data('price')*count));
checkprice()

        });

        $("#pd-count").keyup(function () {
            var count = $("#pd-count").val();
            $('.lfcount').show('slow');
            $('#count-order').html(count);
            var size = $("#size").find(":selected");
            $('#pd-total-paying-price').html(convertprice(size.data('price')*count));
            checkprice()
        });


        $("#pd-count").change(function () {
            var count = $("#pd-count").val();
            $('.lfcount').show('slow');
            $('#count-order').html(count);
            var size = $("#size").find(":selected");
            $('#pd-total-paying-price').html(convertprice(size.data('price')*count));
            checkprice()
        });

        function convertprice(price) {
            var nStr  = (price) + '';
            nStr = nStr.replace(/\,/g, "");
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2 + ' تومان'
            checkprice()
        }

        $(document).on("click", ".chooseImage", function(){
            $('.gallery-image-container').css('border','2px solid #ebebeb');

            thisRadio = $(this);
            var divid = thisRadio.data('getid');
            var filename = thisRadio.data('filename');
            $("input[name='radioBtn']").not(thisRadio).removeClass("imChecked");
            if (thisRadio.hasClass("imChecked")) {
                thisRadio.removeClass("imChecked");

                thisRadio.prop('checked', false);
                $('#div_'+divid).css({"border":"2px solid #ebebeb"});
                $('#acceptedfile').attr('disabled', 'disabled');
                $('.filename').val('');

            } else {
                $('#div_'+divid).css({"border":"2px solid green"});
                thisRadio.prop('checked', true);
                thisRadio.addClass("imChecked");
                $('#acceptedfile').removeAttr('disabled', 'disabled');
                $('.filename').val(filename);
            };

        });


        $('#acceptedfile').click(function () {

            var file = $('.filename').val();
            $(".fileselected").attr('src',file);
            $("#finalfile").val(file);
            checkprice()
        });

        $(".filter-button").click(function(){

            var value = $(this).attr('data-filter');
            $('.inner_p').removeClass('active');
            $('.li_'+value).addClass("active");
            $('.categoryBox').hide();

            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": value
                },
                url: '{{ route('get.images.category') }}',
                beforeSend: function() {
                    $('.imageloader').show('slow');
                },
                success: function(data) {
                    $('.imagesgeted').html('');
                    $('.imagesgeted').removeClass('noimage');

                    if(data != 'no image') {
                        $('.imageBox').show();
console.log(data);
                        $.each(data, function (kay, val) {
                            $('.imagesgeted').append(
                                '<div  class="chap_col-sm-4 chap_col-6 galleryBoxGallery">' +
                                '<div id="div_'+val.id+'" class="gallery-image-container" >' +
                                '<div class="wrapper" >' +
                                '<a data-lightbox="' + val.name + '" class="image-link" href="' + val.path + '">'+
                                '<img class="wrapperimage" src="' + val.path + '" alt="' + val.name + '">' +
                                '</a>'+
                                '</div>' +
                                '<p>' + val.name + '</p>' +
                                '<div data-filename="'+val.path+'" data-getid="'+val.id+'" class="chooseImage">انتخاب</div>' +
                                '</div>' +
                                '</div>'
                            );

                        });



                    }else{
                        $('.imageBox').show();
                        $('.imagesgeted').addClass('noimage');

                    }
                    $('.imageloader').hide('slow');

                },
                error: function(xhr) { // if error occured
                    alert("Error occured.please try again");
                },
                complete: function() {
                }
            });






        });

        function checkprice() {

 var pd_price = $("#pd-total-paying-price").html();

 if( pd_price == '0 تومان'){
     $('#sendorder').attr('disabled','disabled')
 }else{
     $('#sendorder').removeAttr('disabled')
 }
        }

        checkprice()
    </script>
    <style>
        #lightboxOverlay,.lightbox {
            z-index: 9999999;
        }
    </style>
@endsection