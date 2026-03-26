@props([
    'name', 'title'
])

<div
    x-data="{show: false, name: @js($name)  }"
    x-show="show"
   @open-modal.window=" if($event.detail === name) show=true; "
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs"
    x-transition:enter="ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-4 -translate-x-4"
    x-transition:enter-end="opacity-100 "
    x-transition:leave="ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 -translate-y-4 -translate-x-4"


>
    <x-card @click.away="show = false" class="p-5">
        <h3 class="text-[26px] mb-1"> {{$title}} </h3>
        {{ $slot }}
    </x-card>
</div>
