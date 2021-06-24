@extends('layouts.app')

@section('content')
    <div id="wrap_all">
    <div class="dashboard chap_container" >
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page">مقالات</li>
            </ol>
        </nav>

        <div class=" blog-page">
            <div class="row">
                @foreach($largeformats as $largeformat)

                    <article class="col-sm-12 col-md-4 col-lg-4 mb-2">
                        <div class="card card--z-">
                            <div class="card-block" style="padding: 10px; text-align: right;">
                                <p style="text-align: center">عرض های موجود :
                                </p>
                                <p style="display: block">
                                    @php

                                        $widths = DB::table('printingofficewidths')->get();

                                    @endphp
                                    @foreach ($widths as $width)
                                        @if(in_array($width->id,json_decode($largeformat->widths)))
                                            <span class="border p-3 mb-2" style="background: #0009;text-align:center;width: 47%;margin-right: 2%;display:inline-block;" >{{$width->size}} سانتی متر</span>
                                        @endif
                                    @endforeach

                                </>
                            </div>

                            <img class="card-img-top" src="{{ $largeformat->image }}">
                            <div class="card-footer">
                                <h4 class="card-title mt-1" style="text-align: right">{{ $largeformat->title }}</h4>

                                <small>{{ $largeformat->price }} تومان</small>
                                <button class="m btn btn-secondary float-right btn-sm">
                                    <a style="color: #ffffff" href="/چاپ-فضای-خارجی/{{ $largeformat->slug }}">ثبت سفارش</a>
                                </button>
                            </div>
                        </div>
                    </article>

                @endforeach
            </div>
            <?php echo $largeformats->render(); ?>

        </div>
    </div>
    </div>
    <style>
        .card-block {
            position: absolute;
          /*  background: #00000080;
            background: linear-gradient( 45deg, rgba(29, 236, 197, 0.5), rgba(91, 14, 214, 0.5) 100% );
            background: linear-gradient(40deg,#ffd86f,#fc6262) !important;
            background: linear-gradient(40deg,#ff6ec4,#7873f5) !important; */
            background: linear-gradient(45deg,#000850 0%,#000320 100%), radial-gradient(100% 225% at 100% 0%,#FF6928 0%,#000000 100%), linear-gradient(225deg,#FF7A00 0%,#000000 100%), linear-gradient(135deg,#CDFFEB 10%,#CDFFEB 35%,#009F9D 35%,#009F9D 60%,#07456F 60%,#07456F 67%,#0F0A3C 67%,#0F0A3C 100%);
            background-blend-mode: screen, overlay, hard-light, normal;
            height: 100%;
            width: 100%;
            top: 105%;
            -webkit-transition: all 500ms ease-in-out;
            -moz-transition: all 500ms ease-in-out;
            -ms-transition: all 500ms ease-in-out;
            -o-transition: all 500ms ease-in-out;
            transition: all 500ms ease-in-out;
            color: #fff;
        }
        .card--z-:hover .card-block {
            top: 0;
        }

.card{
    overflow: hidden;
}
        .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125);
            z-index: 99;
            background: #fff;
        }
    </style>
@endsection
