@if ($paginator->hasPages())
    <div class=" paging_full_numbers ml-lg-auto ml-md-auto">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item previous disabled">
                    <a href="#"   class="page-link">Prev</a></li>
            @else
                <li class="paginate_button page-item previous">
                    <a href="{{ $paginator->previousPageUrl() }}"    rel="prev">Prev</a></li>
            @endif


          
            @foreach ($elements as $element)
               
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif


               
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active"><span class="d-inline-block">{{ $page }}</span></li>
                        @else
                            <li class="paginate_button page-item"><a class="page-link d-inline-block" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
            @else
                <li class="paginate_button page-item next disabled"><span>Next</span></li>
            @endif
        </ul>
    </div>
@endif 