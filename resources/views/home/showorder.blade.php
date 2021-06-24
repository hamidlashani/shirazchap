@extends('layouts.app')

@section('content')
    <div id="wrap_all">
        <div class="dashboard chap_container">


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item"><a href="/articles">مقالات</a></li>
                    <li class="breadcrumb-item active">{{ $order->title }}</li>
                </ol>
                </nav>

            <div id="chap_content">

                <section class="news-item no-padding no-margin no-border">
                    <div class="row">
                        <div class="cinside-payment chap_col-6">
                            <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
                                <div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="rtl">
                                    <div class="header-payment chap_col-12">

                                        <div class="details-product-price">
                                            <p>{{ $order->title }}</p>
                                        </div>
                                        <div class="details-product-price d2p">
                                            <ul>
                                                <li class="chap_row lfthicknes"> <i class="fa fa-angle-left"></i>نام محصول : <span id="lf-thicknes" class="d2p-left">{{ $order->product }}</span> </li>
                                                <li class="chap_row lfthicknes"> <i class="fa fa-angle-left"></i>سایز : <span id="lf-thicknes" class="d2p-left">{{ $order->size }}</span> </li>
                                                <li class="chap_row lfcount" > <i class="fa fa-angle-left"></i>تعداد : <span id="count-order" class="d2p-left">{{ $order->count }}</span> </li>

                                                <?php $additions = json_decode($order->additions);

                                                 if($additions != null){

                                                $additions = (array)$additions[0];
                                                //var_dump($additions);
                                                ?>
                                                <li class="chap_row lfprice" > <i class="fa fa-angle-left"></i>موارد انتخابی : <span id="base-price" class="d2p-left">
                                                        <?php

                                                            if(array_key_exists('countpunch',$additions)){
                                                               // dd($additions);
                                                                echo 'تعداد '.$additions['countpunch'].' عدد پانچ';
                                                            }
                                                        if(array_key_exists('lifehtype',$additions)){
                                                            if($additions['lifehtype'] == 'tree'){
                                                                $ltype = 'درختی';
                                                            }elseif($additions['lifehtype'] == 'darbasti'){
                                                                $ltype = 'داربستی';
                                                            }
                                                            $lmeter = number_format($additions['lifehmeter']);
                                                            echo 'لیفه '.$ltype.' به متراژ '.$lmeter.' سانتی متر';

                                                        }
                                                        ?>
                                                    </span> </li>
                                                <?php } ?>
                                                <li class="chap_row lfprice" > <i class="fa fa-angle-left"></i> مبلغ فاکتور : <span id="base-price" class="d2p-left">{{ number_format($order->price) }} تومان</span> </li>

                                            </ul>
                                            @if(!$order->pay_id)
                                                <form action="{{ route('card.payment') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="orderid[]" value="{{ $order->id }}">
                                                    <button type="submit" style="color: #ffffff;width: 100%;" class="btn btn-success btn-lg">پرداخت فاکتور</button>

                                                </form>
                                             @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            @foreach(json_decode($order->file) as $file)
                                @if($order->category_type != 'Modules\Banners\Entities\Banner')
                                <img style="border-radius:15px;width: 100%" class="img-bordered p-1 mb-3" style="width: 100%" src="/orders/resized/{{ auth()->user()->id.'/'.$file }}" >
                                @else
                                    <img style="border-radius:15px;width: 100%" class="img-bordered p-1 mb-3" style="width: 100%" src="{{ $file }}" >
                                @endif
                                    @endforeach
                        </div>


                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="block - init block - border - color">
        <div class="row row - 70"></div>
    </div>



    <style>
        .header-payment .details-product-price ul li {
            padding: 0 !important;
            padding-right: 0px;
            font-size: 13px;
            line-height: 50px;
            display: block;
            height: 50px;
            background: #ebebeb;
            margin-bottom: 5px !important;
            padding-right: 20px !important;
            border-radius: 5px;
        }
        .details-product-price ul li .fa-angle-left {
            padding-top: 16px !important;
            padding-left: 4px;
            margin: 0;
            float: right;
            font-size: 16px;
            font-weight: 900;
        }
    </style>
@endsection