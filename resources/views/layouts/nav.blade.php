<div class="flex relative items-center justify-between h-11 pl-16">
    <nav class="flex gap-8 h-full">
        <div class="flex items-center h-full logo"><a class="flex items-center h-full" href="#">Logo</a></div>
        <ul class="flex items-center h-full gap-8">
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
    <div class="flex gap-5 mr-14 h-8">
        @guest
            <a href="{{ route('login') }}" class="w-[64px] bg-slate-200 text-center py-1 rounded">Login</a>
            <a href="{{ route('register') }}" class="w-[64px] bg-slate-200 text-center py-1 rounded">Sign Up</a>
        @else
            <div class="relative" x-data="{ open: false }">
                <!-- Trigger -->
                <button @click="open = !open" class="w-fit p-3 text-center py-1 rounded-2xl border-black border-2">
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

<div class="hidden absolute z-40 dropdown w-screen h-96 bg-[#D3F1DF] space-x-12">
    <div class="w-64 h-[21rem] mt-7 space-y-5">
        <div>
            <h1 class="font-roboto text-xs font-semibold">Jelajahi Fitur Kami</h1>
        </div>
        <ul class="space-y-5">
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Jadwalkan Suratmu!</h1>
                        <h4 class="font-roboto text-xs font-normal">Latih variasi bacaan di setiap sholatmu</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Panduan Sholat</h1>
                        <h4 class="font-roboto text-xs font-normal">Panduan sholat lengkap dan interaktif untuk
                            membantu Anda memahami dan melaksanakan ibadah dengan benar</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Kumpulan Doa</h1>
                        <h4 class="font-roboto text-xs font-normal">Kumpulan doa-doa pilihan untuk mendekatkan
                            diri
                            kepada Allah dalam setiap kesempatan</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Sunnah Nabi</h1>
                        <h4 class="font-roboto text-xs font-normal">Panduan lengkap tentang sunnah Nabi untuk
                            menambah keberkahan dan keistiqomahan dalam hidup</h4>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="w-64 h-[21rem] mt-7 space-y-5">
        <div>
            <h1 class="font-roboto text-xs font-semibold">Fitur Tambahan</h1>
        </div>
        <ul class="space-y-5">
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Fitrah Article</h1>
                        <h4 class="font-roboto text-xs font-normal">Artikel inspiratif dan berita keislaman
                            untuk
                            menambah wawasan</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Catatanmu</h1>
                        <h4 class="font-roboto text-xs font-normal">Tempat untuk mencatat hal-hal penting dan
                            refleksi pribadi</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Jadwal Sholat</h1>
                        <h4 class="font-roboto text-xs font-normal">Menyediakan waktu sholat tepat sesuai lokasi
                            Anda</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Kalender</h1>
                        <h4 class="font-roboto text-xs font-normal">Memudahkan Anda dalam merencanakan aktivitas
                            dan
                            ibadah sepanjang bulan</h4>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="w-64 h-[21rem] mt-7 space-y-5">
        <div>
            <h1 class="font-roboto text-xs font-semibold">Artikel Terakhir</h1>
        </div>
        <ul class="space-y-5">
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Blog Insights</h1>
                        <h4 class="font-roboto text-xs font-normal">Baca wawasan dan artikel terbaru kami</h4>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-start gap-3">
                    <img src="{{ asset('icon/fitur.svg') }}" class="inline-block">
                    <div>
                        <h1 class="font-roboto text-sm font-semibold">Join Komunitas Kami</h1>
                        <h4 class="font-roboto text-xs font-normal">Jadilah bagian dari komunitas kami hari ini
                        </h4>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
