<div class="row-pagination">
    <div class="pagination">
        @if ($pagination->currentPage() > 1)
            <a href="{{ $pagination->url($pagination->currentPage() - 1) }}" class="prev page-numbers">←</a>
        @endif

        @for ($i = 1;$i <= $pagination->lastPage(); $i++)
            <a href="{{ $pagination->url($i) }}" class="page-numbers @if($pagination->currentPage() === $i)_active @endif">{{ $i }}</a>
        @endfor

        @if ($pagination->currentPage() < $pagination->lastPage())
            <a href="{{ $pagination->url($pagination->currentPage() + 1) }}" class="next page-numbers">→</a>
        @endif
    </div>
</div>
