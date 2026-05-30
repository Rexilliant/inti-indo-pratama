{{-- footer --}}
<footer class="w-full bg-gradient-to-bl from-[#059669] to-[#022C22] text-white pt-16 pb-8">
    <div class="mx-auto max-w-screen-xl p-4 md:p-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

            {{-- Kolom 1: Logo/Brand --}}
            <div class="flex flex-col gap-4">
                <h3 class="text-2xl font-bold">BHOS Teknologi</h3>
                <p class="text-sm text-green-100 leading-relaxed">
                    Jl. Pembangunan, Kec Sunggal, Kab Deli Serdang, Sumatera Utara
                </p>
                <p  class="text-sm text-green-100 leading-relaxed">
                    Pos: 20351
                </p>
            </div>

            {{-- Kolom 2: Produk --}}
            <div class="flex flex-col gap-4">
                <h4 class="font-bold text-lg">Produk</h4>
                <ul class="text-sm text-green-100 space-y-2">
                    <li><a href="#" class="hover:text-white transition">BHOS Teknologi</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Informasi --}}
            <div class="flex flex-col gap-4">
                <h4 class="font-bold text-lg">Informasi</h4>
                <ul class="text-sm text-green-100 space-y-2">
                    <li><a href="#" class="hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white transition">Berita & Update</a></li>
                    <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                </ul>
            </div>

            {{-- Kolom 4: Kontak --}}
            <div class="flex flex-col gap-4">
                <h4 class="font-bold text-lg">Kontak</h4>
                <ul class="text-sm text-green-100 space-y-2">
                    <li>(62+)822xxxx</li>
                    <li>info@bhosteknologi.com</li>
                </ul>
            </div>
        </div>

        {{-- Garis Pembatas --}}
        <div class="border-t border-white/20 pt-8 mt-8 text-center text-sm text-green-200">
            &copy; {{ date('Y') }} BHOS Teknologi. All rights reserved.
        </div>
    </div>
</footer>
