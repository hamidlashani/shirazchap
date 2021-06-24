@extends('profile.layout');

@section('main')



    <div class="container rounded bg-white mt-5 mb-5 profile">
    <form action="#" method="post">
        @csrf
        <div class="form-group">
            <lable style="float:right " class="mb-2 mt-2" for="phone">کد اعتبار سنجی</lable>
            <input value="" name="code" id="phone" type="text" class="form-control" placeholder="کد دریافتی از طریق پیامک را وارد نمایید">

            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif

        </div>

        <div class="form-group mb-2">
            <button class="btn btn-primary">ثبت</button>
        </div>
        <div class="clearfix mb-2" style="height: 10px"></div>

    </form>
</div>
@endsection