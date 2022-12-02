{{-- @if ($paginator->hasPages())
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">

                @if ($paginator->onFirstPage())
                    <li class="page-item"><i class="w-4 h-4 page-link" data-lucide="chevron-left"></i></li>
                @else
                    <li class="page-item"><a wire:click="previousPage" wire:loading.attr="disabled" class="page-link"
                            rel="prev"><i class="w-4 h-4" data-lucide="chevron-left"></i></a>
                    </li>
                @endif



                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="page-item"><span>{{ $element }}</span></li>
                    @endif



                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a wire:click="gotoPage({{ $page }})" class="page-link"
                                        >{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach



                @if ($paginator->hasMorePages())
                    <li class="page-item">


                        <a wire:click="nextPage" wire:loading.attr="disabled" class="page-link"
                            rel="next"><i class="w-4 h-4" data-lucide="chevron-right"></i></a>
                    </li>
                @else
                    <li class="page-item">
                        <i class="w-4 h-4 page-link" data-lucide="chevron-right">
                        </i>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
@endif --}}
@if ($paginator->hasPages())
    <div class="pagination datatable-pagination  text-center">

        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li wire:click.prevent="previousPage" class="active"><a><i class="fas fa-angle-left"></i></a></li>
            @else
                <li wire:click.prevent="previousPage"><a rel="prev">
                        <i class="fas fa-angle-left"></i></a></li>
            @endif
            @foreach ($elements as $element)
                {{-- @if (is_string($element))
                    <li>{{ $element }}</li>
                @endif --}}

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li wire:click="gotoPage({{ $page }})" class="active "> <a> {{ $page }} </a>
                            </li>
                        @else
                            <li wire:click="gotoPage({{ $page }})"><a>{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- <li class="active"><a data-page="1">1</a></li> --}}
            {{-- <li><a data-page="2">2</a></li> --}}
            @if ($paginator->hasMorePages())
                <li wire:click="nextPage" wire:loading.attr="disabled"><a data-page="next" rel="next"><i
                            class="fas fa-angle-right"></i></a></li>
            @else
                <li class="active"><a><i class="fas fa-angle-right"></i></a></li>
            @endif
        </ul>
    </div>
@endif

{{-- <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
            </li>
            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
            <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
            <li class="page-item">
                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
            </li>
        </ul>
    </nav>
    <select class="w-20 form-select box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
    </select>
</div> --}}
