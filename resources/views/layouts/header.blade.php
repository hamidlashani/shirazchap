<header id="AFHeader">
    <section class="tbr_1001 topbar text-right">
        <div class="container">
            <div class="row justify-content-between masterHeaderBox">
                <div class="white-header clearfix hidden-xs hidden-sm col-lg-9 row">
                    <div class="login-user register-login dark-gray-color clearfix"> </div>


                    <li id="secondMenu" class="">
                        <ul class="MenuMainUl mainUl">
                            @if(Auth::guest())
                                <li class="MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA " href="#">ورود یا عضویت</a><i class="fas fa-angle-down "></i>
                                    <ul menu-level="2" class="MenuMainUl listmenu">

                                <li class="enuList MenuMainUlli"> <a class="MenuListLiA MenuMainUlliA" href="{{ route('login') }}"> ورود <i class="fas fa-sign-in-alt"></i> </a> </li>
                                <li class="enuList MenuMainUlli"> <a class="MenuListLiA MenuMainUlliA" href="{{ route('register') }}"> عضویت <i class="fas fa-user-plus"></i> </a> </li>
                                    </ul>
                            @else
                                <li class="MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA " href="#">پنل کاربری</a><i class="fas fa-angle-down "></i>
                                    <ul menu-level="2" class="MenuMainUl listmenu">

                                        <li class="enuList MenuMainUlli">
                                            <a class="MenuListLiA MenuMainUlliA" href="{{ route('profile') }}">
                                                مشخصات کاربری
                                            </a>
                                        </li>

                                        <li class="enuList MenuMainUlli">
                                            <a class="MenuListLiA MenuMainUlliA" href="{{ route('orders') }}">
                                                 لیست سفارشات
                                            </a>
                                        </li>




                                        <li class="MenuList MenuMainUlli mainParts">
                                            <a class="MenuListLiA MenuMainUlliA" href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item">
                                                خروج

                                            </a>
                                        </li>                                    </ul>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif

                            <li class="  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA " href="{{ route('terms') }}">قوانین و مقررات</a></li>
                            <li class="  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA " href="/page/MTUwNQ%3D%3D/تماس-با-ما">تماس با ما</a></li>
                        </ul>
                    </div>
                <div class="col-md-12 col-lg-3 text-lg-left text-center call-numbers pt-lg-0 pb-lg-0 pt-4 pb-2"> <a href="tel:07132232007 - 22621655-6">07132232007-9</a> <span><i class="fas fa-phone"></i></span> </div>

            </div>
        </div>
    </section>
    <header class="hdr_1013 text-center">
        <div class="hdr_1013__container container">
            <nav class="hdr_1013__navbar navbar navbar-light navbar-expand-md">
                <h1 class="hdr_1013__navbar__h col-12 col-md-3 pr-0 text-md-right "> <a class="hdr_1013__logo-wrapper navbar-brand mr-0" href="/" title=" عنوان سایت"> <img src="/img/logo1.png" class="hdr_1013__logo" alt="image" height="30">
                        <span>عنوان سایت</span> </a> </h1>
                <div class="searchBox text-center col-12 col-md-6">
                    <div id="TopBarSearchBox">
                        <input class="TopBarSearchBoxInput" type="text" placeholder="جستجو">
                        <a class="TopBarSearchBoxA" data-toggle="modal" data-target="#searchModal" href="#"> <i class="fas fa-search "></i> </a> </div>
                </div>
                <div class="hdr_1013__menu col-md-3 pl-0 col-12 text-md-left"> </div>
            </nav>
        </div>
    </header>
    <header class="hdr_1012 text-center lightb-back">
        <div class="hdr_1012__container container">
            <div id="MenuV2" class="">
                <ul class="MenuMainUl mainUl">
                    <li class="menudefault  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA" href="{{ route('home') }}">صفحه اصلی</a></li>
                    <li class="menudefault  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA" href="{{ route('articles') }}">مقالات</a></li>
                    <li class="menudefault  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA" href="{{ route('uploadimage') }}">مدیریت فایل ها</a></li>
                    <li class="menudefault  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA " href="{{ route('largeformats') }}">چاپ لارج فرمت</a></li>
                    <li class="menudefault  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA" href="#">بنر مناسبتی</a>
                        <ul menu-level="2" class="MenuMainUl listmenu" style="display: none;">
                            <li class="MenuList MenuMainUlli "><a class="menudefault  MenuListLiA MenuMainUlliA" href="{{ route('banners','ترحیم-و-تسلیت') }}">بنر ترحیم و تسلیت</a></li>
                            <li class="MenuList MenuMainUlli "><a class="menudefault  MenuListLiA MenuMainUlliA" href="{{ route('banners','مناسبت-های-مذهبی') }}">بنر مناسبت های مذهبی</a></li>
                            <li class="MenuList MenuMainUlli "><a class="menudefault  MenuListLiA MenuMainUlliA" href="{{ route('banners','مناسبت-ملی') }}">بنر مناسبت های ملی</a></li>
                            <li class="MenuList MenuMainUlli "><a class="menudefault  MenuListLiA MenuMainUlliA" href="{{ route('banners','حجاج') }}">بنر خیر مقدم حجاج</a></li>
                        </ul>
                            </li>

                    <li class="  MenuList MenuMainUlli mainParts"><a class="MenuListLiA MenuMainUlliA " href="#">چاپ اُفست</a><i class="fas fa-angle-down "></i>
                        <ul menu-level="2" class="MenuMainUl listmenu" style="display: none;">
                            <li class="MenuList MenuMainUlli "><a class="menudefault  MenuListLiA MenuMainUlliA" href="{{ route('cards_category') }}">کارت ویزیت</a><i class="fas fa-angle-down"></i>
                                <ul menu-level="3" class="MenuMainUl listmenu">
                                    <li class="MenuList MenuMainUlli "><a class="  MenuListLiA MenuMainUlliA" href="{{ url('/کارت-ویزیت/کارت-ویزیت-ساده') }}">ساده</a></li>
                                    <li class="MenuList MenuMainUlli "><a class="  MenuListLiA MenuMainUlliA" href="{{ url('/کارت-ویزیت/کارت-ویزیت-فانتزی') }}">فانتزی</a></li>
                                    <li class="MenuList MenuMainUlli "><a class="  MenuListLiA MenuMainUlliA" href="/category/MzIyNzA%3D/مدیریتی-(PVC)">مدیریتی (PVC)</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </header>
</header>
<section id="mobileMenuV2">
    <div class="mobileMenuHeader">
        <div class="title">
            <i class="fas fa-bars"></i>
            فهرست
        </div>
        <div class="close cardclose">×</div>
    </div>
    <div class="mobileMenuMain">
        <ul class="mobileMenuList mobileMenuMainUl">
    		<li class="mobileMenuListLi mobileMenuMainUlli"><a class="  mobileMenuListLiA mobileMenuMainUlliA" href="{{ route('home') }}">صفحه اصلی</a></li>
    		<li class="mobileMenuListLi mobileMenuMainUlli"><a class="  mobileMenuListLiA mobileMenuMainUlliA" href="{{ route('articles') }}">مقالات</a></li>
    		<li class="mobileMenuListLi mobileMenuMainUlli"><a class="  mobileMenuListLiA mobileMenuMainUlliA" href="{{ route('largeformats') }}">چاپ لارج فرمت</a></li>
    		<li class="mobileMenuListLi mobileMenuMainUlli"><a class="  mobileMenuListLiA mobileMenuMainUlliA" href="{{ route('uploadimage') }}">مدیریت فایل ها</a></li>

    	</ul>                
	</div>
		</section>
<section id="AFMobileHeaderSection"
         class="">
    <div id="AFMobileHeaderBox"
         class="w-100  logoRightMenuLeft">
        <div id="mobileLogoHeader" class="">
            <a class="headerLogoLink" href="/">
                <img class="headerLogoImg"
                     src="/img/logo1.png" alt="چاپ و طراحی رضوان : سفارش آنلاین کلیه خدمات چاپی">
            </a>
        </div>
        <div id="mobileMenuIcons">
            <div class="mobilesearchIcon" data-toggle="modal" data-target="#searchModal">
                <i class="fas fa-search"></i>
                <span>جستجو</span>
            </div>
            <div class="cart mobileCartIcon">
                <i class="fas fa-shopping-cart"></i>
                <span>سبدخرید</span>
                <span class="badge badge-pill card-count-badge badge-danger"></span>
            </div>
            <div class="mobileUserBoxIcon" data-toggle="modal"
                 data-target="#loginUserModal">
                <i class="fas fa-user"></i>
                <span>کاربر</span>
            </div>
            <div class="mobileMenuBoxIcon mobileMenuBoxIconV2">
                <i class="fas fa-bars"></i>
                <span>فهرست</span>
            </div>
        </div>
    </div>
</section>