@extends('admin.Gull-master')


@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">


                <form class="form-horizontal" action="{{ route('admin.cards.update',['card'=>$card->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group col-12">
                                    <label for="title" class="col-sm-12 control-label">عنوان</label>
                                    <input  required oninput="this.setCustomValidity('')"
                                            oninvalid="this.setCustomValidity(this.placeholder)"
                                            type="text"
                                            value="{{ $card->name }}"
                                            name="name"
                                            class="form-control"
                                            id="title"
                                            placeholder="عنوان را وارد کنید">
                                </div>
                                <div class="form-group col-12">
                                    <label for="category" class="col-sm-12 control-label">مجموعه محصول</label>
                                    <select required class="form-control" name="category" id="category">
                                        <option value="">انتخاب دسته بندی</option>
                                        @foreach($cats as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="width" class="col-sm-12 control-label">عرض</label>
                                    <input   required oninput="this.setCustomValidity('')"
                                             oninvalid="this.setCustomValidity(this.placeholder)"
                                             value="{{ $card->width }}" type="text" name="width" class="form-control" id="width" placeholder="عنوان را وارد کنید">
                                </div>
                                <div class="form-group col-12">
                                    <label for="height" class="col-sm-12 control-label">طول</label>
                                    <input  required oninput="this.setCustomValidity('')"
                                            oninvalid="this.setCustomValidity(this.placeholder)"
                                            value="{{ $card->height }}" type="text" name="height" class="form-control" id="height" placeholder="عنوان را وارد کنید">
                                </div>
                                <div class="form-group col-12">
                                    <label for="circulation" class="col-sm-12 control-label">تیراژ</label>
                                    <input  required oninput="this.setCustomValidity('')"
                                            oninvalid="this.setCustomValidity(this.placeholder)"
                                            value="{{ $card->circulation }}" type="number" name="circulation" class="form-control" id="circulation" placeholder="عنوان را وارد کنید">
                                </div>
                                <div class="form-group col-12">
                                    <label for="description" class="col-sm-12 control-label">توضیحات</label>
                                    <textarea id="description" class="form-control" name="description">
                                        {{ $card->description }}
                                    </textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="image_label" class="col-sm-10 control-label">تصویر مقدمه</label>
                                    <div class="input-group">
                                        <input  required oninput="this.setCustomValidity('')"
                                                oninvalid="this.setCustomValidity(this.placeholder)"
                                                value="{{ $card->image }}" type="text" id="image_label" class="form-control" name="image">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group prices ">
                                    <div onclick="addprice()" class="btn btn-danger mt-3 btn-sm">افزودن جدید</div>

                                    @if($card->dayprises)
                                        @foreach(json_decode($card->dayprises) as $pric)
                                            <div class="adddeys">
                                        <div class="row mb-2">
                                            <div class="col-5">
                                                <label for="days" class="col-sm-10 control-label">زمان تحویل</label>
                                                <input  required oninput="this.setCustomValidity('')"
                                                        oninvalid="this.setCustomValidity(this.placeholder)" type="number"
                                                        value="{{ $pric->day }}" name="days[]" class="form-control" id="price" placeholder="عنوان را وارد کنید">
                                            </div>
                                            <div class="col-4">
                                                <label for="days" class="col-sm-10 control-label">قیمت</label>
                                                <input  required oninput="this.setCustomValidity('')"
                                                        oninvalid="this.setCustomValidity(this.placeholder)" type="number"
                                                        value="{{ $pric->price }}" name="price[]" class="form-control" id="price" placeholder="عنوان را وارد کنید">
                                            </div>

                                            <div class="col-3">
                                                <label for="state" class="col-sm-12 control-label">وضعیت</label>
                                                <select  required oninput="this.setCustomValidity('')"
                                                         oninvalid="this.setCustomValidity('لطفا وضعیت محصول را مشخص نمایید')"
                                                         name="daystate[]" id="state" class="form-control">
                                                    <option value="">انتخاب وضعیت</option>
                                                    @foreach($states as $state)
                                                        <option @if($pric->daystate == $state->id) selected="selected" @endif value="{{ $state->id }}">{{ $state->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <label for="side" class="col-sm-12 control-label">نوع چاپ</label>
                                    <select  required oninput="this.setCustomValidity('')"
                                             oninvalid="this.setCustomValidity('لطفا نوع چاپ را مشخص نمایید')" name="side" class="form-control" id="side">
                                        <option value="">انتخاب نوع چاپ</option>
                                        <option @if($card->side == 1) selected="selected" @endif  value="1">یک رو</option>
                                        <option @if($card->side == 2) selected="selected" @endif value="2">دو رو</option>
                                    </select>
                                </div>
                                <div class="col-12" style="margin: 15px; box-shadow: 0 4px 20px 1px rgba(0, 0, 0, 0.06), 0 1px 4px rgba(0, 0, 0, 0.08);">
                                    <div style="float: right" class="form-group col-3">
                                        <div class="m-2" style="width: 100%;display: block">تعداد لت</div>

                                        <label class="switch switch-warning mr-3">
                                            <input @if($card->lat == 1) checked @endif value="1" name="lat" type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div style="float: right" class="form-group col-3">
                                        <div class=" m-2" style="width: 100%;display: block">خط تا</div>

                                        <label class="switch switch-primary mr-3">
                                            <input @if($card->khateta == 1) checked @endif value="1" name="khateta" type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div style="float: right" class="form-group col-3">
                                        <div class=" m-2" style="width: 100%;display: block">قالب</div>

                                        <label class="switch switch-danger mr-3">
                                            <input @if($card->ghaleb == 1) checked @endif value="1" name="ghaleb" type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div style="float: right" class="form-group col-3">
                                        <div class=" m-2" style="width: 100%;display: block">قالب</div>

                                        <label class="switch switch-dark mr-3">
                                            <input type="checkbox">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div style="width: 100%;clear: both;height: 1px;"></div>
                                </div>
                                <hr>
                                <div class="form-group files ">
                                    <div class="col-9">
                                        <span>مدیریت فایلهای دریافتی</span>
                                    </div>
                                    <div onclick="addfile()" class="btn btn-danger mt-3 btn-sm col-2">افزودن جدید</div>
                                    <div class="clearfix mb-2"></div>
                                    @if($card->files)
                                        @php $cc = 0 ; @endphp
                                        @foreach(json_decode($card->files) as $file)
                                            @php $cc++ ; @endphp

                                            <div class="addfiles addfile{{$cc}}">
                                                <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <label for="days" class="col-sm-10 control-label">نام فایل</label>
                                                        <input  required oninput="this.setCustomValidity('')"
                                                                oninvalid="this.setCustomValidity(this.placeholder)" type="text"
                                                                value="{{ $file->text }}" name="files[]" class="form-control" id="price" placeholder="عنوان را وارد کنید">
                                                    </div>


                                                    <div class="col-3">
                                                        <label for="state" class="col-sm-12 control-label">وضعیت</label>
                                                        <select  required oninput="this.setCustomValidity('')"
                                                                 oninvalid="this.setCustomValidity('لطفا وضعیت محصول را مشخص نمایید')"
                                                                 name="filestate[]" id="state" class="form-control">
                                                            <option value="">انتخاب وضعیت</option>
                                                            @foreach($states as $state)
                                                                <option @if($file->filestate == $state->id) selected="selected" @endif value="{{ $state->id }}">{{ $state->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="days" class="col-sm-10 control-label">اقدامات</label>
                                                        <span onclick="delfile({{ $cc }})" class="btn btn-danger w-100">حذف</span>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>



                                <hr>
                                <div class="form-group col-12">
                                    <label for="state" class="col-sm-10 control-label">وضعیت</label>
                                    <select  required oninput="this.setCustomValidity('')"
                                             oninvalid="this.setCustomValidity('لطفا وضعیت محصول را مشخص نمایید')" name="state" id="state" class="form-control">
                                        <option value="" selected>انتخاب وضعیت</option>
                                        @foreach($states as $state)
                                            <option @if($card->state == $state->id) selected="selected" @endif value="{{ $state->id }}">{{ $state->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.cardprocuct.all') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
<style>
    .ms-options-wrap ul{
        max-height: 200px !important;
        direction: ltr;
        list-style: none;
    }


    .ms-options-wrap li {
        border: 1px solid #ebebeb;
        margin: 2px;
        background: #ebebeb;
        border-radius: 3px;
    }
</style>
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

    $(document).ready(function() {
        $('#category').select2({
            dir: "rtl",
            placeholder:'انتخاب کنید'
        });
    });

    function addprice() {
        var a = $('.adddeys').html();
        $('.prices').append('                                            <div class="adddeys">\n' +
            '                                        <div class="row mb-2">\n' +
            '                                            <div class="col-5">\n' +
            '                                                <label for="days" class="col-sm-10 control-label">زمان تحویل</label>\n' +
            '                                                <input  required oninput="this.setCustomValidity(\'\')"\n' +
            '                                                        oninvalid="this.setCustomValidity(this.placeholder)" type="number"\n' +
            '                                                        name="days[]" class="form-control" id="price" placeholder="عنوان را وارد کنید">\n' +
            '                                            </div>\n' +
            '                                            <div class="col-4">\n' +
            '                                                <label for="days" class="col-sm-10 control-label">قیمت</label>\n' +
            '                                                <input  required oninput="this.setCustomValidity(\'\')"\n' +
            '                                                        oninvalid="this.setCustomValidity(this.placeholder)" type="number"\n' +
            '                                                        name="price[]" class="form-control" id="price" placeholder="عنوان را وارد کنید">\n' +
            '                                            </div>\n' +
            '                                            <div class="col-3">\n' +
            '                                                <label for="state" class="col-sm-12 control-label">وضعیت</label>\n' +
            '                                                <select  required oninput="this.setCustomValidity(\'\')"\n' +
            '                                                         oninvalid="this.setCustomValidity(\'لطفا وضعیت محصول را مشخص نمایید\')"\n' +
            '                                                         name="daystate[]" id="state" class="form-control">\n' +
            '                                                    <option value="">انتخاب وضعیت</option>\n' +
            '                                                    @foreach($states as $state)\n' +
            '                                                        <option value="{{ $state->id }}">{{ $state->title }}</option>\n' +
            '                                                    @endforeach\n' +
            '                                                </select>\n' +
            '                                            </div>\n' +
            '                                        </div>\n' +
            '                                    </div>\n');
    }

    function addfile() {
        var countdiv = $(".addfiles").length+1;
        var a = $('.addsiles').html();
        $('.files').append(' <div class="addfiles addfile'+countdiv+' ">'+
       ' <div class="row mb-2">'+
       ' <div class="col-md-6">'+
      '  <label for="days" class="col-sm-10 control-label">نام فایل</label>'+
       ' <input  required '+
      '   type="text"'+
      '   name="files[]" class="form-control" id="price" placeholder="عنوان را وارد کنید">'+
      '  </div>'+
       ' <div class="col-3">'+
       ' <label for="state" class="col-sm-12 control-label">وضعیت</label>'+
        '<select  required '+
       ' name="filestate[]" id="state" class="form-control">'+
       ' <option value="">انتخاب وضعیت</option>'+
       ' @foreach($states as $state)'+
       ' <option value="{{ $state->id }}">{{ $state->title }}</option>'+
       ' @endforeach '+
       ' </select>'+
       ' </div>'+
       '<div class="col-3">'+
            '  <label for="days" class="col-sm-10 control-label">اقدامات</label>'+
                '<span onclick="delfile('+countdiv+')" class="btn btn-danger w-100">حذف</span>'+
        '</div>'+
        '</div>'+
        '</div>');
    }

    function delfile(id) {
                $('.addfile'+id).remove();
    }




</script>
@endsection