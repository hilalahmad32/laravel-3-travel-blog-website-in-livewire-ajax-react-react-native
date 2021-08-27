<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">
                        <span>
                          
                            <div class="container">
                                <div class="d-flex justify-content-center">
                        @foreach ($elements as $element)
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <span wire:key="paginator-page{{ $page }}">
                                        @if ($page == $paginator->currentPage())
                                            <span aria-current="page">
                                                <span class="pagination">{{ $page }}</span>
                                            </span>
                                        @else
                                            <button style="outline:none;" wire:click="gotoPage({{ $page }})" class="pagination" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                                {{ $page }}
                                            </button>
                                        @endif
                                    </span>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
                     
                    </span>
                </div>
            </div>
        </nav>
    @endif
</div>
