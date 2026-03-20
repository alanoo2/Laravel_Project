<x-layout>

        <x-form title="Log in" description="Glad to see you back!">
            <div class="max-w-sm rounded-2xl overflow-hidden shadow-lg bg-black border border-gray-700 p-5">
                <form action="/login" method="POST" class="mt-5">
                    @csrf

                    <x-form.field name="email" label="Email" type="email"></x-form.field>
                    <x-form.field name="password" label="Password" type="password"></x-form.field>

                    <input class="mt-5 bg-pink-700 rounded px-3 py-1 w-full" type="submit" value="Sign in">
                </form>
            </div>
        </x-form>

</x-layout>
