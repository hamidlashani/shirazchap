@extends('admin.Gull-master')


@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">


                <form class="form-horizontal" action="{{ route('admin.printingoffice.storeaddproduct') }}" method="post">
                    @csrf
                    <div class="card-body row">
                        <div class="col-4">
                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-12 control-label">عنوان</label>
                            <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>

                        <div class="form-group col-12">
                            <label for="inputPassword3" class="col-sm-10 control-label">نوع مدیا</label>
                            <select name="media" class="form-control">
                                @foreach(\Modules\Printingoffice\Entities\printingofficemedias::all() as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group col-12">
                            <label for="inputPassword3" class="col-sm-10 control-label">سایز های موجود</label>
                            <select name="widths[]" class="form-control select-checkbox" multiple>
                                @foreach(\Modules\Printingoffice\Entities\printingofficewidths::all() as $width)
                                    <option value="{{ $width->id }}">{{ $width->size }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group col-12">
                            <label for="inputEmail3" class="col-sm-10 control-label">تصویر مقدمه</label>
                            <div class="input-group">
                                <input type="text" id="image_label" class="form-control" name="image">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group col-12">
                            <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                            <select name="state" class="form-control">
                                <option value="1" selected>فعال</option>
                                <option value="2">غیر فعال</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-8">
                        <div class=" addmtp">
                            <div id="mtp" class="col-12 row">
                            <div class="form-group col-3 counter">
                                <label for="inputPassword3" class="col-sm-10 control-label">مدل دستگاه</label>
                                <select name="device[1]" class="form-control">
                                    @foreach(\Modules\Printingoffice\Entities\printingofficedevice::all() as $device)
                                        <option  value="{{ $device->id }}">{{ $device->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <label for="inputPassword3" class="col-sm-10 control-label">ضخامت مدیا</label>
                                <select name="thickness[1]" class="form-control">
                                    @foreach(\Modules\Printingoffice\Entities\printingofficethickness::all() as $thickness)
                                        <option value="{{ $thickness->id }}">{{ $thickness->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <label for="inputPassword3" class="col-sm-10 control-label">Pass</label>
                                <select name="pass[1]" class="form-control">
                                    @foreach(\Modules\Printingoffice\Entities\Printingofficepass::all() as $pass)
                                        <option value="{{ $pass->id }}">{{ $pass->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <label for="inputPassword3" class="col-sm-10 control-label">قیمت واحد</label>
                                <input type="text" name="price[1]" class="form-control" id="inputEmail3" placeholder="قیمت را وارد کنید">
                            </div>
                            </div>
                        </div>
                        <span id="addnewrow" class="btn btn-success">افزودن جدید</span>
<script>
    $('#addnewrow').click(function () {
        var counter = $('.counter').length;

        $('#mtp').append('' +
           '<div class="form-group col-3 counter">'+
            '<label for="inputPassword3" class="col-sm-10 control-label">مدل دستگاه</label>'+
        '  <select name="device['+ (counter+1) +']" class="form-control">'+
        '       <option value="1">کونیکا</option>'+
        '      <option value="2">اسپکترا</option>'+
        '    <option value="3">اکوسالونت</option>'+
        '      </select>'+
        '      </div>'+

        '      <div class="form-group col-3">'+
        '       <label for="inputPassword3" class="col-sm-10 control-label">ضخامت مدیا</label>'+
        '   <select name="thickness['+ (counter+1) +']" class="form-control">'+
        '           @foreach(\Modules\Printingoffice\Entities\printingofficethickness::all() as $thickness)'+
            '       <option value="{{ $thickness->id }}">{{ $thickness->title }}</option>'+
        '         @endforeach'+
            '    </select>'+
        '     </div>'+

        '     <div class="form-group col-3">'+
        '  <label for="inputPassword3" class="col-sm-10 control-label">Pass</label>'+
        '    <select name="pass['+ (counter+1) +']" class="form-control">'+
        '       @foreach(\Modules\Printingoffice\Entities\Printingofficepass::all() as $pass)'+
            '    <option value="{{ $pass->id }}">{{ $pass->title }}</option>'+
        '       @endforeach'+
            '   </select>'+
        '   </div>'+

        '   <div class="form-group col-3">'+
        '   <label for="inputPassword3" class="col-sm-10 control-label">قیمت واحد</label>'+
        '  <input type="text" name="price['+ (counter+1) +']" class="form-control" id="inputEmail3" placeholder="قیمت را وارد کنید">'+
        '      </div>'+
            '');
    });
</script>

                    </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.printingoffice.allmedia') }}" class="btn btn-default float-left">لغو</a>
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


</script>
@endsection