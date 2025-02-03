<div class="flex items-center justify-between px-16 h-14 bg-[#3E5879]">
    <div>
        <a href="{{ route('homepage') }}">
            <img class="w-20" src="{{ asset('images/fitrahmindlogo.svg') }}">
        </a>
    </div>
    <nav class="flex items-center h-full">
        <ul class="flex items-center gap-8 h-full">
            <x-nav-item href="{{ route('homepage') }}">Home Page</x-nav-item>
            <x-nav-item href="{{ route('quran.page') }}">Al-Qur'an</x-nav-item>
            <x-nav-item href="#">Trending Fitrah</x-nav-item>
            <x-nav-item href="#">Upcoming Event</x-nav-item>
            <x-nav-item href="#">Fitrah Article</x-nav-item>
            <x-nav-item liClass="group" href="#">
                Lainnya
                <img src="{{ asset('icon/arrow-down-icon.svg') }}" class="ml-1 inline-block">
            </x-nav-item>
        </ul>
    </nav>
    <div class="flex gap-5">
        @guest
            <a href="{{ route('login') }}" class="px-5 py-1 border-white text-white border-2 rounded-2xl">Login</a>
            <a href="{{ route('register') }}" class="px-5 py-1 border-white text-white border-2 rounded-2xl">Sign Up</a>
        @else
            <div class="relative" x-data="{ open: false }">
                <!-- Trigger -->
                <button @click="open = !open" class="px-3 py-1 border-white text-white border-2 rounded-2xl">
                    {{ Auth::user()->name }}
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.outside="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded shadow-md z-10" x-transition>
                    <a href="#"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @endguest
    </div>
</div>

<div class="absolute hidden z-40 dropdown w-screen h-96 bg-[#D8C4B6] space-x-12 pt-7">
    <div class="w-64 space-y-5">
        <div>
            <h1 class="font-roboto text-xs font-semibold">Jelajahi Fitur Kami</h1>
        </div>
        <ul class="space-y-5">
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Jadwalkan Suratmu!</h1>
                        <h1 class="font-roboto text-xs font-normal">Latih variasi bacaan di setiap sholatmu</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Panduan Sholat</h1>
                        <h1 class="font-roboto text-xs font-normal">Panduan sholat lengkap dan interaktif untuk
                            membantu Anda memahami dan melaksanakan ibadah dengan benar</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Kumpulan Doa</h1>
                        <h1 class="font-roboto text-xs font-normal">Kumpulan doa-doa pilihan untuk mendekatkan
                            diri
                            kepada Allah dalam setiap kesempatan</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Sunnah Nabi</h1>
                        <h1 class="font-roboto text-xs font-normal">Panduan lengkap tentang sunnah Nabi untuk
                            menambah keberkahan dan keistiqomahan dalam hidup</h1>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="w-64 space-y-5">
        <div>
            <h1 class="font-roboto text-xs font-semibold">Fitur Tambahan</h1>
        </div>
        <ul class="space-y-5">
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Fitrah Article</h1>
                        <h1 class="font-roboto text-xs font-normal">Artikel inspiratif dan berita keislaman
                            untuk
                            menambah wawasan</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Catatanmu</h1>
                        <h1 class="font-roboto text-xs font-normal">Tempat untuk mencatat hal-hal penting dan
                            refleksi pribadi</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Jadwal Sholat</h1>
                        <h1 class="font-roboto text-xs font-normal">Menyediakan waktu sholat tepat sesuai lokasi
                            Anda</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Kalender</h1>
                        <h1 class="font-roboto text-xs font-normal">Memudahkan Anda dalam merencanakan aktivitas
                            dan
                            ibadah sepanjang bulan</h1>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="w-64 space-y-5">
        <div>
            <h1 class="font-roboto text-xs font-semibold">Artikel Terakhir</h1>
        </div>
        <ul class="space-y-5">
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Blog Insights</h1>
                        <h1 class="font-roboto text-xs font-normal">Baca wawasan dan artikel terbaru kami</h1>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Join Komunitas Kami</h1>
                        <h1 class="font-roboto text-xs font-normal">Jadilah bagian dari komunitas kami hari ini
                        </h1>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
