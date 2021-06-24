@extends('admin.Gull-master')


@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            @include('admin.layouts.errors')
            <div class="card card-info">


                <form class="form-horizontal" action="{{ route('admin.printingoffice.updatemedia',['media'=>$media->id ]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card-body row">

                        <div class="form-group col-6">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان</label>
                            <input value="{{ $media->title }}" type="text" name="title" class="form-control" id="inputEmail3" placeholder="عنوان را وارد کنید">
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
                        <a href="{{ route('admin.printingoffice.allmedia') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


@endsection