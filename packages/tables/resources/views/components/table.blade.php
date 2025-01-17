@props([
    'footer' => null,
    'header' => null,
    'poll',
])

<table {{ $attributes->class([
    'w-full text-left rtl:text-right divide-y table-auto filament-tables-table',
    'dark:divide-gray-700' => config('tables.dark_mode'),
]) }}>
    @if ($header)
        <thead>
            <tr @class([
                'bg-gray-50',
                'dark:bg-gray-500/10' => config('tables.dark_mode'),
            ])>
                {{ $header }}
            </tr>
        </thead>
    @endif

    <tbody
        wire:sortable
        wire:end.stop="reorderTable($event.target.sortable.toArray())"
        wire:sortable.options="{ animation: 100 }"
        @if ($poll)
            wire:poll.{{ $poll }}
        @endif
        @class([
            'divide-y whitespace-nowrap',
            'dark:divide-gray-700' => config('tables.dark_mode'),
        ])
    >
        {{ $slot }}
    </tbody>

    @if ($footer)
        <tfoot>
            <tr class="bg-gray-50">
                {{ $footer }}
            </tr>
        </tfoot>
    @endif
</table>
