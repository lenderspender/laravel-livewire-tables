@aware(['tableName','isTailwind','isBootstrap','isBootstrap4','isBootstrap5'])
@props(['filterKey'])
@if ($isTailwind)
    <button
        wire:click="resetFilter('{{ $filterKey }}')"
        type="button"
        {{
            $attributes->merge($this->getFilterPillsResetFilterButtonAttributes())
            ->class([
                'flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center focus:outline-none' => $this->getFilterPillsResetFilterButtonAttributes()['default-styling'],
                'text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:bg-indigo-500 focus:text-white' => $this->getFilterPillsResetFilterButtonAttributes()['default-colors'],
            ])
            ->except(['default-styling', 'default-colors'])
        }}
    >
        <span class="sr-only">{{ __($this->getLocalisationPath.'Remove filter option') }}</span>
        <x-heroicon-m-x-mark class="h-full" />
    </button>
@else
    <a
        href="#"
        wire:click="resetFilter('{{ $filterKey }}')"
        {{
            $attributes->merge($this->getFilterPillsResetFilterButtonAttributes())
            ->class([
                'text-white ml-2' => $isBootstrap && $this->getFilterPillsResetFilterButtonAttributes()['default-styling']
            ])
            ->except(['default-styling', 'default-colors'])
        }}
    >
        <span @class([
            'sr-only' => $isBootstrap4,
            'visually-hidden' => $isBootstrap5,
            ])>{{ __($this->getLocalisationPath.'Remove filter option') }}
            </span>
        <x-heroicon-m-x-mark class="laravel-livewire-tables-btn-tiny"  />
    </a>
@endif
