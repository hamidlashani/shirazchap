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
                <form class="form-horizontal" action="{{ route('admin.articles.store') }}" method="post">
                    @csrf
                    <div class="card-body row">

                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان</label>
                                <input required type="text" name="title" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputPassword3" class="col-sm-6 control-label">مجموعه</label>
                            <select name="category_id" required class="form-control">
                                <option>انتخاب مجموعه</option>
                                @foreach($cats as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-2">
                            <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                            <select name="state" class="form-control">
                                <option value="1" selected>فعال</option>
                                <option value="2">غیر فعال</option>
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label for="inputEmail3" class="col-sm-2 control-label">مقدمه</label>
                            <input name="intro" type="text" class="form-control" id="inputEmail3" placeholder="مقدمه مقاله را وارد کنید">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputEmail3" class="col-sm-4 control-label">تصویر مقدمه</label>
                            <div class="input-group">
                                <input type="text" id="introimage" class="form-control" name="introimage">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-4">
                            <label for="inputEmail3" class="col-sm-4 control-label">تصویر اصلی</label>
                            <div class="input-group">
                                <input type="text" id="textimage" class="form-control" name="textimage">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image2">انتخاب تصویر</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-2 control-label">متن اصلی</label>
                            <textarea id="text" name="text" class="form-control" rows="3" placeholder="وارد کردن متن اصلی ..."></textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


<script>
    CKEDITOR.replace('text');



    document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'introimage';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        // second button
        document.getElementById('button-image2').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'textimage';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });

    // input
    let inputId = '';

    // set file link
    function fmSetLink($url) {
        document.getElementById(inputId).value = $url;
    }


</script>


@endsection