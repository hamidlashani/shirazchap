@component('admin.layouts.content',['title'=>'ویرایش کاربر'])

    @slot('bradecrumb')

        <li class="breadcrumb-item"><a href="{{ url('admin') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">لیست کاربران</a></li>
        <li class="breadcrumb-item active">لیست کاربران</li>

    @endslot

    <div class="row">
        <div class="col-12">
            @include('admin.layouts.errors')
            <div class="card card-info">

                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.users.update',['user'=>$user->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input value="{{ $user->name }}" required type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            </div>
                            <input value="{{ $user->email }}" required type="email" name="email" class="form-control" placeholder="ایمیل">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input  type="password" name="password" class="form-control" placeholder="کلمه عبور">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-key"></i></span>
                            </div>
                            <input  type="password" name="password_confirmation" class="form-control" placeholder="تکرار کلمه عبور">
                        </div>

                        @if(! Auth::user()->email_verified_at)
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="form-check">
                                    <input type="checkbox" name="verify" class="form-check-input" id="verify">
                                    <label class="form-check-label" for="verify">اکانت فعال باشد</label>
                                </div>
                            </div>
                        </div>
                        @endif

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


@endcomponent