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
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 pt-10">
            @forelse ($ideas as $idea)

            <x-card href="/ideas/{{ $idea->id }}">
                <h2 class="text-foreground text-lg">{{$idea->title}}</h2>
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
            <x-modal name="create-idea" title="New Idea">

                <form x-data="{status: 'pending'}" action="{{ route('idea.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6 relative color-gray-600">
                        <x-form.field type="text" label="Title" name="title" placeholder="Enter an title for your idea" class="w-full " autofocus required />

                        <div>
                            <label for="status" class="font-semibold">Status</label>

                            <div class="flex gap-x-3 ">
                                @foreach (App\IdeaStatus::cases() as $status)
                                    <button class="bg-green-500 p-2 mt-1 flex-1 text-black font-semibold rounded-[10px] cursor-pointer"
                                    type="button"
                                    @click="status = @js($status->value)"
                                    :class="status === @js( $status->value ) ? '' : 'text-white font-normal bg-transparent hover:bg-gray-500/20' ">
                                    {{ $status->label() }}</button>
                                @endforeach
                                <input type="text" name="status" :value="status" hidden> </input>
                            </div>
                        </div>
                        <x-form.field type="textarea" name="description" class="" placeholder="Describe your idea..." />

                       <x-form.error name="status"/>

                        <div class="text-[16px] flex justify-end gap-x-3 end">
                            <button type="button" @click="show = false " class="bg-red-800 rounded-lg py-2 px-3 cursor-pointer">Cancel</button>
                            <button type="submit" class="cursor-pointer rounded-lg px-2 hover:bg-gray-500/20">Create</button>
                        </div>
                    </div>
                </form>
            </x-modal>
        </div>
    </main>


</x-layout>
