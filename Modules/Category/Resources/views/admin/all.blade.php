@extends('admin.Gull-master')


@section('content')

    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th>کد</th>
                        <th>عنوان</th>
                        <th>اقدامات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @include('category::admin.category',['categories'=>\Modules\Category\Entities\Category::where('parent_id',0)->get()])
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection