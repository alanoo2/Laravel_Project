<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Idea</title>
</head>
<body class="bg-background text-foreground ">

    <x-layout.nav>

    </x-layout.nav>
    <main class="max-w-7x1 mx-auto px-6 bg-form1">
        {{$slot}}
    </main>
</body>
</html>
