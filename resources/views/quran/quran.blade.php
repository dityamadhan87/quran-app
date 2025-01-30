<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="fixed top-0 w-screen z-10">
        @include('layouts.nav')
    </header>
    <main class="pt-20 bg-[white]">
        <div class="flex flex-col gap-4 bg-[#D8C4B6] w-[76rem] h-[32rem] mx-auto py-6 px-8">
            <div class="font-roboto text-4xl font-semibold text-black">
                Deepen Your Qur'anic Reflection
            </div>
            <div class="flex justify-between px-3 py-1 border-black border-2 w-full h-20">
                <div class="flex items-start gap-2">
                    <img class="w-7" src="{{ asset('icon/like_fill.svg') }}">
                    <h1 class="font-roboto text-lg font-medium text-black">Ayat Favoritmu</h1>
                    {{-- @foreach ($favoriteAyats as $test)
                        <h1 class="font-roboto text-lg font-medium text-black">{{ $test->idAyat }}</h1>
                    @endforeach --}}
                </div>
                <div>
                    <img src="{{ asset('icon/arrow-down-icon.svg') }}">
                </div>
            </div>
            {{-- <div class="border-white border-2 w-full h-20"></div>
            <div class="border-white border-2 w-full h-20"></div>
            <div class="border-white border-2 w-full h-20"></div> --}}
        </div>
        <div class="flex flex-wrap gap-x-8 gap-y-10 mt-10 w-[76rem] mx-auto">
            @foreach ($surats as $item)
                <a href="{{route('surat_quran.page', ['idSurat' => $item->idSurat])}}" class="relative flex z-0 items-center bg-[#F5EFE7] drop-shadow-md rounded-lg w-96 h-20 pl-2 pr-3">
                    <div class="relative flex items-center justify-center z-10 w-16">
                        <h1 class="font-sans font-bold text-base z-20">{{ $item->idSurat }}</h1>
                        <img class="absolute size-16" src="{{asset('icon/belah-ketupat.svg')}}">
                    </div>
                    <div class="ml-2">
                        <h1 class="font-sans font-bold text-base">{{ $item->namaSurat }}</h1>
                        <h1 class="font-sans text-sm text-slate-700">{{ $item->artiSurat }}</h1>
                    </div>
                    <div class="ml-auto text-center space-y-1">
                        <p class="font-arabic text-xl">{{ $item->namaSuratArab }}</p>
                        <h1 class="font-sans text-sm text-slate-700">{{ $item->jumlahAyat }} Ayat</h1>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
</body>

</html>
