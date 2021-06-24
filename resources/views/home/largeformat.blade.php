@extends('layouts.app')

@section('content')

    <div class="swal2-container"><div class="swal2-overlay" tabindex="-1" style="display: none;">

        </div>
        <div class="swal2-modal hide-swal2" style="display: none; width: 500px; padding: 20px; margin-left: -250px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-top: -75px;" tabindex="-1">
            <div class="swal2-icon swal2-error" style="display: none;">
                <span class="x-mark"><span class="line left"></span>
                    <span class="line right"></span></span></div>
            <div class="swal2-icon swal2-question" style="display: none;">?</div>
            <div class="swal2-icon swal2-warning" style="display: none;">!</div>
            <div class="swal2-icon swal2-info" style="display: none;">i</div>
            <div class="swal2-icon swal2-success" style="display: none;"><span class="line tip"></span>
                <span class="line long"></span><div class="placeholder"></div>
                <div class="fix"></div></div>
            <img class="swal2-image" src="/img/preloaders/progress.gif"><h2>لطفا صبر کنید...</h2><div class="swal2-content" style="display: block;">در حال دریافت اطلاعات محصول</div><input class="swal2-input" style="display: none;"><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label class="swal2-checkbox" style="display: none;"><input type="checkbox" id="swal2-checkbox"></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validationerror" style="display: none;"></div><hr class="swal2-spacer" style="display: none;"><button class="swal2-confirm styled" style="display: none; background-color: rgb(48, 133, 214); border-left-color: rgb(48, 133, 214); border-right-color: rgb(48, 133, 214);">OK</button><button class="swal2-cancel styled" style="display: none; background-color: rgb(170, 170, 170);">Cancel</button><span class="swal2-close" style="display: none;">×</span></div></div>


    <div id="wrap_all">
        <div class="dashboard chap_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item"><a href="/articles">مقالات</a></li>
                    <li class="breadcrumb-item active">{{ $product->title }}</li>
                </ol>
            </nav>
            <div id="chap_content">
                <div class="section">
                    <div class="chap_row">
                        <form class="chap_col-12 form-horizontal" action="{{ route('addorder') }}" method="POST" id="pd-form" enctype="multipart/form-data">
                           @csrf
                            @include('admin.layouts.errors')

                            <div id="bottom-right-side" class="left-side left-side-order chap_col-12 chap_col-md-5 order-12" style="min-height: 1109px;">
                                <div id="all-left-side" style="min-height: 1109px;">
                                    <!--total price-->
                                    <div id="pay-fixed" class="payments"> <span class="click-d dargTopDownBtn hidden"> <img src=":/img/arrow.gif"> </span>
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
                                                                <p>{{ $product->title }}</p>
                                                            </div>
                                                            <div class="details-product-price d2p">
                                                                <ul>
                                                                    <li class="chap_row lfdevice" style="display: none;"> <i class="fa fa-angle-left"></i>نوع دستگاه چاپ : <span id="lf-device" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfthicknes" style="display: none;"> <i class="fa fa-angle-left"></i>ضخامت: <span id="lf-thicknes" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfpass" style="display: none;"> <i class="fa fa-angle-left"></i>پس : <span id="lf-pass" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lflength" style="display: none;"> <i class="fa fa-angle-left"></i>طول: <span id="length-order" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfwidth" style="display: none;"> <i class="fa fa-angle-left"></i>عرض: <span id="width-order" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lfcount" style="display: none"> <i class="fa fa-angle-left"></i>تعداد : <span id="count-order" class="d2p-left"></span> </li>
                                                                    <li class="chap_row punch" style="display: none"> <i class="fa fa-angle-left"></i>تعداد پانچ : <span id="count-punch" class="d2p-left"></span> </li>
                                                                    <li class="chap_row lifeh" style="display: none"> <i class="fa fa-angle-left"></i>سمت لیفه : <span id="lifehside" class="d2p-left">
                                                                            <span id="lifehupside"></span>
                                                                            <span id="lifehdownside"></span>
                                                                            <span id="lifehleftside"></span>
                                                                            <span id="lifehrightside"></span>
                                                                        </span> </li>
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
                                                                            <button style="width: 100%;" class="btn btn-success btn-lg" type="submit">ثبت سفارش</button>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </div>
                                                            <li class="w-100 open-details">
                                                                <!--                                            <p class="--><!-- "> --><!--</p>-->
                                                                <!--                                            <p class="--><!-- "> --><!--</p>-->
                                                                <i class="fa fa-caret-up"></i> <i class="fa fa-caret-down hidden"></i> </li>
                                                            <input type="hidden" name="type" value="1">
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
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
                                    <h1>{{ $product->title }}</h1>
                                </div>

                                <!--patterns-->

                                <div class="clearfix"></div>
                                <div id="trans-container">
                                    <div class="trans">
                                        <div class="form-group hidden">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="top-right-side">
                                            <div class="chap_row">

                                                <!--title-->
                                                <div class="chap_col-12" id="pd-title-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label"> عنوان سفارش <span>(جهت درج در فاکتور)</span> </label>
                                                        </div>
                                                        <input name="media_id" type="hidden" value="{{ $product->media }}">
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myinput">
                                                                <input required placeholder="مثال : استند باشگاه بدنسازی - محمدی" type="text" name="title" id="subject" class="form-control input-item text-input">
                                                                <input type="hidden" name="model" value="{{ get_class($product) }}">
                                                                <label class="selectarrow1"> <span>جهت درج در فاکتور</span> </label>
                                                                <div class="title-error order-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                @foreach($options as $option)
                                            <?php $opt['devices'][] = $option->device_id .':'. $option->device_name ; ?>
                                            <?php //$opt['thicknesses'][] = $option->thickness_id .':'. $option->thickness_name ; ?>
                                            <?php //$opt['passes'][] = $option->pass_id .':'. $option->pass_name ; ?>
                                                @endforeach

                                                    <?php
                                                    $devices = array_unique($opt['devices']);
                                                    //$thicknesses = array_unique($opt['thicknesses']);
                                                    //$passes = array_unique($opt['passes']);
                                                    ?>
                                                <!--device-->
                                                <div class=" chap_col-12" id="pd-width-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label">نوع دستگاه</label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myselect ">
                                                                <select style="margin-bottom: 10px;" class="form-control input-item pd-offset-count-custom" id="pd-device" name="device">
                                                                    <option value="">انتخاب کنید</option>

                                                                    @foreach( $devices as $device)
                                                                        <?php $device = explode(':',$device); ?>
                                                                            <option value="{{$device[0]}}">{{$device[1]}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--thickness-->
                                                <div class=" chap_col-12" id="pd-width-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label">ضخامت</label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myselect ">
                                                                <select style="margin-bottom: 10px;" class="form-control input-item pd-offset-count-custom" id="pd-thickness" name="thickness">
                                                                    <option value="">انتخاب کنید</option>



                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--pass-->
                                                <div class=" chap_col-12" id="pd-width-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label">Pass</label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myselect ">
                                                                <select style="margin-bottom: 10px;" class="form-control input-item pd-offset-count-custom" id="pd-pass" name="pass">
                                                                    <option value="">انتخاب کنید</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--height-->
                                                <div class=" chap_col-12" id="pd-length-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label"> طول </label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myinput">
                                                                <input type="text" name="height" value="" id="pd-length" data-length="8.5" class="form-control input-item number text-input pd-length float ">
                                                                <div class="length-error order-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--width-->
                                                <div class=" chap_col-12" id="pd-width-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label"> عرض </label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myselect ">
                                                                <select style="margin-bottom: 10px;" class="form-control input-item pd-offset-count-custom" id="pd-width" data-no="1" data-min="" name="width">
                                                                    <option value="">انتخاب کنید</option>

                                                                    @php
                                                                        $widths = DB::table('printingofficewidths')->get();
                                                                    @endphp
                                                                    @foreach ($widths as $width)
                                                                        @if(in_array($width->id,json_decode($product->widths)))

                                                                            <option data-width="{{ $width->size }}" value="{{ $width->size }}">{{ $width->size . ' سانتی متر' }}</option>

                                                                        @endif
                                                                    @endforeach

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
                                                                <input type="text" name="count" value="" id="pd-count" data-length="8.5" class="form-control input-item number text-input pd-length float ">
                                                                <div class="length-error order-error"></div>
                                                                <div class="count-error order-error"></div>
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
                                                            <input type="text" name="price" readonly value="" id="pd-price" class="form-control input-item number text-input pd-length float ">
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

                                        <div class="chap_col-12 option-f punchbox">
                                            <label class="label lable-f">پانچ</label>
                                            <div class="myinput radioBtn">
                                                <ul class="chap_row">
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" value="0" class="pd-option-item radio with-gap" name="punch[]" id="nopanch">
                                                        <label class="radiolabel" for="nopanch">بدون پانچ</label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>

                                                    </li>
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" value="1" class="pd-option-item radio with-gap" name="punch[]" id="punch">
                                                        <label class="radiolabel" for="punch">
                                                            با پانچ                                                                                                                            </label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="chap_col-12 option-f lifehbox">
                                            <label class="label lable-f">لیفه</label>
                                            <div class="myinput radioBtn">
                                                <ul class="chap_row">
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" data-type="radio" value="0" name="lifeh[]" id="nolifeh">
                                                        <label class="radiolabel" for="nolifeh">بدون لیفه</label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>

                                                    </li>
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" data-type="radio" value="tree" class="pd-option-item radio with-gap optgp1991702" name="lifeh[]" id="tree">
                                                        <label class="radiolabel" for="tree">لیفه درختی</label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>

                                                    </li>
                                                    <li class="chap_col-sm-4">
                                                        <input type="radio" data-type="radio" value="darbasti" class="pd-option-item radio with-gap optgp1991702" name="lifeh[]" id="darbasti">
                                                        <label class="radiolabel" for="darbasti">لیفه داربستی</label>
                                                        <div class="check">
                                                            <div class="inside"></div>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>



                                    <!--files-->
                                    <div class="uploadboxs chap_row">
                                        <div style="padding: 0 !important;" class="dropzone-file-upload chap_col-12 chap_col-sm-6 chap_col-md-12">
                                            <span class="uploadbtn background layout4 layout2" style="display: flex">

                <label for="file" style="width: 50%;display: inline-grid">بارگزاری تصویر</label>
<button type="button" style="display: inline-grid;background: transparent; border: none;width: 50%"  data-toggle="modal" data-target="#selectfile">انتخاب فایل</button>
<input value="" type="file" id="file" style="display: none" name="file" accept=".jpg,.tif">


<div class="progress" style="display: none">
  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>


                                                <div id="status"></div>

                <input type="hidden" name="file[]" id="imageforupload">


                </span>
                                            <div class="uploadbox">
                                                <div class="file-container dropzone no-padding no-margin dropzone-all dz-clickable" id="digital-file-0"> </div>
                                            </div>
                                            <script>
                                                var startStickyPoint = 0;
                                                $(document).ready(function () {
                                                    var windowWidth = $(window).width();
                                                    if (windowWidth > 993) {
                                                        setTimeout(function () {
                                                            var heightRightSideOrder = $('.right-side-order').height();
                                                            $('.left-side-order').css('min-height', heightRightSideOrder + 'px');
                                                            $('#all-left-side').css('min-height', heightRightSideOrder + 'px');
                                                        }, 1000);
                                                    } else {
                                                    }
                                                    $(window).on('scroll', function () {
                                                        try {
                                                            var windowTop = $(window).scrollTop();
                                                            var contentTop = $('#pay-fixed').offset().top;

                                                            if (startStickyPoint > 0) {
                                                                if (windowTop > startStickyPoint) {
                                                                    $('#pay-fixed').addClass('sticky');
                                                                } else {
                                                                    $('#pay-fixed').removeClass('sticky');
                                                                }
                                                            } else {
                                                                if (windowTop > contentTop) {
                                                                    $('#pay-fixed').addClass('sticky');
                                                                    startStickyPoint = contentTop;
                                                                }
                                                            }
                                                        } catch (error) {

                                                        }

                                                    });
                                                });


                                                $("input").blur(function () {
                                                    var haveSelector = $(this).hasClass('number');
                                                    if (haveSelector == true) {
                                                        $(this).addClass('number-show');
                                                    } else {

                                                    }
                                                });

                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                    <div class="modal fade" id="selectfile" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h3 class="modal-title center" id="lineModalLabel">انتخاب فایل های بارگذاری شده</h3>
                                </div>
                                <div class="modal-body modalimages">

                                    @php

                                    $files = DB::table('printingofficeimages')
                                    ->where('printingofficeimages.state', '=',0)
                                    ->where('printingofficeimages.user_id', '=',\Illuminate\Support\Facades\Auth::user()->id)
                                    ->get();
                                    //var_dump($files);die;
                                    foreach ($files as $file){
                                    @endphp

                                        <div class="Portfolio"><img class="card-img" src="/uploads/<?php echo $file->user_id ; ?>/<?php echo $file->name ; ?>" alt="<?php echo $file->name ; ?>"><a onclick="selectedfile('<?php echo $file->name ; ?>')" href="#"><div class="desc">انتخاب</div></a></div>

                                   @php } @endphp



                                </div>
                                <div class="modal-footer">
                                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">بستن</button>
                                        </div>

                                    </div>
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
    height: 1rem;
    overflow: hidden;
    line-height: 0;
    font-size: 0.675rem;
    background-color: #e9ecef;
    border-radius: 0;
    position: absolute;
    top: 50px;
    width: 100% !important;
    }
        .progress-bar{
            background: #0a090b;
        }

    </style>

    <script>


        $('#file').on('change', function() {
            $('.progress').show('slow');



            var file_data = $('#file').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('_token', '{{ @csrf_token() }}');

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();

                    xhr.upload.addEventListener("progress", function(evt) {

                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            $('.progress-bar').width(percentComplete+'%');
                            $('.progress-bar').html(percentComplete+'%');
                            if(percentComplete == 100){
                                $('.progress').hide();
                            }
                        }
                    }, false);

                    return xhr;
                },
                url: '{{ route('uploadfile') }}', // point to server-side PHP script
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    if (response != 'error') {
                        $('#digital-file-0').hide('slow');
                        $('#imageforupload').val(response);

                        $('.progress').hide('slow');
                        $('.uploadbox').html('');
                        $('.uploadbox').append('<img style="max-width: 100%;padding: 10px;" src="/uploads/{{ \Illuminate\Support\Facades\Auth::user()->id }}/' + response + '" >');
                    }else{
                        alert('خطا در بارگذاری فایل');
                    }
                }
            });
        });


    </script>

    <script>

        function selectedfile(id){
            $('#imageforupload').val(id);
            $('.uploadbox').html('');
            $('.uploadbox').append('<img style="max-width: 100%;padding: 10px;" src="/uploads/{{ \Illuminate\Support\Facades\Auth::user()->id }}/' + id + '" >');

            $(".close").click();
        }



        $('#pd-form')[0].reset();





        $( "#pd-length" ).keyup(function(val) {
            var vallength = ($(this).val());
            $('.lflength').show('slow');
            $('#length-order').html(vallength+' سانتی متر');
            getTotalPrice();

        });

        $( "#pd-length" ).change(function(val) {
            var vallength = ($(this).val());
            $('.lflength').show('slow');
            $('#length-order').html(vallength+' سانتی متر');
            getTotalPrice();

        });


    $( "#pd-count" ).keyup(function(val) {
    var valcount = ($(this).val());
    $('.lfcount').show('slow');
    $('#count-order').html(valcount+' عدد');
    getTotalPrice();

    });

    $( "#pd-count" ).change(function(val) {
    var valcount = ($(this).val());
    $('.lfcount').show('slow');
    $('#count-order').html(valcount+' عدد');
    getTotalPrice();

    });

    $( "#pd-width" ).change(function(val) {
    var valwidth = $(this).find(":selected").text();
    $('.lfwidth').show('slow');
    $('#width-order').html(valwidth);
    getTotalPrice();
    });

    function getTotalPrice() {

    var totalpayingprice = 330 ;

    var w = $("#pd-width").find(":selected").data('width')/100;
    var h = $( "#pd-length" ).val()/100;
    var p = $('#baseprice').val();
    var c = $('#pd-count').val();


    var nStr  = (w*h*p) * c + '';
    nStr = nStr.replace(/\,/g, "");
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }


    if (x1 + x2 == 'NaN') {
    $('#pd-total-paying-price').html(0);
    } else {
    $('#pd-total-paying-price').html(x1 + x2 +' تومان');
    }




    }

    $( "#pd-device" ).change(function(val) {
    var deviceid = $("#pd-device").find(":selected").val();
    var devicename = $("#pd-device").find(":selected").text();

    $('.lfdevice').show('slow');
    $('#lf-device').html(devicename);


    $.ajax({
    beforeSend: function() {
    // setting a timeout
    $('.swal2-modal').show('slow');
    },
    type: "GET",
    url: '{{ route('ajax') }}',
    data: {
    'deviceid': deviceid,
    'productid': '{{ $product->id }}'
    },
    success: function (msg) {
    $('.swal2-modal').hide('slow');

    $('#pd-thickness').children().remove();
    $('#pd-thickness').append('<option value="">انتخاب کنید</option>');

    $.each(msg, function (key, value) {
    $('#pd-thickness').append('<option value="' + value.thickness_id + '">' + value.thickness_name + '</option>');
    });
    }
    });
    });

    $("#pd-thickness").change(function (val) {
    var thicknessid = $("#pd-thickness").find(":selected").val();
    var deviceid = $("#pd-device").find(":selected").val();
    var thicknessname = $("#pd-device").find(":selected").text();
    $('.lfthicknes').show('slow');
    $('#lf-thicknes').html(thicknessname);


    $.ajax({
    beforeSend: function() {
    // setting a timeout
    $('.swal2-modal').show('slow');
    },
    type: "GET",
    url: '{{ route('ajax') }}',
    data: {
    'deviceid': deviceid,
    'thicknessid': thicknessid,
    'productid': '{{ $product->id }}'
    },
    success: function (msg) {
    $('.swal2-modal').hide('slow');

    $('#pd-pass').children().remove();
    $('#pd-pass').append('<option value="">انتخاب کنید</option>');
    $.each(msg, function (key, value) {
    $('#pd-pass').append('<option value="' + value.pass_id + '">' + value.pass_name + '</option>');
    });
    }
    });
    });

    $("#pd-pass").change(function (val) {
    var thicknessid = $("#pd-thickness").find(":selected").val();
    var deviceid = $("#pd-device").find(":selected").val();
    var passid = $("#pd-pass").find(":selected").val();
    var passname = $("#pd-pass").find(":selected").text();
    $('.lfpass').show('slow');
    $('#lf-pass').html(passname);

    $.ajax({
    beforeSend: function() {
    // setting a timeout
    $('.swal2-modal').show('slow');
    },
    type: "GET",
    url: '{{ route('ajax') }}',
    data: {
    'deviceid': deviceid,
    'thicknessid': thicknessid,
    'passid': passid,
    'productid': '{{ $product->id }}'
    },
    success: function (msg) {

    $('.swal2-modal').hide('slow');

    var nStr  = (msg.price) + '';
    nStr = nStr.replace(/\,/g, "");
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

$('.lfprice').show('slow');



    $('#pd-price').val(x1 + x2 + ' تومان') ;
    $('#base-price').html(x1 + x2 + ' تومان') ;
    $('#baseprice').val(parseInt(msg.price)) ;
        getTotalPrice();

    }
    });
    });

        $('#punch').change(function() {
            if($('#punch').is(':checked')) {
                $('.lifehcounter').remove();
                $('.lifehbox').hide('slow');
                $('.punchbox').append('<div class="punchcounter"><label>تعداد پانچ</label><input type="number" name="punchcount" value="" id="lfpunchcount" class="lfpunchcount form-control input-item number text-input pd-length float  number-show"></div>');
                $('.lfpunchcount').on('keyup', function() {
                    var punchcount = ($(this).val());
                    $('.punch').show('slow');
                    $('#count-punch').html(punchcount+' عدد');
                    getTotalPrice();
                });
            }
        });


        $('#nopanch').change(function() {
            if($('#nopanch').is(':checked')) {
                $('.lifehbox').show('slow');
                $('.punchcounter').remove();
                $('.punch').hide('slow');
                $('#count-punch').html(0+' عدد');
            }
        });

        $('#tree').change(function() {
            if($('#tree').is(':checked')) {
                $('.lifehcounter').remove();



                $('.punchcounter').remove();
                $('.punchbox').hide('slow');




                $('.lifehbox').append('<div class="lifehcounter"><label style="width: 100%">سمت لیفه</label>'+
                '            <label for="lifehup"   class="btn btn-warning">بالا <input value="up" name="lifehside[]" type="checkbox" id="lifehup" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '        <label for="lifehdown" class="btn btn-primary">پایین <input value="down" name="lifehside[]" type="checkbox" id="lifehdown" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '        <label for="lifeleft"  class="btn btn-info">چپ <input value="left" name="lifehside[]" type="checkbox" id="lifeleft" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '        <label for="liferight" class="btn btn-success">راست <input value="right" name="lifehside[]" type="checkbox" id="liferight" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '</div>');

                $('input[name="lifehside[]"]').on("click", function(){
                    $('.lifeh').show('slow');
                    up = $("#lifehup").prop("checked");
                    down = $("#lifehdown").prop("checked");
                    left = $("#lifeleft").prop("checked");
                    right = $("#liferight").prop("checked");

                    if(up){
                        $('#lifehupside').html('بالا');
                    }else {
                        $('#lifehupside').html('');
                    }

                        if(down){
                            $('#lifehdownside').html('پایین');
                        }else {
                            $('#lifehdownside').html('');
                        }

                        if(left){
                            $('#lifehleftside').html('چپ');
                        }else {
                            $('#lifehleftside').html('');
                        }

                        if(right){
                            $('#lifehrightside').html('راست');
                        }else {
                            $('#lifehrightside').html('');
                        }



                });




            }
        });

        $('#darbasti').change(function() {
            if($('#darbasti').is(':checked')) {
                $('.lifehcounter').remove();

                $('.punchcounter').remove();
                $('.punchbox').hide('slow');


                $('.lifehbox').append('<div class="lifehcounter"><label style="width: 100%">سمت لیفه</label>'+
                    '            <label for="lifehup"   class="btn btn-warning">بالا <input value="1" name="lifehside[]" type="checkbox" id="lifehup" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '        <label for="lifehdown" class="btn btn-primary">پایین <input name="lifehside[]" type="checkbox" id="lifehdown" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '        <label for="lifeleft"  class="btn btn-info">چپ <input name="lifehside[]" type="checkbox" id="lifeleft" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '        <label for="liferight" class="btn btn-success">راست <input name="lifehside[]" type="checkbox" id="liferight" class="badgebox"><span class="badge">&check;</span></label>\n' +
                    '</div>');

                $('input[name="lifehside[]"]').on("click", function(){
                    $('.lifeh').show('slow');
                    up = $("#lifehup").prop("checked");
                    down = $("#lifehdown").prop("checked");
                    left = $("#lifeleft").prop("checked");
                    right = $("#liferight").prop("checked");

                    if(up){
                        $('#lifehupside').html('بالا');
                    }else{
                        $('#lifehupside').html('');
                    }

                        if(down){
                            $('#lifehdownside').html('پایین');
                        }else {
                            $('#lifehdownside').html('');
                        }

                        if(left){
                            $('#lifehleftside').html('چپ');
                        }else {
                            $('#lifehleftside').html('');
                        }

                        if(right){
                            $('#lifehrightside').html('راست');
                        }else {
                            $('#lifehrightside').html('');
                        }



                });

            }
        });

        $('#nolifeh').change(function() {
            if($('#nolifeh').is(':checked')) {
                $('.lifehcounter').remove();

                $('.punchbox').show('slow');
                $('.lifeh').hide('slow');


            }
        });



        $('.lfpunchcount').on('keyup', function() {
            alert('click');
        });





    </script>
@endsection