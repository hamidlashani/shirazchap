@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <div class="mb-2 btn btn-success btn-sm"><a style="color: #ffffff" href="{{ route('admin.printingoffice.addproduct') }}">ثبت محصول جدید</a></div>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>ای دی مدیا</th>
                        <th>نام مدیا</th>
                        <th>تصویر</th>
                        <th>وضعیت</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $procuct)
                        <tr>
                            <td>{{ $procuct->id }}</td>
                            <td>{{ $procuct->media_name }}</td>
                            <td><img width="30" src="{{ $procuct->image }}"></td>
                            <td>
                                @if($procuct->state == '1')
                                    <span class="btn btn-success">فعال</span>
                                    @else
                                <span class="btn btn-danger">غیر فعال</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-success ">
                                    <a href="{{ route('admin.printingoffice.productedite',['product'=>$procuct->id]) }}"><i class="nav-icon i-Pen-2 "></i></a>
                                </button>
                                    <form method="post" action="{{ route('admin.printingoffice.productdestroy',['product'=>$procuct->id]) }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-2">حذف</button>

                                    </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <?php echo $products->render(); ?>

        </div>
    </div>
@endsection