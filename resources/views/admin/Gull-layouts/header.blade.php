<div class="main-header">
    <div class="logo">
        <img src="/img/logo.png" alt="">
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="d-flex align-items-center">
        <!-- Mega menu -->
        <div class="dropdown mega-menu d-none d-md-block">
            <a href="{{ url('/') }}" target="_blank" class="btn text-muted mr-3" >مشاهده سایت</a>

        </div>
        <!-- / Mega menu -->
        <div class="search-bar">
            <input type="text" placeholder="جستجو ...">
            <i class="search-icon text-muted i-Magnifi-Glass1"></i>
        </div>
    </div>

    <div style="margin: auto"></div>

    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- Grid menu Dropdown -->
        <div class="dropdown widget_dropdown">
            <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="menu-icon-grid">
                    <a href="#"><i class="i-Shop-4"></i> خانه</a>
                    <a href="#"><i class="i-Library"></i> ابزار طراحی</a>
                    <a href="#"><i class="i-Drop"></i> برنامه ها</a>
                    <a href="#"><i class="i-File-Clipboard-File--Text"></i> فرم ها</a>
                    <a href="#"><i class="i-Checked-User"></i> نشست ها</a>
                    <a href="#"><i class="i-Ambulance"></i> پشتیبانی</a>
                </div>
            </div>
        </div>
        <!-- Notificaiton -->
        <div class="dropdown">
            <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-primary">3</span>
                <i class="i-Bell text-muted header-icon"></i>
            </div>
            <!-- Notification dropdown -->
            <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                <div class="dropdown-item d-flex">
                    <div class="notification-icon">
                        <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span>پیام جدید</span>
                            <span class="badge badge-pill badge-primary ml-1 mr-1">جدید</span>
                            <span class="flex-grow-1"></span>
                            <span class="text-small text-muted ml-auto">10ثانیه قبل/span>
                        </p>
                        <p class="text-small text-muted m-0">James: Hey! are you busy?</p>
                    </div>
                </div>
                <div class="dropdown-item d-flex">
                    <div class="notification-icon">
                        <i class="i-Receipt-3 text-success mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span>سفارش جدید دریافت شد</span>
                            <span class="badge badge-pill badge-success ml-1 mr-1">جدید</span>
                            <span class="flex-grow-1"></span>
                            <span class="text-small text-muted ml-auto">2 ساعت پیش</span>
                        </p>
                        <p class="text-small text-muted m-0">1 Headphone, 3 iPhone x</p>
                    </div>
                </div>
                <div class="dropdown-item d-flex">
                    <div class="notification-icon">
                        <i class="i-Empty-Box text-danger mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span>محصول موجود نیست</span>
                            <span class="badge badge-pill badge-danger ml-1 mr-1">3</span>
                            <span class="flex-grow-1"></span>
                            <span class="text-small text-muted ml-auto">10 ساعت پیش</span>
                        </p>
                        <p class="text-small text-muted m-0">Headphone E67, R98, XL90, Q77</p>
                    </div>
                </div>
                <div class="dropdown-item d-flex">
                    <div class="notification-icon">
                        <i class="i-Data-Power text-success mr-1"></i>
                    </div>
                    <div class="notification-details flex-grow-1">
                        <p class="m-0 d-flex align-items-center">
                            <span>Server Up!</span>
                            <span class="badge badge-pill badge-success ml-1 mr-1">3</span>
                            <span class="flex-grow-1"></span>
                            <span class="text-small text-muted ml-auto">14 ساعت پیش</span>
                        </p>
                        <p class="text-small text-muted m-0">راه اندازی مجدد با موفقیت</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Notificaiton End -->

        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div  class="user col align-self-end">
                <img src="/img/uuu.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <img src="/img/uuu.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </div>
                    <a class="dropdown-item">تنظیمات حساب</a>
                    <a class="dropdown-item">تاریخچه صورتحساب</a>
                    <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="dropdown-item">
                        <p>خروج</p>
                        <i class="fa fa-close nav-icon"></i>

                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
