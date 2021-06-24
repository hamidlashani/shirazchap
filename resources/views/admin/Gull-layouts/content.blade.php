<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
        <div class="breadcrumb">
            <h1>نسخه 1</h1>
            <ul>
                <li><a href="">پنل مدیریت</a></li>
                <li>نسخه 1</li>
            </ul>
        </div>

        <div class="separator-breadcrumb border-top"></div>

        <div class="row">
            <!-- ICON BG -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Add-User"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">محصولات جدید</p>
                            <p class="text-primary text-24 line-height-1 mb-2">205</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Financial"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">فروش ها</p>
                            <p class="text-primary text-24 line-height-1 mb-2">$4021</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Checkout-Basket"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">سفارشات</p>
                            <p class="text-primary text-24 line-height-1 mb-2">80</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                    <div class="card-body text-center">
                        <i class="i-Money-2"></i>
                        <div class="content">
                            <p class="text-muted mt-2 mb-0">هزینه</p>
                            <p class="text-primary text-24 line-height-1 mb-2">$1200</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">هزینه های سال جاری</div>
                        <div id="echartBar" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">هزینه ها بر اساس کشور</div>
                        <div id="echartPie" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12">

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-chart-bottom o-hidden mb-4">
                            <div class="card-body">
                                <div class="text-muted">هزینه های ماه گذشته</div>
                                <p class="mb-4 text-primary text-24">$40250</p>
                            </div>
                            <div id="echart1" style="height: 260px;"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="card card-chart-bottom o-hidden mb-4">
                            <div class="card-body">
                                <div class="text-muted">هزینه های هفته گذشته</div>
                                <p class="mb-4 text-warning text-24">$10250</p>
                            </div>
                            <div id="echart2" style="height: 260px;"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card o-hidden mb-4">
                            <div class="card-header d-flex align-items-center border-0">
                                <h3 class="w-50 float-left card-title m-0">کاربر جدید</h3>
                                <div class="dropdown dropleft text-right w-50 float-right">
                                    <button class="btn bg-gray-100" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nav-icon i-Gear-2"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="#">افزودن کاربر جدید</a>
                                        <a class="dropdown-item" href="#">مشاهده همه کاربران</a>
                                        <a class="dropdown-item" href="#">هرچیزی</a>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="table-responsive">
                                    <table id="user_table" class="table  text-center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">نام</th>
                                            <th scope="col">تصویر</th>
                                            <th scope="col">ایمیل</th>
                                            <th scope="col">وضعیت</th>
                                            <th scope="col">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Smith Doe</td>
                                            <td>

                                                <img class="rounded-circle m-0 avatar-sm-table " src="/assets/images/faces/1.jpg" alt="">

                                            </td>

                                            <td>Smith@gmail.com</td>
                                            <td><span class="badge badge-success">Active</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jhon Doe</td>
                                            <td>

                                                <img class="rounded-circle m-0 avatar-sm-table " src="/assets/images/faces/1.jpg" alt="">

                                            </td>

                                            <td>Jhon@gmail.com</td>
                                            <td><span class="badge badge-info">در انتظار</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Alex</td>
                                            <td>

                                                <img class="rounded-circle m-0 avatar-sm-table " src="/assets/images/faces/1.jpg" alt="">

                                            </td>

                                            <td>Otto@gmail.com</td>
                                            <td><span class="badge badge-warning">غیر فعال</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Mathew Doe</td>
                                            <td>

                                                <img class="rounded-circle m-0 avatar-sm-table " src="/assets/images/faces/1.jpg" alt="">

                                            </td>

                                            <td>Mathew@gmail.com</td>
                                            <td><span class="badge badge-success">فعال</span></td>
                                            <td>
                                                <a href="#" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <a href="#" class="text-danger mr-2">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="col-lg-6 col-md-12">

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">محصولات پرفروش</div>
                        <div class="d-flex flex-column flex-sm-row align-items-center mb-3">
                            <img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="/img/headphone-4.jpg" alt="">
                            <div class="flex-grow-1">
                                <h5 class=""><a href="">Wireless Headphone E23</a></h5>
                                <p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <p class="text-small text-danger m-0">$450 <del class="text-muted">$500</del></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary btn-rounded btn-sm">دیدن جزئیات</button>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-sm-row align-items-center mb-3">
                            <img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="/img/headphone-2.jpg" alt="">
                            <div class="flex-grow-1">
                                <h5 class=""><a href="">Wireless Headphone Y902</a></h5>
                                <p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <p class="text-small text-danger m-0">$550 <del class="text-muted">$600</del></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary btn-sm btn-rounded m-3 m-sm-0">دیدن جزئیات</button>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-sm-row align-items-center mb-3">
                            <img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="/img/headphone-3.jpg" alt="">
                            <div class="flex-grow-1">
                                <h5 class=""><a href="">Wireless Headphone E09</a></h5>
                                <p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <p class="text-small text-danger m-0">$250 <del class="text-muted">$300</del></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary btn-sm btn-rounded m-3 m-sm-0">دیدن جزئیات</button>
                            </div>
                        </div>
                        <div class="d-flex flex-column flex-sm-row align-items-center mb-3">
                            <img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="/img/headphone-4.jpg" alt="">
                            <div class="flex-grow-1">
                                <h5 class=""><a href="">Wireless Headphone X89</a></h5>
                                <p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <p class="text-small text-danger m-0">$450 <del class="text-muted">$500</del></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary btn-sm btn-rounded m-3 m-sm-0">دیدن جزئیات</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body p-0">
                        <div class="card-title border-bottom d-flex align-items-center m-0 p-3">
                            <span>فعالیت کاربران</span>
                            <span class="flex-grow-1"></span>
                            <span class="badge badge-pill badge-warning">بروزرسانی روزانه</span>
                        </div>
                        <div class="d-flex border-bottom justify-content-between p-3">
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">صفحه ها / بازدید</span>
                                <h5 class="m-0">2065</h5>
                            </div>
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">کاربر جدید</span>
                                <h5 class="m-0">465</h5>
                            </div>
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">هفته گذشته</span>
                                <h5 class="m-0">23456</h5>
                            </div>
                        </div>
                        <div class="d-flex border-bottom justify-content-between p-3">
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">صفحه ها / بازدید</span>
                                <h5 class="m-0">1829</h5>
                            </div>
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">کاربر جدید</span>
                                <h5 class="m-0">735</h5>
                            </div>
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">هفته گذشته</span>
                                <h5 class="m-0">92565</h5>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between p-3">
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">صفحه ها / بازدید</span>
                                <h5 class="m-0">3165</h5>
                            </div>
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">کاربر جدید</span>
                                <h5 class="m-0">165</h5>
                            </div>
                            <div class="flex-grow-1">
                                <span class="text-small text-muted">هفته گذشته</span>
                                <h5 class="m-0">32165</h5>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body p-0">
                        <h5 class="card-title m-0 p-3">20 روز گذشته اخیر</h5>
                        <div id="echart3" style="height: 360px;"></div>
                    </div>
                </div>
            </div>

        </div>


    </div>


</div>
