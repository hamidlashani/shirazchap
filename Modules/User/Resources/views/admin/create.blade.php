@extends('admin.Gull-master')

@section('title')
    ثبت کاربر
@endsection
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">

    <div class="row">
        <div class="col-12">
            @include('admin.layouts.errors')
            <div class="card card-info">

                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.users.store') }}" method="post">
                    @csrf
                    <div class="card-body bg-dark">



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input required type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input required type="email" name="email" class="form-control" placeholder="ایمیل">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input required type="password" name="password" class="form-control" placeholder="کلمه عبور">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input required type="password" name="password_confirmation" class="form-control" placeholder="تکرار کلمه عبور">
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" name="verify" class="form-check-input" id="verify">
                                    <label class="form-check-label" for="verify">اکانت فعال باشد</label>
                                </div>
                            </div>
                        </div>


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


@endsection