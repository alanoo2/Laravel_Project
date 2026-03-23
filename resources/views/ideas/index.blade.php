<x-layout>

    <header class="py-8 ">
        <h1 class="text-[32px] font-bold">Ideas</h1>
        <p class="text-muted-foreground text-sm">Capture your thoughts. Make a plan</p>
    </header>

    <main>
        <div class="text-muted-foreground">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
            @forelse ($ideas as $idea)

            <x-card href="/ideas/{{ $idea->id }}">
                <h2 class="text-foreground text-lg">{{$idea->title}}</h2>
                <div>
                    <x-status status="{{ $idea->status}}">
                        {{ $idea->status }}
                    </x-status>
                </div>

                <div class="mt-5 line-clamp-3"> {{ $idea->description}}</div>
                <div class="mt-4 text-foreground relative left-80">{{ $idea->created_at->diffForHumans() }}</div>
            </x-card>

            @empty
                <p>No ideas yet</p>
            @endforelse
        </div>
        </div>
    </main>

</x-layout>
