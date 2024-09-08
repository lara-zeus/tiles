@php
    $state = $getState();
    $image = $getImage();
    $record = $getRecord();
    $description = $getDescription();
    $tooltip = $getTooltip();
    $hasTooltip = filled($tooltip);
    $hasPopover = filled($popover);
    $popover = $getPopover();
    $icon = $getIcon($state);
@endphp

@capture($tile)
    <div
         @if ($hasTooltip)
             x-tooltip="{
                content: @js($tooltip),
                theme: $store.theme,
            }"
         @endif
         @class([
            'w-full',
            'grid gap-y-1' => !isset($field),
        ])
>
    <div class="flex items-center justify-between cursor-pointer" @click="$refs.panel.toggle">
        <div>
            <div class="flex max-w-max">
                <div class="inline-flex items-center gap-1.5">
                    @if(filled($image))
                        <img
                                alt="{{ $state }}"
                                class="h-5 w-5 text-gray-400 dark:text-gray-500"
                                src="{{ $image }}"
                        >
                    @endif

                    <span class="text-sm leading-6 text-gray-950 dark:text-white">
                    {{ $state }}
                </span>
                </div>
            </div>

            @if (filled($description))
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $description }}
                </p>
            @endif
        </div>


        @if(filled($icon))
            <x-filament::icon
                    :icon="$icon"
                    class="h-4 w-4 text-gray-500 dark:text-gray-400"
            />
        @endif
    </div>

    @if($hasPopover)
        <div class="z-50 transition"
             x-transition:enter-start="opacity-0"
             x-transition:leave-end="opacity-0"
             x-cloak
             x-ref="panel"
             x-float.placement.bottom.flip.teleport
        >
            {!! $popover !!}
        </div>
    @endif

</div>
@endcapture

@if(isset($field))
    <x-dynamic-component
        :component="$getFieldWrapperView()"
        :field="$field"
    >
        {{ $tile() }}
    </x-dynamic-component>
@else
    {{ $tile() }}
@endif
