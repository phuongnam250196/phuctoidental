@if ($paginator->hasPages())
    <div class="paginate_links">
        
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="page-numbers disabled" aria-disabled="true"><span class="page-numbers">{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                <?php $dem=0; ?>
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-numbers current" aria-current="page">{{ $page }}</a>
                    @else
                        @if($page == $paginator->currentPage()-1 || $page == 0 || $page == $paginator->currentPage()-2 || $page == $paginator->currentPage()+1 || $page == $paginator->currentPage()+2 || $page == 1 || $page == $paginator->lastPage())
                            <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                        @else
                            <span class="page-numbers" @if($dem != 0) style="display: none" @endif {{$dem++}}>...</span>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Tiếp</a>           
        @else
            
        @endif
    </div>
@endif
