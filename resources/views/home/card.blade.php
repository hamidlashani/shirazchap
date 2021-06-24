@extends('layouts.app')

@section('content')
    <div id="wrap_all">
        <div class="dashboard chap_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item active">{{ $card->name }}</li>
                </ol>
            </nav>
            <div id="chap_content">
                <div class="section">
                    <div class="chap_row">
                        <form class="w-100 chap_row form-horizontal" action="{{ route('addorder') }}" method="POST" id="pd-form" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layouts.errors')
                            <input type="hidden" value="{{get_class($card)}}" name="model">
                            <input type="hidden" name="product"  value="{{ $card->name.' '.$card->width.' '.$card->height }}">
                            <input type="hidden" name="size"  value="{{ $card->width.' * '.$card->height }}"  >
                            <input type="hidden" name="price"  value="" id="pd-price" >



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
                                                                <p>{{ $card->name }}</p>
                                                            </div>
                                                            <div class="details-product-price d2p">
                                                                <ul>
                                                                    <li class="chap_row p_circulation"> <i class="fa fa-angle-left"></i>تیراژ : <span id="lf-device" class="d2p-left">{{ number_format($card->circulation) }}</span> </li>
                                                                    <li class="chap_row p_side" style="display: none;"> <i class="fa fa-angle-left"></i>نوع چاپ: <span id="p_side_text" class="d2p-left"></span> </li>
                                                                    <li class="chap_row p_day" style="display: none;"> <i class="fa fa-angle-left"></i>زمان تحویل : <span id="p_day_text" class="d2p-left"></span> </li>
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
                                    <h1>{{ $card->name.' '.$card->width.' * '.$card->height }}</h1>
                                </div>

                                <!--patterns-->

                                <div class="clearfix"></div>
                                <div id="trans-container">
                                    <div class="trans">
                                        <div class="clearfix"></div>
                                        <div class="top-right-side">
                                            <div class="chap_row">
                                                <!--title-->
                                                <div class="chap_col-12" id="pd-title-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label">عنوان سفارش</label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myinput">
                                                                <input type="text" name="title" id="subject" class="form-control input-item text-input">
                                                                <label class="selectarrow1"> <span>جهت درج در فاکتور</span> </label>
                                                                <div class="title-error order-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" chap_col-12" id="pd-length-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label"> تیراژ </label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myinput">
                                                                <input type="text" readonly name="circulation" value="{{ $card->circulation }}" id="pd-length" data-length="8.5" class="form-control input-item number text-input pd-length float ">
                                                                <div class="length-error order-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" chap_col-12" id="pd-length-container">
                                                    <div class="chap_row">
                                                        <div class="chap_col-12 chap_col-md-3 typeshow-size">
                                                            <label class="label"> تعداد </label>
                                                        </div>
                                                        <div class="chap_col-12 chap_col-md-9 typeshow-size">
                                                            <div class="myinput">
                                                                <input type="number" name="count" value="" id="count" class="form-control input-item number text-input pd-length float ">
                                                                <div class="length-error order-error"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="upload_type" id="upload-type" value="dropzone">
                                        <div class="clearfix"></div>

                                        <!--options-->
                                        <div class="option-f-box chap_row">
                                            <div class="chap_col-12 option-f option-group-2531">
                                                <label class="label lable-f">نوع چاپ</label>
                                                <div class="myselect">
                                                    <select name="side" class="pd-option-select input-item form-control side">
                                                        <option value="">انتخاب کنید</option>

                                                        @if($card->side == 1 )

                                                            <option value="1" >چاپ یکرو</option>

                                                        @elseif($card->side == 2)

                                                            <option value="2" >چاپ دورو</option>

                                                        @endif


                                                    </select>
                                                    <!--selectarrow-->

                                                </div>
                                                <!--myselect-->
                                            </div>
                                            <div class="chap_col-12 option-f option-group-2530">
                                                <label class="label lable-f">زمان تحویل</label>
                                                <div class="myselect">
                                                    <select id="day" name="day" class="pd-option-select input-item form-control">
                                                        <option value="">انتخاب کنید</option>

                                                        @foreach(json_decode($card->dayprises) As $prises)

                                                            <option data-price="{{ $prises->price }}" value="{{ $prises->day }}" >{{ $prises->day }} روز کاری</option>

                                                        @endforeach

                                                    </select>
                                                    <!--selectarrow-->

                                                </div>
                                                <!--myselect-->
                                            </div>
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
                                        <!--files-->

                                        <div class="uploadboxs chap_row">
                                            <?php $c = 0 ; ?>
                                            @foreach(json_decode($card->files) as $file)
                                                <?php $c++ ; ?>
                                                <div style="padding-left: 0 !important;" class="dropzone-file-upload chap_col-12 chap_col-sm-6 chap_col-md-{{ (12) / count(json_decode($card->files)) }}"> <span class="uploadbtn background layout4 layout2" style="display: flex">
                      <label for="file{{ $c }}" style="width: 100%;display: inline-grid">{{ $file->text }}</label>
                      <input value="" data-num="1" type="file" id="file{{ $c }}" style="display: none"  accept=".jpg,.tif">
                      <div id="status"></div>
                      </span>
                                                    <input type="hidden" class="imageforupload{{$c}}"  name="file[]">

                                                    <div class="uploadbox uploadbox{{$c}}" >
                                                        <div class="file-container dropzone no-padding no-margin dropzone-all dz-clickable" id="digital-file-0"> </div>
                                                    </div>
                                                </div>
                                                <script>


                                                    $('#file{{ $c }}').on('change', function() {
                                                        $('.progress{{ $c }}').show('slow');

                                                        var file_data = $('#file{{ $c }}').prop('files')[0];
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
                                                                        $('.progress-bar{{ $c }}').width(percentComplete+'%');
                                                                        $('.progress-bar{{ $c }}').html(percentComplete+'%');
                                                                        if(percentComplete == 100){
                                                                            $('.progress{{ $c }}').hide();
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
                                                                    $('#digital-file-3').hide('slow');
                                                                    $('.imageforupload{{$c}}').val(response);
                                                                    $('.progress').hide('slow');
                                                                    $('.uploadbox{{ $c }}').html('');
                                                                    $('.uploadbox{{ $c }}').append('<img style="max-width: 100%;padding: 10px;" src="/uploads/{{ \Illuminate\Support\Facades\Auth::user()->id }}/' + response + '" >');
                                                                }else{
                                                                    alert('خطا در بارگذاری فایل');
                                                                }
                                                            }
                                                        });
                                                    });


                                                </script>
                                                <style>
                                                    .progress{{ $c }}{display: none}
                                                </style>
                                            @endforeach </div>
                                    </div>
                                </div>
                            </div>
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
         $("#count").keyup(function () {
            var count = $("#count").val();
            $('.lfcount').show('slow');
            $('#count-order').html(count);
             var baseprice = $("#baseprice").val();
             $('#pd-price').val(baseprice*count);
             $('#pd-total-paying-price').html(convertprice(baseprice*count));

             checkprice()
        });

         $("#count").change(function () {
             var count = $("#count").val();
             $('.lfcount').show('slow');
             $('#count-order').html(count);
             var baseprice = $("#baseprice").val();
             $('#pd-price').val(baseprice*count);

             $('#pd-total-paying-price').html(convertprice(baseprice*count));

             checkprice()
         });

         $(".side").change(function () {
             var sidetext = $(this).find(":selected").text();
             $('.p_side').show('slow');
             $('#p_side_text').html(sidetext);
             checkprice()
         });

         $("#day").change(function () {
             var daytext = $(this).find(":selected").text();
             var baseprice = $(this).find(":selected").data('price');
             $('#baseprice').val(baseprice);
             $('.p_day').show('slow');
             $('#p_day_text').html(daytext);
             var count = $("#count").val();


             $('#pd-price').val(baseprice*count);
             $('#pd-total-paying-price').html(convertprice(baseprice*count));

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