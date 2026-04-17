@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
    $range = 1;
@endphp

@if ($paginator->hasPages())
<nav class="flex justify-center mt-8">
    <ul class="inline-flex items-center gap-1 text-sm">

        {{-- Previous --}}
        <li>
            @if ($paginator->onFirstPage())
                <span class="px-3 h-9 flex items-center text-gray-300 border border-gray-200 rounded-lg">
                    ‹ Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 h-9 flex items-center text-gray-400 border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-600 hover:border-gray-300 transition">
                    ‹ Previous
                </a>
            @endif
        </li>

        {{-- First --}}
        <li>
            <a href="{{ $paginator->url(1) }}"
               class="h-9 w-9 flex items-center justify-center rounded-lg border border-gray-200
               {{ $current == 1 ? 'bg-blue-50 text-blue-600 border-blue-400' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-600 hover:border-gray-300' }}">
                1
            </a>
        </li>

        {{-- Left dots --}}
        @if ($current - $range > 2)
            <li>
                <span class="h-9 w-9 flex items-center justify-center text-gray-300 border border-gray-200 rounded-lg">
                    …
                </span>
            </li>
        @endif

        {{-- Middle --}}
        @for ($i = max(2, $current - $range); $i <= min($last - 1, $current + $range); $i++)
            <li>
                <a href="{{ $paginator->url($i) }}"
                   class="h-9 w-9 flex items-center justify-center rounded-lg border border-gray-200
                   {{ $current == $i ? 'bg-blue-50 text-blue-600 border-blue-400' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-600 hover:border-gray-300' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        {{-- Right dots --}}
        @if ($current + $range < $last - 1)
            <li>
                <span class="h-9 w-9 flex items-center justify-center text-gray-300 border border-gray-200 rounded-lg">
                    …
                </span>
            </li>
        @endif

        {{-- Last --}}
        @if ($last > 1)
            <li>
                <a href="{{ $paginator->url($last) }}"
                   class="h-9 w-9 flex items-center justify-center rounded-lg border border-gray-200
                   {{ $current == $last ? 'bg-blue-50 text-blue-600 border-blue-400' : 'text-gray-400 hover:bg-gray-50 hover:text-gray-600 hover:border-gray-300' }}">
                    {{ $last }}
                </a>
            </li>
        @endif

        {{-- Next --}}
        <li>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 h-9 flex items-center text-gray-400 border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-600 hover:border-gray-300 transition">
                    Next ›
                </a>
            @else
                <span class="px-3 h-9 flex items-center text-gray-300 border border-gray-200 rounded-lg">
                    Next ›
                </span>
            @endif
        </li>

    </ul>
</nav>
@endif
