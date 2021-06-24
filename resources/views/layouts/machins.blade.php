<section class="blf_1011--carousel blf_1011 block-init lightb-back">
    <div class="blf_1011--carousel__container blf_1011__container container">
        <div class="blf_1011--carousel__heading blf_1011__heading text-center">
            <div class="blf_1011--carousel__heading__content blf_1011__heading__content col-12">
                <h2 class="blf_1011--carousel__heading__h blf_1011__heading__h">ماشین آلات</h2>
            </div>
        </div>
        <div class="blf_1011--carousel__row blf_1011__row mt-5 owl-carousel" id="blf_1011">
        @foreach($machins as $machin)
            <div class="blf_1011--carousel__col blf_1011__col  mb-4">
                <div class="blf_1011--carousel__col__content blf_1011__col__content text-center rounded">
                    <a title="عنوان" class="blf_1011--carousel__col__a blf_1011__col__a"
                       href="{{ url('مقالات/'.$machin->slug) }}">
                        <img alt="چاپ اُفست"
                             class="blf_1011--carousel__col__img blf_1011__col__img img-fluid"
                             src="http://rezvanprint.com/upload/586/files/LPXfnm5h/aUZHx3bh.jpg">
                        <h3 class="blf_1011--carousel__col__h blf_1011__col__h pl-4 pr-4 pt-4 mb-0">
                            <strong>{{ $machin->title }}</strong>
                        </h3>
                    </a>
                </div>
            </div>
        @endforeach
        </div>

    </div>
</section>
