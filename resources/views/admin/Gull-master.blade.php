<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="uJlaawjGrbGM7E5CLTyURvkKcUicJRFXjqAD1m9l">
    <title>@yield('title')-{{ Config::get('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <link href="http://www.jqueryscript.net/demo/jQuery-Plugin-For-Multi-Select-List-with-Checkboxes-MultiSelect/jquery.multiselect.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link id="gull-theme" rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="http://www.jqueryscript.net/demo/jQuery-Plugin-For-Multi-Select-List-with-Checkboxes-MultiSelect/jquery.multiselect.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <style>
        #button-image{
            background: #52495a;
            color: #ffffff;
        }
    </style>
</head>



<body class="text-left">

<!-- Pre Loader Strat  -->
<div class='loadscreen' id="preloader">

    <div class="loader spinner-bubble spinner-bubble-primary">


    </div>
</div>
<!-- Pre Loader end  -->







<!-- ============ Compact Layout start ============= -->

<div class="app-admin-wrap layout-sidebar-large clearfix">

    @php $routename = \Request::route()->getName();  @endphp

    @if($routename == 'login' )
        @yield('content')
    @elseif($routename == 'register' )
        @yield('content')
    @elseif($routename == 'password.request' )
        @yield('content')
    @else
        @include('admin.Gull-layouts.header')
        @include('admin.Gull-layouts.sidebar')
        @yield('content')

    @endif
</div>

<div class="search-ui">
    <div class="search-header">
        <img src="img/logo.png" alt="" class="logo">
        <button class="search-close btn btn-icon bg-transparent float-right mt-2">
            <i class="i-Close-Window text-22 text-muted"></i>
        </button>
    </div>

    <input type="text" placeholder="جستجو کنید..." class="search-input" autofocus>

    <div class="search-title">
        <span class="text-muted">نتایج جستجو</span>
    </div>

    <div class="search-results list-horizontal">
        <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                <div class="list-thumb d-flex">
                    <!-- TUMBNAIL -->
                    <img src="img/headphone-1.jpg" alt="">
                </div>
                <div class="flex-grow-1 pl-2 d-flex">
                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                        <!-- OTHER DATA -->
                        <a href="" class="w-40 w-sm-100">
                            <div class="item-title">Headphone 1</div>
                        </a>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">
                            $300
                            <del class="text-secondary">$400</del>
                        </p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                            <span class="badge badge-danger">فروش</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                <div class="list-thumb d-flex">
                    <!-- TUMBNAIL -->
                    <img src="img/headphone-2.jpg" alt="">
                </div>
                <div class="flex-grow-1 pl-2 d-flex">
                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                        <!-- OTHER DATA -->
                        <a href="" class="w-40 w-sm-100">
                            <div class="item-title">Headphone 1</div>
                        </a>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">
                            $300
                            <del class="text-secondary">$400</del>
                        </p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                            <span class="badge badge-primary">جدید</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                <div class="list-thumb d-flex">
                    <!-- TUMBNAIL -->
                    <img src="img/headphone-3.jpg" alt="">
                </div>
                <div class="flex-grow-1 pl-2 d-flex">
                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                        <!-- OTHER DATA -->
                        <a href="" class="w-40 w-sm-100">
                            <div class="item-title">Headphone 1</div>
                        </a>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">
                            $300
                            <del class="text-secondary">$400</del>
                        </p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                            <span class="badge badge-primary">جدید</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="list-item col-md-12 p-0">
            <div class="card o-hidden flex-row mb-4 d-flex">
                <div class="list-thumb d-flex">
                    <!-- TUMBNAIL -->
                    <img src="img/headphone-4.jpg" alt="">
                </div>
                <div class="flex-grow-1 pl-2 d-flex">
                    <div class="card-body align-self-center d-flex flex-column justify-content-between align-items-lg-center flex-lg-row">
                        <!-- OTHER DATA -->
                        <a href="" class="w-40 w-sm-100">
                            <div class="item-title">Headphone 1</div>
                        </a>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">Gadget</p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100">
                            $300
                            <del class="text-secondary">$400</del>
                        </p>
                        <p class="m-0 text-muted text-small w-15 w-sm-100 d-none d-lg-block item-badges">
                            <span class="badge badge-primary">جدید</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- PAGINATION CONTROL -->
    <div class="col-md-12 mt-5 text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination d-inline-flex">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">قبلی</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">بعدی</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>



</body>

<script src="{{ asset('js/common-bundle-script.js') }}"></script>
<script src="{{ asset('js/echarts.min.js') }}"></script>
<script src="{{ asset('js/echart.options.min.js') }}"></script>
<script src="{{ asset('js/dashboard.v1.script.js') }}"></script>
<script src="{{ asset('js/script.js ')}}"></script>
<script src="{{ asset('js/sidebar.large.script.js ')}}"></script>
<script src="{{ asset('js/customizer.script.js') }}"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script src="{{ asset('/js/select2.full.min.js') }}"></script>

@include('sweet::alert')
</html>
