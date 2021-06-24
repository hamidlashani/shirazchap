@extends('layouts.app')

@section('content')
    <div class="container mb-5" style="margin-top: 10px">
        <div class="row blog-page">
            <div class="col-md-12 row">
                    <article class="col-sm-12 col-md-12 col-lg-12 mb-2">
                        <div class="basket_main card card--z- row" style="flex-direction: initial !important;   ">
                            <table class="shop_table table table-hover table-striped table-bordered"
                                   style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
                                   margin-bottom: 0">
                                <thead>
                                <tr>
                                    <th class="product-remove">شماره سفارش</th>
                                    <th class="product-name">عنوان سفارش</th>
                                    <th class="product-name">نوع سفارش</th>
                                    <th class="product-quantity">سایز</th>
                                    <th class="product-quantity">تعداد</th>
                                    <th class="product-subtotal">مبلغ سفارش</th>
                                </tr>
                                </thead>


                                <tbody>
                                    @foreach($orders as $order)
                                        <tr class="basket_1_cart-item cart_item">
                                            <td class="product-nameService">{{ $order->id }}</td>
                                            <td class="product-nameService">{{ $order->title }}</td>
                                            <td class="product-nameService">{{ $order->product }}</td>
                                            <td class="product-nameService">{{ $order->size }}</td>
                                            <td class="product-nameService">{{ $order->count }}</td>
                                            <td class="product-subtotal">
                                        <span class="total_amount">{{ number_format($order->price) }}
                                            <span class="Price-currencySymbol"> تومان </span>
                                        </span>
                                            </td>
                                        </tr>

                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </article>

            </div>
            {!! $orders->render(); !!}
        </div>
    </div>
    <style>
        .card-footer {
            padding: .75rem 1.25rem;
            background-color: rgba(0,0,0,.03);
            border-top: 1px solid rgba(0,0,0,.125);
            width: 100%;
        }
    </style>
@endsection
