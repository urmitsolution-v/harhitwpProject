<style>
    .page-nav li span,
    .page-nav li a,
    .page-nav li:last-child a,
    .page-nav li:first-child a {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        width: auto;
        padding: 0px 19px;
        height: 40px;
        line-height: 35px;
        text-align: center;
        color: var(--titleColor);
        background-color: #0082a41f;
        -webkit-transition: var(--transition);
        transition: var(--transition);
    }

    .page-nav li:last-child a {
        position: relative;
        top: -2px;
    }


    .page-nav li:first-child a {
        position: relative;
        top: -2px;
    }

    .page-nav li.active span {
        background: #0082a4;
        color: #fff;
    }

</style>

@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="disabled"><span>Previous</span></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="disabled"><span>{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active"><span>{{ $page }}</span></li>
    @else
    <li><a href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
    @else
    <li class="disabled"><span>Next</span></li>
    @endif
</ul>
@endif
