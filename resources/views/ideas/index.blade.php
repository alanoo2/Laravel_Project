<x-layout>

    <header class="py-8 ">
        <h1 class="text-[32px] font-bold">Ideas</h1>
        <p class="text-muted-foreground text-sm">Capture your thoughts. Make a plan</p>
    </header>

    <main>
        <div>
            <a class="p-2 m-3 {{ request()->has('status') ? '' : 'bg-green-500 border-black-500 rounded-[13px] rounded-50 text-black font-semibold'}}" href="/ideas">All</a>
            @foreach (App\IdeaStatus::cases() as $status)
                <a class="p-2 m-3 {{ request('status') === $status->value ? 'bg-green-500 border-black-500 rounded-[13px] text-black font-semibold' : '' }}" href="/ideas?status={{$status}}">{{ $status->label() }}
                    <span class="text-[13px]"> {{$statusCounts->get($status->value) }} </span>
                </a>
            @endforeach
        </div>

        <div class="text-muted-foreground">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 pt-10">
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
