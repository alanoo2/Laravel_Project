<x-layout >

    <div class="flex min-h-[calc(100dvh-4rem)] items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center">
                <h1 class="text-[32px] font-semibold">Register an Account</h1>
                <p class="text-[12px] text-gray-600">You'd be able to make an account here...</p>
            </div>

            <form action="/register" method="POST" class="mt-10">
                @csrf

                <div class="space-y-2 relative justify-center px-11" >
                    <label for="name" class="mx-2 absolute right-15 top-3">Name</label><br>
                    <input class="bg-black-900 border-2 border-gray-900 focus:border-pink-600 rounded w-90" type="text" name="name" id="name">
                    <label for="email" class="mx-2 absolute right-15 top-18">Email</label><br><br>
                    <input class="bg-black-900 border-2 border-gray-900 focus:border-pink-600 rounded w-90" type="email" name="email" id="email">
                    <label for="password" class="mx-2 absolute right-15 top-33">Password</label><br><br>
                    <input class="bg-black-900 border-2 border-gray-900 focus:border-pink-600 rounded w-90" type="password" name="password" id="password">
                    <input class="mt-5 bg-pink-700 rounded px-3 py-1 w-full" type="submit" value="Create Account">
                </div>
            </form>
        </div>
    </div>

</x-layout>
