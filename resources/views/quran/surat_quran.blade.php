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
        <div class="flex z-10 justify-between items-center h-11 bg-slate-300">
            <nav class="ml-10">
                <ul class="flex gap-8">
                    <li>
                        <form action="{{route('surat_quran.page', 1)}}" method="GET" id="suratForm">
                            <select class="w-24 h-8" id="suratSelector"
                                onchange="document.getElementById('suratForm').action='/quran/' + this.value; document.getElementById('suratForm').submit();">
                                @foreach ($surats as $item)
                                    <option value="{{ $item->idSurat }}" {{ $item->idSurat == $idSurat ? 'selected' : '' }}>
                                        {{ $item->namaSurat }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </li>
                    <li>
                        <select class="w-24 h-8">
                            @foreach ($ayat as $item)
                                <option value="{{ $item->idAyat }}">{{ $item->idAyat }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li><select class="w-24 h-8"></select></li>
                </ul>
            </nav>
            <h1 class="mr-14">Juz 3 - Al-Baqarah - 270</h1>
        </div>
    </header>
    <main>
        <div class="bg-slate-500 flex justify-center w-fit mx-auto gap-4 mt-28">
            <button class="w-32 bg-slate-100">Al-Qur'an</button>
            <button class="w-32 bg-slate-100">Tafsir Summary</button>
            <button class="w-32 bg-slate-100">Aplikasi Dalam Kehidupan</button>
            <button class="w-32 bg-slate-100">Note</button>
            <button class="w-32 bg-slate-100">Favorite</button>
        </div>
        <div class="flex flex-col items-center mt-7 gap-5">
            @foreach ($ayat as $item)
                <div class="bg-slate-300 w-[55rem] h-fit">
                    <div class="mt-6 mr-2">
                        <div>
                            <h1 class="text-right font-arabic text-3xl">{{ $item->teksArab }}</h1>
                        </div>
                        <div>
                            <p class="text-lg font-sans text-right mt-6">{{ $item->abjadArab }}</p>
                            <p class="ml-2 text-lg font-sans mt-4">{{ $item->artiIndonesia }}</p>
                        </div>
                    </div>
                    <div class="flex space-x-2 py-5">
                        <button><img src="{{asset('icon/play-icon.svg')}}"></button>
                        <button class="like-btn" data-id="{{$item->idAyat}}">
                            <img src="{{asset('icon/like' . (auth()->check() && $item->liked ? '_fill' : '_nofill') . '.svg')}}" class="like-icon">
                        </button>
                        <button><img src="{{asset('icon/mark-icon.svg')}}"></button>
                        <button><img src="{{asset('icon/pen-note-icon.svg')}}"></button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>

</html>