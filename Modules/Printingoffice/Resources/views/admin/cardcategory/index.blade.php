@extends('admin.Gull-master')


@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <div class="main-content">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        لیست دسته بندی ها
                    </div>
                    <div class="card-body table-responsive p-0">
                        @include('printingoffice::admin.cardcategory.category-group',['categories'=>$categories])
                    </div>

                </div>
            </div>

            <?php echo $categories->appends(['search'=>request('search')])->render(); ?>        </div>
    </div>
@endsection