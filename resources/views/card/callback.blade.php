@extends('layouts.app')

@section('content')
    <div id="wrap_all">
        <div class="dashboard chap_container">



            <div id="chap_content">

                <section class="news-item no-padding no-margin no-border">
                    <div class="chap_col-12">
                        <div class="news-item-header">

                        </div>
                        <div class="news-item-content content-from-text-editor">
                            @if(request()->get('Status') == 'NOK')
                            <h1 class="alert alert-danger" style="text-align: center">{{ $perror }}</h1>

                            @else
                                <h2 class="alert alert-success" style="text-align: center">
                                    <?php $orders = request()->get('orderid');
                                          $orders = explode('_',$orders);
                                          ?>
                                   فاکتورهای شماره : {{ implode(' - ',$orders) }} با موفقیت پرداخت شد.
                                </br>
                                شناسه پرداخت : {{ $success }}
                                </h2>
                                <a href="{{ url('showlargeformatorder/'.request()->get('orderid')) }}" class="btn btn-lg btn-warning">نمایش جزئیات سفارش</a>

                            @endif
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
@endsection