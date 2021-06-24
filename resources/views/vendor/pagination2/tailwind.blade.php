@if ($paginator->hasPages())
    <div class="row w-100">
        <ul class="pagination-custom text-center w-100">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pag-link"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            @else
                <li class="pag-link"><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
            @endif




            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}


                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pag-link current"><span>{{ $page }}</span></li>
                        @else
                            <li class="pag-link"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pag-link"><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
            @else

            @endif
        </ul>
    </div>
@endif
