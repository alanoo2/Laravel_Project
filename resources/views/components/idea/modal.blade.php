@props(['idea'])

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
