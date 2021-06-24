<section class="sld_1007 block-init lightb-back">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-12 d-none d-lg-block">
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-sm-6 col-6 mb-4">
                        <a href="http://rezvanprint.com/category/NDU2MTY%3D/%D8%AB%D8%A8%D8%AA%20%D8%B3%D9%81%D8%A7%D8%B1%D8%B4%20%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C">
                            <img class="side_baner img-fluid"
                                 src="/img/7U8miCkV.jpg">
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-6 mb-sm-4 mb-md-0">
                        <a href="https://www.instagram.com/rezvan.print">
                            <img class="side_baner img-fluid"
                                 src="/img/onbkqd9T.jpg">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-12">
                <!-- MasterSlider -->
                <div id="P_masterslider" class="sld_1007__main master-slider-parent ms-parent-id-37">
                    <!-- MasterSlider Main -->
                    <div id="sld_1007" class="sld_1007__slider master-slider ms-skin-default">

                        @foreach(\Modules\Slider\Entities\Slider::all() as $slider)

                        <div class="sld_1011__slide ms-slide" data-delay="5.6" data-fill-mode="fill">
                            <img alt="{{ $slider->alt }}" class="sld_1011__slide" title="business-bg-slide1"
                                 data-src="{{ $slider->image }}"
                            />
                            <a href="{{ $slider->url }}"
                               target="_blank">
                            </a>
                        </div>
                       @endforeach

                    </div>
                    <!-- END MasterSlider Main -->
                </div>
                <!-- END MasterSlider -->
            </div>
            <div class="col-xl-3 col-lg-3 col-12 mt-3 d-lg-none d-xl-none d-md-block">
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-sm-6 col-6 mb-4">
                        <a href="http://rezvanprint.com/category/NDU2MTY%3D/%D8%AB%D8%A8%D8%AA%20%D8%B3%D9%81%D8%A7%D8%B1%D8%B4%20%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C">
                            <img class="side_baner img-fluid"
                                 src="/img/7U8miCkV.jpg">
                        </a>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-6 mb-sm-4 mb-md-0">
                        <a href="https://www.instagram.com/rezvan.print">
                            <img class="side_baner img-fluid"
                                 src="/img/onbkqd9T.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
