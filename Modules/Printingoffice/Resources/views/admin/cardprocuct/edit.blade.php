@extends('admin.Gull-master')


@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">


                <form class="form-horizontal" action="{{ route('admin.cardprocuct.update', ['id'=>$cardproduct->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body ">
                        <div class="row">
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">عنوان</label>
                            <input value="{{ $cardproduct->title }}" type="text" name="title" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">عرض</label>
                            <input value="{{ $cardproduct->width }}" type="text" name="width" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">ارتفاع</label>
                            <input value="{{ $cardproduct->height }}" type="text" name="height" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">نوع چاپ</label>
                            <select name="side" class="form-control">
                                <option value="1">یک رو</option>
                                <option value="2">دو رو</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">تیراژ</label>
                            <input value="{{ $cardproduct->circulation }}" type="text" name="circulation" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">قیمت</label>
                            <input value="{{ $cardproduct->price }}" type="text" name="price" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
                        </div>
                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-12 control-label">توضیحات</label>
                             <textarea class="form-control" name="description">{{ $cardproduct->description }}</textarea>
                        </div>






                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-10 control-label">تصویر مقدمه</label>
                            <div class="input-group">
                                <input value="{{ $cardproduct->image }}" type="text" id="image_label" class="form-control" name="image">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب تصویر</button>
                                </div>
                            </div>
                        </div>


                            <div class="form-group col-6">
                                <label for="inputPassword3" class="col-sm-10 control-label">وضعیت</label>
                                <select name="state" class="form-control">
                                    @foreach(\App\Models\state::all() as $state)
                                        <option
                                                @php
                                                    if($cardproduct->state == $state->id ){echo 'selected="selected"';}

                                                @endphp
                                                value="{{ $state->id }}">{{ $state->title }}</option>
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


</script>
@endsection