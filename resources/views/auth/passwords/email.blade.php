@extends('admin.Gull-master')



@section('content')

    @include('admin.layouts.errors')

    <div class="auth-layout-wrap" style="background-image: url(/img/photo-wide-3.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">آدرس ایمیل</label>
                                    <input id="email" type="email" class="form-control form-control-rounded " name="email" value="" required="" autocomplete="email" autofocus="">
                                </div>


                                @recaptcha



                                <button class="btn btn-rounded btn-primary btn-block mt-2">ارسال ایمیل تایید</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
