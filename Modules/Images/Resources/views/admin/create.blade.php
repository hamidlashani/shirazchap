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
                <form class="form-horizontal" action="{{ route('admin.images.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">



                            <div class="form-group col-4">
                                <label for="inputPassword3" class="col-sm-10 control-label">دسته بندی</label>
                                <select required name="category" class="form-control category">
                                    <option value="">انتخاب دسته بندی</option>
                                    @foreach($cats as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-8">
                                <fieldset class="form-group">
                                    <a class="btn btn-success btn-sm" href="javascript:void(0)" onclick="$('#pro-image').click()">انتخاب تصاویر</a>
                                    <input type="file" id="pro-image" name="files[]" style="display: none;" class="form-control" multiple>
                                </fieldset>
                                <div class="preview-images-zone">

                                </div>
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
        $(document).ready(function() {
            document.getElementById('pro-image').addEventListener('change', readImage, false);

            $( ".preview-images-zone" ).sortable();

            $(document).on('click', '.image-cancel', function() {
                let no = $(this).data('no');
                $(".preview-image.preview-show-"+no).remove();
            });
        });



        var num = 1;
        function readImage() {
            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image')) continue;

                    var picReader = new FileReader();

                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                }
               // $("#pro-image").val('');
            } else {
                console.log('Browser not support');
            }
        }



    </script>

<style>
    .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 180px;
        /* display: flex; */
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow:auto;
    }
    .preview-images-zone > .preview-image:first-child {
        height: 185px;
        width: 185px;
        position: relative;
        margin-right: 5px;
    }
    .preview-images-zone > .preview-image {
        height: 90px;
        width: 90px;
        position: relative;
        margin-right: 5px;
        float: left;
        margin-bottom: 5px;
    }
    .preview-images-zone > .preview-image > .image-zone {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .image-zone > img {
        width: 100%;
        height: 100%;
    }
    .preview-images-zone > .preview-image > .tools-edit-image {
        position: absolute;
        z-index: 100;
        color: #fff;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        display: none;
    }
    .preview-images-zone > .preview-image > .image-cancel {
        font-size: 18px;
        position: absolute;
        top: 0;
        right: 0;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
        display: none;
        z-index: 100;
    }
    .preview-image:hover > .image-zone {
        cursor: move;
        opacity: .5;
    }
    .preview-image:hover > .tools-edit-image,
    .preview-image:hover > .image-cancel {
        display: block;
    }
    .ui-sortable-helper {
        width: 90px !important;
        height: 90px !important;
    }


</style>
@endsection