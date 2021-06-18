

@if ($paginator->hasPages())
<div class="card card-custom gutter-b">
    <div class="card-body py-7">
        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap mr-3">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="ki ki-bold-arrow-back icon-xs"></i></span>
                </a>
            @else
                    <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="ki ki-bold-arrow-back icon-xs"></i></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 disabled" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 active" aria-current="page"><span>{{ $page }}</span></a>
                        @else
                            <a class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="ki ki-bold-arrow-next icon-xs"></i></a>
            @else
                <a class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="ki ki-bold-arrow-next icon-xs"></i></span>
                </a>
            @endif
    </div>
</div>
</div>
</div>

@endif
