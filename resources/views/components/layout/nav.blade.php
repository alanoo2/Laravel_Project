<nav class="border-b border-border px-6 ">
    <div class="max-w-7x1 mx-auto h-16 flex items-center justify-between" >
        <div>
            <a href="/">Idea</a>
        </div>
        @guest
            <div class="flex gap-x-4 shadow">
            <a href="/login">Sign In</a>
            <p>|</p>
            <a href="/register" class="btn">Register</a>
        </div>
        @endguest
        @auth

            <form action="/logout" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

    </div>
</nav>
