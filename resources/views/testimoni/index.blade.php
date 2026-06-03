<style>
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-marquee {
        display: flex;
        animation: marquee 20s linear infinite;
    }

    /* Jeda sedikit saat hover */
    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>

{{-- section testimoni --}}
<div class="w-full bg-[#EEFBF5] pb-10 md:pb-16 overflow-hidden">

    <section class="mx-auto max-w-screen-xl p-4 md:p-5 mb-10">
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                Apa Kata Mereka tentang BHOS Teknologi
            </h2>
            <p class="text-sm sm:text-base font-medium text-[#444545]">
                Langkah Nyata Menuju Pertanian Lebih Produktif
            </p>
        </div>
    </section>

    {{-- Container Animasi --}}
    <div class="flex overflow-hidden relative">
        <div class="flex animate-marquee gap-6 px-4">
            {{-- Kita looping card-nya --}}
            @for ($i = 0; $i < 6; $i++)
                <div class="flex-none w-[300px] sm:w-[400px] bg-white border border-gray-200 rounded-3xl p-6 shadow-sm">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="{{ asset('assets_img/factory.png') }}" alt="Avatar" class="w-14 h-14 rounded-full">
                        <div>
                            <h4 class="font-bold text-[#047857]">Bambang Pratama Putra</h4>
                            <p class="text-sm text-gray-500">Pekanbaru</p>
                        </div>
                    </div>
                    <p class="text-sm sm:text-base text-[#444545] leading-relaxed">
                        Sejak menggunakan pupuk dari BHOS Teknologi, hasil panen kami meningkat dan kualitas tanah tetap
                        terjaga. Tanaman tumbuh lebih sehat dan merata.
                    </p>
                </div>
            @endfor
        </div>
    </div>
</div>
