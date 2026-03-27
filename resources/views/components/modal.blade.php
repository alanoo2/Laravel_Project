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
    <x-card @click.away="show = false" class="p-5 shadow-x1 max-w-2x1 w-[50%] max-h-[80dvh] overflow-auto">
        <div class="flex justify-between">
            <h3 class="text-[26px] mb-1 font-semibold"> {{$title}} </h3>
            <button>
                <x-icons.close-icon @click="show = false" class="w-[22px] color-gray-1000 cursor-pointer" />
            </button>
        </div>

        <div>
            {{ $slot }}
        </div>
    </x-card>
</div>
