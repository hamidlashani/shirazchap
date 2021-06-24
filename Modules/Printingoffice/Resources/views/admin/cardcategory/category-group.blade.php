<ul class="list-group list-group-flush">
    @foreach($categories as $category)
        <li class="list-group-item" style="padding: 10px 0">
            <div class="d-flex">
                <span>{{ $category->name }}</span>
                <a href="cardcardcategory/{{ $category->id }}/edit" class="btn btn-danger">ویرایش</a>
            </div>
        @if($category->child->count())
                @include('printingoffice::admin.cardcategory.category-group',['categories'=>$category->child])
        @endif
        </li>
    @endforeach
</ul>
