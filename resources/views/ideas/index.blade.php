<x-layout>

    <header class="py-8 ">
        <h1 class="text-[32px] font-bold">Ideas</h1>
        <p class="text-muted-foreground text-sm">Capture your thoughts. Make a plan</p>
        <x-card
            x-data
            @click="$dispatch('open-modal', 'create-idea')"
            is="button"
            class="mt-10 cursor-pointer h-32 w-full text-left">
            Hey there
        </x-card>
    </header>

    <main>
        <div>
            <a class="p-2 m-3 rounded-[13px] {{ request()->has('status') ? 'hover:bg-gray-200/8' : 'bg-green-500 border-black-500 text-black font-semibold '}}" href="/ideas">All</a>
            @foreach (App\IdeaStatus::cases() as $status)
                <a class="p-2 m-3 rounded-[13px] {{ request('status') === $status->value ? 'bg-green-500 border-black-500 text-black font-semibold' : 'hover:bg-gray-200/8' }}" href="/ideas?status={{$status}}">{{ $status->label() }}
                    <span class="text-[13px] " class="py-1"> {{$statusCounts->get($status->value) }} </span>
                </a>
            @endforeach
        </div>

        <div class="">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 pt-10 ">
            @forelse ($ideas as $idea)

            <x-card href="/ideas/{{ $idea->id }}">
                @if ($idea->image_path)
                    <div class="-mb-4 -mx-4 -mt-4 rounded-t-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $idea->image_path) }}" class="w-full h-48 object-cover">
                    </div>
                @endif

                <h2 class="text-foreground text-lg mt-5">{{$idea->title}}</h2>
                <div>
                    <x-status status="{{ $idea->status}}">
                        {{ $idea->status }}
                    </x-status>
                </div>

                <div class="mt-5 text-muted-foreground line-clamp-3"> {{ $idea->description}}</div>
                <div class="mt-4 relative left-80">{{ $idea->created_at->diffForHumans() }}</div>
            </x-card>

            @empty
                <p>No ideas yet</p>
            @endforelse
        </div>

        <!-- MODAL -->
            <x-idea.modal />

        </div>
    </main>


</x-layout>
