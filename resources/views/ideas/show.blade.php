<x-layout>

    <div class="py-8 max-w-4x1 mx-auto">
        <h1 class="font-semibold text-[32px]">{{ $idea->title}}</h1>
            <x-card class="mt-4">
                <span class="text-foreground max-w-none cursor-pointer"> {{$idea->description}} </span>
            </x-card>
    </div>

</x-layout>
