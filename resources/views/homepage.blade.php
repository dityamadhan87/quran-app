<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="fixed top-0 w-screen">
        @include('layouts.nav')
    </header>
    <main>
        <div class="flex flex-col justify-center ml-10 space-y-7 h-[100vh]">
            <div class="space-y-7">
                <h1 class="w-[42rem] font-roboto text-6xl font-bold">Menemukan Makna Hidup Melalui Cahaya Ilmu dan
                    Kekhusyukan Ibadah</h1>
                <h1 class="w-[40rem] font-roboto text-lg font-normal">Fitrah Mind hadir untuk membangun hati, pikiran,
                    dan karakter Islami melalui kemudahan teknologi.</h1>
            </div>
            <div>
                <button class="bg-black">
                    <h1 class="text-white">Baca Langsung</h1>
                </button>
            </div>
        </div>
        <div class="space-y-16 ml-10">
            <div class="flex">
                <div class="space-y-3">
                    <div>
                        <h1 class="font-roboto text-base font-semibold">Bersama Fitrah Mind</h1>
                    </div>
                    <h1 class="w-[42rem] font-roboto text-5xl font-bold">Jelajahi Fitur-Fitur Lengkap Kami untuk Anda
                    </h1>
                </div>
                <h1 class="w-[47rem] font-roboto text-lg font-normal">Temukan panduan spiritual yang menyeluruh melalui
                    website kami. Mulai dari Al-Qur'an hingga doa
                    harian, kami menyediakan berbagai alat penting untuk mendukung perjalanan iman Anda. Fitur-fitur
                    kami dirancang khusus untuk memperkuat keimanan Anda dan membangun keterlibatan dalam komunitas</h1>
            </div>
            <div>
                <div class="flex space-x-52">
                    <div class="space-y-5">
                        <img src="{{ asset('icon/fitur.svg') }}">
                        <h1 class="w-[21rem] font-roboto text-3xl font-bold">Akses Al-Qur'an Kapan Saja, Di Mana Saja
                        </h1>
                        <h1 class="w-[21rem] font-roboto text-base font-normal">Rasakan kemudahan mendalami ajaran
                            Al-Qur'an dengan akses yang selalu ada di genggaman Anda</h1>
                    </div>
                    <div class="space-y-5">
                        <img src="{{ asset('icon/fitur.svg') }}">
                        <h1 class="w-[21rem] font-roboto text-3xl font-bold">Jadikan Sholatmu Lebih Berwarna dengan
                            Pilih Surat!</h1>
                        <h1 class="w-[21rem] font-roboto text-base font-normal">Latih variasi bacaan dan persiapkan diri
                            sebagai imam dengan fitur ini</h1>
                    </div>
                    <div class="space-y-5">
                        <img src="{{ asset('icon/fitur.svg') }}">
                        <h1 class="w-[21rem] font-roboto text-3xl font-bold">Temukan Kumpulan Doa Penuh Makna</h1>
                        <h1 class="w-[21rem] font-roboto text-base font-normal">Akses kumpulan doa terpilih untuk
                            memperkaya ibadah harian Anda</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>