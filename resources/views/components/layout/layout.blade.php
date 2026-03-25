<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Idea</title>
    @vite('resources/js/app.js')
</head>
<body class="bg-background text-foreground">

    <x-layout.nav>

    </x-layout.nav>
    <main {{ $attributes ([ 'class' => "max-w-7x1 mx-auto px-6"]) }}>
        {{$slot}}
    </main>

    <div class="bg-green-200 text-black px-4 py-1 absolute bottom-4 right-3 rounded-lg"
        x-data="{ show : true }"
        x-transition.opacity.duration.1000ms
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
    >
        Hola!

    </div>

</body>
</html>
