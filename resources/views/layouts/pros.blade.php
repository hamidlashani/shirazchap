<section class="ctt_1041 block-init lightb-back">
    <div class="ctt_1041__container container">
        <div class="ctt_1041__row text-center">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="row">

<?php

                        $largeformats = DB::table('largeformats')
                        ->where('largeformats.state', '=',1)

                        ->join('printingofficeproductoptions', 'largeformats.id', '=', 'printingofficeproductoptions.product_id')
                        ->select('largeformats.*','printingofficeproductoptions.price')
                        ->groupBy('media')
                        ->orderBy('largeformats.id','asc')
                        ->paginate(8);
?>

                        @foreach($largeformats as $largeformat)
                            <div class="ctt_1041__col__box col-6 col-lg-3 col-sm-6 mb-4 pt-1">
                            <a title="عنوان" href="/چاپ-فضای-خارجی/{{ $largeformat->slug }}" class="ctt_1041__col__box__a d-block position-relative">
                                <img style="max-height: 400px" src="{{ $largeformat->image }}">
                                <div class="ctt_1041_2__subbox position-absolute h32">
                                        <span>{{ $largeformat->title }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
