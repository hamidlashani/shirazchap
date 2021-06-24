<section class="blf_1005--carousel blf_1005 owl-bordered-nav block-init"
         style="background-image: url(http://rezvanprint.com//upload/586/template/5AsDLGYx.jpg)">
    <div class="blf_1005--carousel__container blf_1005__container container">
        <div class="blf_1005--carousel__heading blf_1005__heading text-center">
            <div class="blf_1005--carousel__heading__content blf_1005__heading__content col-12">
                <h2 class="blf_1005--carousel__heading__h blf_1005__heading__h">
                </h2>
            </div>
        </div>
        <div class="blf_1005--carousel__row blf_1005__row mt-5 owl-carousel" id="blf_1005">
            @foreach(\App\Models\Articles::limit(6)->get() as $article)
                <div class="blf_1005--carousel__col blf_1005__col">
                    <div class="blf_1005--carousel__col__content blf_1005__col__content shadow rounded">
                        <a href="/مقالات/{{ $article->slug }}">
                            <img style="border-radius: 10px 10px 0 0;height: 130px" alt="{{ $article->title }}" class="blf_1005--carousel__col__img blf_1005__col__img img-fluid "
                                 src="{{ $article->introimage }}">
                            <h3 class="blf_1005--carousel__col__h blf_1005__col__h pl-3 pr-3 h64">
                                        <span class="blf_1005--carousel-strong-text text-center">
                                            {{ $article->title }}
                                        </span>
                            </h3>
                            <p class="blf_1005--carousel__col__p blf_1005__col__p pl-3 pr-3 h78">
                                {{ mb_substr($article->intro ,0,200) }}
                            </p>

                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="blf_1005--carousel__row blf_1005__row row justify-content-center ">
        <a href="/مقالات" alt="" title="همه مطالب"
           class="blf_1005--carousel__a blf_1005__a btn btn-primary">همه مطالب</a>
    </div>
    </div>
</section>
