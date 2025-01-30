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
                            <div class="relative flex items-center justify-center w-16">
                                <h1 class="font-sans font-bold text-base z-20">{{ $item->idAyat }}</h1>
                                <img class="absolute size-16" src="{{asset('icon/belah-ketupat.svg')}}">
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
                        <button><img src="{{asset('icon/mark-icon-nofill.svg')}}"></button>
                        <button><img src="{{asset('icon/pen-note-icon.svg')}}"></button>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const likeButtons = document.querySelectorAll('.like-button');
            const userLoggedIn = @json(Auth::check());

            if (!userLoggedIn) {
                likeButtons.forEach(button => {
                    button.addEventListener('click', () => window.location.href = "{{ route('login') }}");
                });
                return;
            }

            // Ambil daftar ayat yang sudah di-like oleh user
            const response = await fetch("{{ route('like.list') }}");
            const likedAyat = await response.json();

            // Tandai tombol like yang sudah di-like
            likedAyat.forEach(item => {
                const button = document.querySelector(`.like-button[data-id="${item.idAyat}"][data-surat="${item.idSurat}"]`);
                if (button) {
                    button.querySelector('img').src = "{{ asset('icon/like_fill.svg') }}";
                    button.setAttribute('data-liked', 'true');
                }
            });

            // Handle klik tombol like/unlike
            likeButtons.forEach(button => {
                button.addEventListener('click', async function () {
                    const ayatId = this.getAttribute('data-id');
                    const suratId = this.getAttribute('data-surat');
                    const isLiked = this.getAttribute('data-liked') === 'true';

                    const likeIcon = this.querySelector('img');
                    try {
                        const response = await fetch("{{ route('like.toggle') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                ayat_id: ayatId,
                                surat_id: suratId,
                                action: isLiked ? 'unlike' : 'like'
                            })
                        });

                        const data = await response.json();

                        if (response.ok) {
                            if (data.liked) {
                                likeIcon.src = "{{ asset('icon/like_fill.svg') }}";
                                this.setAttribute('data-liked', 'true');
                            } else {
                                likeIcon.src = "{{ asset('icon/like_nofill.svg') }}";
                                this.setAttribute('data-liked', 'false');
                            }
                        } else {
                            alert(data.message || 'Terjadi kesalahan.');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memproses permintaan.');
                    }
                });
            });
        });
    </script>
</body>

</html>
