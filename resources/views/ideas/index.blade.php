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
            <x-modal name="create-idea" title="New Idea">

                <form x-data="{status: 'pending', newLink: '', links: [], newStep: '', steps: []}"
                action="{{ route('idea.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
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

                        <div class="flex flex-col space-y-1">
                            <label for="image" class="font-semibold">Featured Image</label>

                            <input type="file" class="bg-green-500 p-2 mt-1 flex-1 text-black font-semibold rounded-[10px] cursor-pointer" name="image" accept="image/*">
                            <x-form.error name="image"/>
                        </div>

                        <div>
                            <fieldset class="space-y-3">
                                <legend class="font-semibold">Actionable steps</legend>

                                <template x-for="(step, index) in steps">
                                    <div class="flex">
                                        <input name="steps[]" x-model="step">

                                        <button
                                            type="button"
                                            aria-label="Remove step"
                                            @click="steps.splice(index, 1)"
                                        >
                                            <x-icons.close-icon  class="text-zinc-400"/>
                                        </button>
                                    </div>
                                </template>

                                <div class="flex gap-x-2 items-center">
                                    <input type="text"
                                    x-model="newStep"
                                    id="new-step"
                                    placeholder="What needs to be done?"
                                    class="flex-1"
                                    spellcheck="false"
                                    >

                                    <button
                                        type="button"
                                        @click="steps.push(newStep); newStep = '';"
                                        :disabled="newStep.trim().length === 0"
                                        aria-label="Add a new Step"
                                        class="text-zinc-400"
                                    >
                                        <x-icons.close-icon class="rotate-45"/>
                                    </button>
                                </div>
                            </fieldset>
                        </div>

                        <div>
                            <fieldset class="space-y-3">
                                <legend class="font-semibold">Links</legend>

                                <template x-for="(link, index) in links">
                                    <div class="flex">
                                        <input name="links[]" x-model="link">

                                        <button
                                            type="button"
                                            aria-label="Remove link"
                                            @click="links.splice(index, 1)"
                                        >
                                            <x-icons.close-icon  class="text-zinc-400"/>
                                        </button>
                                    </div>
                                </template>

                                <div class="flex gap-x-2 items-center">
                                    <input type="url"
                                    x-model="newLink"
                                    id="new-link"
                                    placeholder="http://example.com"
                                    autocomplete="url"
                                    class="flex-1"
                                    spellcheck="false"
                                    >

                                    <button
                                        type="button"
                                        @click="links.push(newLink); newLink = '';"
                                        :disabled="newLink.trim().length === 0"
                                        aria-label="Add a new link"
                                        class="text-zinc-400"
                                    >
                                        <x-icons.close-icon class="rotate-45"/>
                                    </button>
                                </div>
                            </fieldset>
                        </div>

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
