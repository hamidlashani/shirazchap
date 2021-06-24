@extends('admin.Gull-master')



@section('content')

@if($errors->all())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
    <div class="auth-layout-wrap" style="background-image: url(img/loginback1.jpg)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="img/logo.png" alt="">
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">آدرس ایمیل</label>
                                    <input id="email" class="form-control form-control-rounded " name="email" value="" required="" autocomplete="email" autofocus="">
                                </div>
                                <div class="form-group">
                                    <label for="password">رمز</label>
                                    <input type="password" id="password" class="form-control form-control-rounded " name="password" required="" autocomplete="current-password">
                                </div>
                                <div class="form-group ">
                                    @recaptcha

                                    <label class="checkbox checkbox-primary">
                                        <input name="remember" type="checkbox">
                                        <span>مرا بخاطر بسپار</span>
                                        <span class="checkmark"></span>
                                    </label>

                                </div>

                                <button class="btn btn-rounded btn-primary btn-block mt-2">ورود</button>

                            </form>

                            <div class="mt-3 text-center">

                                <a href="{{ route('password.request') }}" class="text-muted"><u>
                                        فراموشی رمز ورود?</u></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-center " style="background-size: cover;background-image: url(img/photo-long-3.jpg">
                        <div class="pr-3 auth-right">
                            <a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="{{ route('register') }}">
                                <i class="i-Mail-with-At-Sign"></i> با ایمیل نام نویسی کنید
                            </a>
                            <a href="{{ route('auth.google') }}" class="btn btn-rounded btn-outline-primary btn-outline-google btn-block btn-icon-text">
                                <i class="i-Google-Plus"></i> با گوگل نام نویسی کنید
                            </a>
                         <!--   <a class="btn btn-rounded btn-outline-primary btn-block btn-icon-text btn-outline-facebook">
                                <i class="i-Facebook-2"></i> با فیسبوک نام نویسی کنید
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
