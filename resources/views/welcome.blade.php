<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL - Shortener</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 font-mono">

    <div class="flex flex-col h-screen justify-center items-center">
        <h1 class="text-5xl text-white mb-4">
            URL - Shortener
        </h1>
        <form action="{{ route('shorten') }}" method="post" class="space-y-5">
            @csrf
            @error('url')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
            <input type="text" name="url" id="url" class="p-3 w-80 rounded-lg"
                placeholder="Enter your URL">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Shorten</button>
        </form>

        @if (session('short_url'))
            <div class="text-white mt-4">
                Your shortened URL is: <a href="{{ session('short_url') }}" class="underline"
                    target="_blank">{{ config('app.url') . '/'. session('short_url') }}</a>
            </div>
        @endif

    </div>

    <footer class="absolute bottom-0 w-full bg-gray-900 text-white text-center py-4">
        <!-- Conteúdo do rodapé aqui -->
       Desenvolved by <a href="https://github.com/MarcelSecco1" class="underline">Marcel Secco</a>
    </footer>
</body>

</html>
