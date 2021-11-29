<nav id="product-pager" class="pagination">
    <ul>
        @if ($products->onFirstPage())
        <li><a href="{{ $products->appends($query)->previousPageUrl() }}">&lt;</a></li>
        <li><a href="{{ $products->appends($query)->url($products->currentPage()) }}" class="current-page">{{ $products->currentPage() }}</a></li>
            @if ($products->hasMorePages())
            <li><a href="{{ $products->appends($query)->nextPageUrl() }}">{{ $products->currentPage() + 1 }}</a></li>
            @endif
        <li><a href="{{ $products->appends($query)->nextPageUrl() }}">&gt;</a></li>
        @else
        <li><a href="{{ $products->appends($query)->previousPageUrl() }}">&lt;</a></li>
        <li><a href="{{ $products->appends($query)->previousPageUrl() }}">{{ $products->currentPage() - 1 }}</a></li>
        <li><a href="{{ $products->appends($query)->url($products->currentPage()) }}" class="current-page">{{ $products->currentPage() }}</a></li>
            @if ($products->hasMorePages())
            <li><a href="{{ $products->appends($query)->nextPageUrl() }}">{{ $products->currentPage() + 1 }}</a></li>
            @endif
        <li><a href="{{ $products->appends($query)->nextPageUrl() }}">&gt;</a></li>
        @endif
    </ul>
</nav>