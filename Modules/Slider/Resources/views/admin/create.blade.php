@extends('admin.Gull-master')

@slot('bradecrumb')

        <li class="breadcrumb-item"><a href="{{ url('admin') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item "><a href="{{ route('admin.articles.index') }}">لیست مقالات</a></li>
        <li class="breadcrumb-item active">ایجاد مقاله</li>

    @endslot
@section('content')

<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">

                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.sliders.store') }}" method="post">
                    @csrf
                    <div class="card-body row">

                        <div class="form-group col-4">
                            <label for="inputEmail3" class="col-sm-10 control-label">تصویر مقدمه</label>
                            <div class="input-group">
                                <input type="text" id="image_label" class="form-control" name="image">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="inputEmail3" class="col-sm-10 control-label">متن جایگزین</label>
                            <input name="alt" type="text" class="form-control" id="inputEmail3" placeholder="متن جایگزین را وارد کنید">
                        </div>

                        <div class="form-group col-3">
                            <label for="inputEmail3" class="col-sm-10 control-label">لینک ارجاع</label>
                            <input name="url" type="text" class="form-control" id="inputEmail3" placeholder="لینک ارجاع را وارد کنید">
                        </div>

                        <div class="form-group col-2">
                            <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                            <select name="state" class="form-control">
                                <option value="1" selected>فعال</option>
                                <option value="2">غیر فعال</option>
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }

</script>


@endsection