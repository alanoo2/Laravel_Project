@props([
    'title', 'description'
])

<div class="flex min-h-[calc(100dvh-4rem)] items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mr-15">
                <h1 class="text-[32px] font-semibold">{{ $title }}</h1>
                <p class="text-[12px] text-gray-600">{{ $description }}</p>
            </div>


            {{$slot}}
        </div>
</div>
