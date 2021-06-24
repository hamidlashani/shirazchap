@extends('admin.Gull-master')

@slot('bradecrumb')

    <li class="breadcrumb-item"><a href="{{ url('admin') }}">پنل مدیریت</a></li>
    <li class="breadcrumb-item "><a href="{{ route('admin.banners.index') }}">لیست مقالات</a></li>
    <li class="breadcrumb-item active">ایجاد مقاله</li>

@endslot
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">

                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.banners.store') }}" method="post">
                    @csrf
                    <div class="card-body row">

                        <div class="col-5">
                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-10 control-label">عنوان</label>
                            <input value="" name="name" type="text" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>

                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-10 control-label">متن جایگزین</label>
                            <input readonly value="" name="slug" type="text" class="form-control" id="inputEmail3" placeholder="متن جایگزین را وارد کنید">
                        </div>
                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">دسته بندی</label>
                                <select required name="category" class="form-control category">
                                    <option value="">انتخاب دسته بندی</option>
                                    @foreach($cats as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">مسیر تصاویر</label>
                                <select required name="imagespath" class="form-control imagespath">

                                </select>
                            </div>

                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-10 control-label">تصویر مقدمه</label>
                            <div class="input-group">
                                <input value="" type="text" id="image_label" class="form-control" name="image">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-10 control-label">توضیحات</label>
                            <textarea name="description" type="text" class="form-control" id="inputEmail3"></textarea>
                        </div>

                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-10 control-label">زمان تحویل</label>
                            <input value="" name="delivery" type="text" class="form-control" id="inputEmail3" placeholder="لینک ارجاع را وارد کنید">
                        </div>

                        <div class="form-group col-12">
                            <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                            <select name="state" class="form-control">
                                <option value="1" selected>فعال</option>
                                <option value="2">غیر فعال</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group col-12">
                                <div id="options">
                                    <label for="inputEmail3" class="col-sm-10 control-label">مشخصات دریافتی</label>

                                </div>

                                <button class="btn btn-sm btn-success" id="addoption">مشخصات جدید</button>
                            </div>
<hr>
                            <div class="form-group col-12">
                                <div id="prices">
                                    <label for="inputEmail3" class="col-sm-10 control-label">سایزهای موجود</label>

                                </div>

                                <button class="btn btn-sm btn-success" id="addprice">سایز جدید</button>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-warning" style="width: 100%"  data-toggle="modal" data-target="#uploadModal">مدیریت تصاویر</button>

                            <!-- Modal -->
                            <div id="uploadModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="text-align: center;width: 100%">مدیریت تصاویر </h4>
                                            <i class="i-Upload header-icon d-none d-sm-inline-block" id="imageup"></i>

                                        </div>
                                        <div class="modal-body">
                                            <div class="upimage" style="display: none">
                                            <div class="file-loading">
                                                <input id="input-700" name="images[]" type="file" multiple>
                                            </div>
                                            </div>
                                            <link href="https://plugins.krajee.com/assets/b28c7635/css/fileinput.min.css?ver=201908311938" rel="stylesheet">
                                            <link href="https://plugins.krajee.com/assets/b28c7635/css/fileinput-rtl.min.css?ver=201908311938" rel="stylesheet">
                                            <script src="https://plugins.krajee.com/assets/b28c7635/js/fileinput.min.js?ver=201909132002"></script>
                                            <script>
                                                    $("#input-700").fileinput({
                                                        uploadUrl: "{{ route('admin.uploads','path=') }}",
                                                        maxFileCount: 5,
                                                        theme: 'fa',
                                                        language: 'fa',
                                                    });
                                            </script>


                                        </div>

                                    </div>

                                </div>
                            </div>

<style>
    .modal-lg {
        max-width: unset;
        width: 1000px;
    }
    .Portfolio {
        position: relative;
        margin: 5px;
        border: 2px solid black;
        float: left;
        width: 180px;
        transition-duration: 0.4s;
        border-radius: 5px;
        animation: winanim 0.5s ;
        -webkit-backface-visibility:visible;
        backface-visibility:visible;
        box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)
    }

    .Portfolio:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
    }

    .Portfolio img {
        width: 100%;
        height: 100px;
    }

    .desc {
        padding: 5px;
        text-align: center;
        font-size: 90%;
        background:black;
        color:hotpink
    }
</style>

















                        </div>

                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-default float-left">لغو</a>
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

        $('.category').select2({
            tags:true,
        });

        $('.imagespath').select2({
            tags:true,
        });

        document.getElementById('addoption').addEventListener('click', (event) => {
            event.preventDefault();

            $('#options').append('<div class="mb-2">\n' +
                '                 <input value="" name="options[]" type="text" class="form-control" id="inputEmail3" placeholder="خطاب به شخص یا خانواده متوفی">\n' +
                '                 </div>');
        });



        document.getElementById('addprice').addEventListener('click', (event) => {
            event.preventDefault();

            $('#prices').append('<div class="mb-2 row">'+
                '<div class="col-6">'+
                '<input value="" name="prices[size][]" type="text" class="form-control" id="inputEmail3" placeholder="سایز ( 100*80 )">'+
                '</div>'+
                '<div class="col-6">'+
                '<input value="" name="prices[price][]" type="text" class="form-control" id="inputEmail3" placeholder="قیمت ( 15000 )">'+
                '</div>'+
                '</div>');
        });
        document.getElementById('imageup').addEventListener('click', (event) => {
            event.preventDefault();

            $('.upimage').show('slow');
        });
        </script>


@endsection