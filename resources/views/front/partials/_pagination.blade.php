@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">
                    <i class="far fa-chevron-left"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <i class="far fa-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item">
                    <a class="page-link disabled">
                        {{ $element }}
                    </a>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <i class="far fa-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)">
                    <i class="far fa-chevron-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif