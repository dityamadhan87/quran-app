<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="fixed top-0 w-screen">
        @include('layouts.nav')
        <div class="flex z-10 justify-between items-center h-14 bg-slate-300 px-10">
            <nav>
                <ul class="flex gap-8">
                    <li>
                        <form action="{{route('surat_quran.page', 1)}}" method="GET" id="suratForm">
                            <select class="flex items-center justify-center w-48 h-10" id="suratSelector"
                                onchange="document.getElementById('suratForm').action='/quran/' + this.value; document.getElementById('suratForm').submit();">
                                @foreach ($surats as $item)
                                    <option value="{{ $item->idSurat }}" {{ $item->idSurat == $idSurat ? 'selected' : '' }}>
                                        {{strval($item->idSurat) . " " . $item->namaSurat }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </li>
                    <li>
                        <select class="flex items-center justify-center w-48 h-10">
                            @foreach ($ayat as $item)
                                <option value="{{ $item->idAyat }}">{{ $item->idAyat }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li><select class="flex items-center justify-center w-48 h-10"></select></li>
                </ul>
            </nav>
            <h1>Juz 3 - Al-Baqarah - 270</h1>
        </div>
    </header>
    <main class="pt-36">
        @include('layouts.nav-quran')
        <div class="flex flex-col items-center mt-7 gap-5">
            @foreach ($ayat as $item)
                <div class="bg-[#F5EFE7] w-[55rem] h-fit">
                    <div class="mt-6 mr-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center justify-center w-16">
                                <img class="size-16" src="{{asset('icon/belah-ketupat.svg')}}">
                                <h1 class="font-sans font-bold text-base">{{ $item->idAyat }}</h1>
                            </div>
                            <h1 class="font-arabic text-3xl">{{ $item->teksArab }}</h1>
                        </div>
                        <div>
                            <p class="text-lg font-sans text-right mt-6">{{ $item->abjadArab }}</p>
                            <p class="ml-2 text-lg font-sans mt-4">{{ $item->artiIndonesia }}</p>
                        </div>
                    </div>
                    <div class="flex gap-3 py-5">
                        <button><img src="{{asset('icon/play-icon.svg')}}"></button>
                        <button class="like-button" data-id="{{ $item->idAyat }}" data-surat="{{ $item->idSurat }}"
                            data-liked="false">
                            <img src="{{ asset('icon/like_nofill.svg') }}" alt="Like">
                        </button>
                        <button class="mark-button" data-id="{{ $item->idAyat }}" data-surat="{{ $item->idSurat }}">
                            <img src="{{asset('icon/mark-icon.svg')}}">
                        </button>
                        <button><img src="{{asset('icon/pen-note-icon.svg')}}"></button>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="overlay"
            class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden justify-center items-center">
            <div class="bg-white p-5 rounded-lg w-96 shadow-lg">
                <h2 class="text-xl font-bold">Bookmark QS Al-Baqarah Ayat 28</h2>

                <form id="bookmarkForm">
                    <input type="text" name="nama_koleksi" class="w-full border border-gray-300 rounded mt-2" placeholder="Nama Koleksi" required>
                    <button type="submit" class="w-full bg-blue-500 text-white rounded mt-2 h-9">Simpan</button>
                    <input type="search" name="cariTag" class="w-full border border-gray-300 rounded mt-2" placeholder="Cari Tag">
                </form>

                <h2 class="text-lg font-bold">Koleksi</h2>

                <form id="bookmark-ayat-form">
                    <input type="hidden" name="idAyat" id="idAyat">
                    <input type="hidden" name="idSurat" id="idSurat">

                    <div id="list-bookmark" class="flex flex-col h-24 overflow-y-auto">
                        @csrf
                    </div>
                    <div class="mt-4 flex justify-end gap-3">
                        <button type="button" id="closeOverlay" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Tandai</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        window.userLoggedIn = @json(Auth::check());
    </script>
</body>

</html>
