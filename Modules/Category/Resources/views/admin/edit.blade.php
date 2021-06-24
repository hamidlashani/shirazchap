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
                <form class="form-horizontal" action="{{ route('admin.category.update',['category'=>$category->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body row">

                        <div class="col-5">
                            <div class="form-group col-12">
                                <label for="inputEmail3" class="col-sm-10 control-label">عنوان</label>
                                <input value="{{ $category->title }}" name="title" type="text" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                            </div>

                            <div class="form-group col-12">
                                <label for="inputEmail3" class="col-sm-10 control-label">متن جایگزین</label>
                                <input readonly value="{{ $category->slug }}" name="slug" type="text" class="form-control" id="inputEmail3" placeholder="متن جایگزین را وارد کنید">
                            </div>

                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">دسته والد</label>
                                <select required name="parent_id" class="form-control category">
                                    <option value="0">انتخاب دسته والد</option>
                                    @foreach(\Modules\Category\Entities\Category::all() as $categorys)
                                        <option
                                            <?php if($categorys->id == $category->parent_id ){echo 'selected="selected"';} ?>
                                            value="{{ $categorys->id }}">{{ $categorys->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">مدل مربوط</label>
                                <select required name="type" class="form-control category">
                                    <option value="">انتخاب</option>
                                    @foreach($modules as $module)
                                        @if($module->getName() != 'Slider' && $module->getName() != 'User' && $module->getName() != 'Printingoffice' && $module->getName() != 'Module')
                                            <?php    $modulesdate = new \Nwidart\Modules\Json($module->getpath().'/module.json') ; ?>
                                            <option
                                                <?php if($modulesdate->get('model') == $category->type ){echo 'selected="selected"';} ?>
                                                value="{{ $modulesdate->get('model') }}">{{ $module->getName() }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>



                            <div class="form-group col-12">
                                <label for="inputEmail3" class="col-sm-10 control-label">تصویر </label>
                                <div class="input-group">
                                    <input value="{{ $category->image }}" type="text" id="image_label" class="form-control" name="image">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-12">
                                <label for="inputEmail3" class="col-sm-10 control-label">توضیحات</label>
                                <textarea name="description" type="text" class="form-control" id="inputEmail3">{{ $category->description }}</textarea>
                            </div>

                            <div class="form-group col-12">
                                <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                                <select name="state" class="form-control">
                                    @foreach($states as $state)
                                        <option
                                                @php
                                                    if($category->state == $state->id ){echo 'selected="selected"';}

                                                @endphp
                                                value="{{ $state->id }}">{{ $state->title }}</option>
                                    @endforeach
                                </select>
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