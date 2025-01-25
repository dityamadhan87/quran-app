<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="fixed top-0 w-screen">
        @include('layouts.nav')
    </header>
    <main>
        <div class="flex flex-wrap gap-x-8 gap-y-4 bg-slate-500 mt-20 w-[66rem] mx-auto">
            @foreach ($surats as $item)
                <a href="{{route('surat_quran.page', ['idSurat' => $item->idSurat])}}" class="bg-slate-400 w-60 h-14 border-2 border-black">
                    <div>
                        <h1>{{ $item->namaSurat }}</h1>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
</body>

</html>