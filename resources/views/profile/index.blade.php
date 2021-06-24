@extends('layouts.app')

@section('content')


            <div class=" container">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img style="border-radius: 50%" width="100" src="@if($user->avatar){{ '/avatars/'.$user->avatar}} @else /images/avatar.png @endif" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h6 class="f-w-600">{{ $user->name }}</h6>
                                    <p>{{ $user->company }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default " style="text-align: right">مشخصات</h6>
                                    <div class="row">
                                        <div class="col-sm-6 mt-2">
                                            <div class="inner">
                                                <p class="m-b-10 ">نام و نام خانوادگی</p>
                                                <h6 class="text-muted ">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="inner">
                                                <p class="m-b-10 ">تلفن همراه</p>
                                                <h6 class="text-muted ">{{ $user->cellphone }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="inner">
                                                <p class="m-b-10 ">تلفن ثابت</p>
                                                <h6 class="text-muted ">@if($user->phone) {{ $user->phone }} @else   @endif</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="inner">
                                                <p class="m-b-10 ">نام شرکت</p>
                                                <h6 class="text-muted ">{{ $user->company }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="inner">
                                                <p class="m-b-10 ">آدرس </p>
                                                <h6 class="text-muted ">{{ $user->address }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="inner">
                                                <p class="m-b-10 ">پست الکترونیک</p>
                                                <h6 class="text-muted ">{{ $user->email }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <a class="btn btn-info btn-sm text-white mt-2" href="/profile/{{$user->id}}/edit">ویرایش اطلاعات</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

    <style>
        .inner {
            box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            padding: 15px;
        }

        .user-card-full {
            overflow: hidden;
            text-align: right;
        }

        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            border: none;
            margin-bottom: 30px
        }

        .m-r-0 {
            margin-right: 0px
        }

        .m-l-0 {
            margin-left: 0px
        }

        .user-card-full .user-profile {
            border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
            background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
            background: linear-gradient(to right, #ee5a6f, #f29263)
        }

        .user-profile {
            padding: 20px 0
        }

        .card-block {
            padding: 1.25rem
        }

        .m-b-25 {
            margin-bottom: 25px
        }

        .img-radius {
            border-radius: 5px
        }

        h6 {
            font-size: 14px
        }

        .card .card-block p {
            line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
            p {
                font-size: 14px
            }
        }

        .card-block {
            padding: 1.25rem
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .card .card-block p {
            line-height: 25px
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .text-muted {
            color: #919aa3 !important
        }

        .b-b-default {
            border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
            font-weight: 600
        }

        .m-b-20 {
            margin-bottom: 20px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .p-b-5 {
            padding-bottom: 5px !important
        }

        .m-b-10 {
            margin-bottom: 10px
        }

        .m-t-40 {
            margin-top: 20px
        }

        .user-card-full .social-link li {
            display: inline-block
        }

        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out
        }
    </style>
@endsection
