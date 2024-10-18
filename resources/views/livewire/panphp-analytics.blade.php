<x-pulse::card id="panphp-analytics" :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header name="PanPHP Analytics">
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
            </svg>
        </x-slot:icon>
        <x-slot:actions>
            <x-pulse::select
                wire:model.live="orderBy"
                label="Sort by"
                :options="[
                    'impressions' => 'impressions',
                    'hovers' => 'hovers',
                    'clicks' => 'clicks',
                ]"
                @change="loading = true"
            />
        </x-slot:actions>
    </x-pulse::card-header>
    <x-pulse::scroll :expand="$expand">
        @if ($analytics->isEmpty())
            <x-pulse::no-results />
        @else
            <x-pulse::table>
                <colgroup>
                    <col width="100%" />
                    <col width="0%" />
                    <col width="0%" />
                    <col width="0%" />
                </colgroup>
                <x-pulse::thead>
                    <tr>
                        <x-pulse::th>Name</x-pulse::th>
                        <x-pulse::th class="text-right">Impressions</x-pulse::th>
                        <x-pulse::th class="text-right">Hovers</x-pulse::th>
                        <x-pulse::th class="text-right">Clicks</x-pulse::th>
                    </tr>
                </x-pulse::thead>
                <tbody>
                @foreach($analytics as $record)
                    <tr class="h-2 first:h-0"></tr>
                    <tr wire:key="{{ $record->name }}">
                        <x-pulse::td class="max-w-[1px]">
                            <code class="block text-xs text-gray-900 dark:text-gray-100 truncate" title="{{ $record->name }}">
                                {{ $record->name }}
                            </code>
                        </x-pulse::td>
                        <x-pulse::td class="text-gray-700 dark:text-gray-300 font-bold text-right">
                            {{ toHumanReadableNumber($record->impressions) }}
                        </x-pulse::td>
                        <x-pulse::td class="text-gray-700 dark:text-gray-300 font-bold text-right">
                            {{ toHumanReadableNumber($record->hovers) }} ({{ toHumanReadablePercentage($record->impressions, $record->hovers) }})
                        </x-pulse::td>
                        <x-pulse::td class="text-gray-700 dark:text-gray-300 font-bold text-right">
                            {{ toHumanReadableNumber($record->clicks) }} ({{ toHumanReadablePercentage($record->impressions, $record->clicks) }})
                        </x-pulse::td>
                    </tr>
                @endforeach
                </tbody>
            </x-pulse::table>
        @endif
    </x-pulse::scroll>
</x-pulse::card>
