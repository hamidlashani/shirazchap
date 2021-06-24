@extends('admin.Gull-master')


@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">


                <form class="form-horizontal" action="{{ route('admin.largeformats.update',['largeformat'=>$largeformat->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body row">
                        <div class="col-4">
                            <div class="form-group col-12">
                                <label for="inputEmail3" class="col-sm-12 control-label">عنوان</label>
                                <input value="{{ $largeformat->title }}" type="text" name="title" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                            </div>
                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">دسته بندی</label>
                                <select required name="category" class="form-control category">

                                    <option value="">انتخاب دسته بندی</option>
                                    {{ $cat = \Modules\Largeformats\Entities\Largeformat::find($largeformat->id)->categories->first() }}
                                @foreach($cats as $category)
                                        <option @if($category->id == $cat->id) selected  @endif value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">نوع مدیا</label>
                                <select name="media" class="form-control">
                                    @foreach(\Modules\Printingoffice\Entities\printingofficemedias::all() as $productin)
                                        <option
                                                @php
                                                    if($largeformat->media == $productin->id ){echo 'selected="selected"';}

                                                @endphp
                                                value="{{ $productin->id }}">{{ $productin->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">سایز های موجود</label>
                                <select name="widths[]" class="form-control select-checkbox" multiple>
                                    @foreach(\Modules\Printingoffice\Entities\printingofficewidths::all() as $width)

                                        <option
                                                @if(in_array($width->id,json_decode($largeformat->widths,true)))
                                                selected="selected"
                                                @endif

                                                value="{{ $width->id }}">{{ $width->size }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group col-12">
                                <label for="inputEmail3" class="col-sm-10 control-label">تصویر مقدمه</label>
                                <div class="input-group">
                                    <input value="{{ $largeformat->image }}" type="text" id="image_label" class="form-control" name="image">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                    </div>
                                </div>
                                <img style="width: 100px;padding: 10px;" src="{{ $largeformat->image }}">

                            </div>


                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                                <select name="state" class="form-control">
                                    @foreach($states as $state)
                                        <option
                                                @php
                                                    if($largeformat->state == $state->id ){echo 'selected="selected"';}

                                                @endphp
                                                value="{{ $state->id }}">{{ $state->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-8">
                            <div class=" addmtp">
                                <div id="mtp" class="col-12 row">
                                    @foreach($productoptions as $productoption)
                                        <div class="form-group col-3">
                                            <label for="inputPassword3" class="col-sm-10 control-label">مدل دستگاه</label>
                                            <input readonly value="{{$productoption->device_name}}" type="text" name="olddevice[{{ $productoption->id }}]" class="form-control" id="inputEmail3" >

                                        </div>

                                        <div class="form-group col-3">
                                            <label for="inputPassword3" class="col-sm-10 control-label">ضخامت مدیا</label>
                                            <input readonly value="{{$productoption->thickness_name}}" type="text" name="oldthickness[{{ $productoption->id }}]" class="form-control" id="inputEmail3" >

                                        </div>

                                        <div class="form-group col-2">
                                            <label for="inputPassword3" class="col-sm-10 control-label">Pass</label>
                                            <input readonly value="{{$productoption->pass_name}}" type="text" name="oldpass[{{ $productoption->id }}]" class="form-control" id="inputEmail3" >
                                        </div>

                                        <div class="form-group col-2">
                                            <label for="inputPassword3" class="col-sm-10 control-label">قیمت واحد</label>
                                            <input value="{{$productoption->price}}" type="text" name="oldprice[{{ $productoption->id }}]" class="form-control" id="inputEmail3" placeholder="قیمت را وارد کنید">
                                        </div>

                                        <div class="form-group col-2">
                                            <label for="inputPassword3" class="col-sm-10 control-label">Pass</label>
                                            <select name="oldstate[{{ $productoption->id }}]" class="form-control">
                                                @foreach(\App\Models\state::all() as $state)
                                                    <option
                                                            @php
                                                                if($productoption->state == $state->id ){echo 'selected="selected"';}

                                                            @endphp
                                                            value="{{ $state->id }}">{{ $state->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    @endforeach


                                </div>
                            </div>
                            <span id="addnewrow" class="btn btn-success">افزودن جدید</span>
                            <script>
                                $('#addnewrow').click(function () {
                                    var counter = $('.counter').length;
                                    counter = parseInt(counter);
                                    $('#mtp').append('' +
                                        '<div class="row counter" style="width:100%" id="row'+counter+1+'">'+
                                        '<div class="form-group col-3 ">'+
                                        '<span onclick="delrow('+ (counter+1)+')" style="position: relative;right: -28px;top: 37px;"><i style="color:red !important" class="i-Close-Window text-22 text-muted"></i></span>'+

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
                                        '      </div>'+
                                        '');
                                });
                            </script>

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



        function  delrow(id) {
            $('#row0'+id).remove();
        }


    </script>
@endsection