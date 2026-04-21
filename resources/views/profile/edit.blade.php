<x-layout class="bg-form1">

        <x-form title="Edit your profile" description="Need to make a tweak?">
            <div class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-black border border-gray-700 p-5">
                <form action="/profile/edit" method="POST" class="mt-5">
                    @csrf
                    @method('PATCH')

                    <x-form.field name="name" label="Name" type="text" :value="$user->name"></x-form.field>
                    <x-form.field name="email" label="Email" type="email" :value="$user->email"></x-form.field>
                    <x-form.field name="password" label="New Password" type="password"></x-form.field>

                    <input class="mt-5 bg-pink-700 rounded px-3 py-1 w-full font-semibold" type="submit" value="Update Account">
                </form>
            </div>
        </x-form>

</x-layout>
