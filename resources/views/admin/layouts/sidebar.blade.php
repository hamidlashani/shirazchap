<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
                <div class="info">
                    <a href="#" class="d-block"></a>
                </div>
            </div>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        @php
                            $GetTheHash = md5(strtolower(trim(Auth::user()->email)));
                            $avatar = 'http://www.gravatar.com/avatar/' . $GetTheHash . '?s=100';

                        @endphp
                        <div class="image">
                            <img width="35" style="float: right;margin-left: 10px;" src="{{ $avatar }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <p style="padding-top: 7px;">
                            {{ Auth::user()->name }}
                            <i style="padding-top: 7px" class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-link">
                                <p>خروج</p>
                                <i class="fa fa-close nav-icon"></i>

                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}">
                            <p>لیست کاربران</p>
                            <i class="nav-icon fa fa-users"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link {{ Route::currentRouteName() == 'admin.articles.index' ? 'active' : '' }}">
                            <p>لیست مقالات</p>
                            <i class="nav-icon fa fa-angellist"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>