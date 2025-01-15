@if ($paginator->hasPages())
    <nav class="pagination-container">
        {{-- flecha de atras --}}
        @if ($paginator->onFirstPage())
            <span class="pagination-link disabled">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">&laquo;</a>
        @endif

        {{-- numeros de paginas --}}
        @foreach ($elements as $element)
            {{-- flechas de siguiente --}}
            @if (is_string($element))
                <span class="pagination-link disabled">...</span>
            @endif

            {{-- enlace a cada página --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="pagination-link active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- pagina siguiente --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">&raquo;</a>
        @else
            <span class="pagination-link disabled">&raquo;</span>
        @endif
    </nav>
@endif
