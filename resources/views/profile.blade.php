<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Perusahaan - PT Solusi Net Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800">

    <!-- Main Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('image/solusinet.png') }}" alt="Logo PT Solusi Net Nusantara" class="h-10 w-10 rounded-lg object-contain">
                <div>
                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-bold block">Internet Service Provider</span>
                    <span class="font-bold text-slate-900 text-sm md:text-base tracking-tight">PT SOLUSI NET NUSANTARA</span>
                </div>
            </div>

            <!-- Menu Navigasi Utama -->
            <nav class="hidden lg:flex items-center space-x-8 font-medium text-sm">
                <a href="{{ url('/') }}" class="text-slate-600 hover:text-blue-600 transition">Beranda</a>
                <a href="{{ url('/profile') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">Profil Perusahaan</a>
                <a href="{{ url('/product') }}" class="text-slate-600 hover:text-blue-600 transition">Produk & Layanan</a>
                <a href="{{ url('/gallery') }}" class="text-slate-600 hover:text-blue-600 transition">Galeri</a>
                <a href="{{ url('/contact') }}" class="text-slate-600 hover:text-blue-600 transition">Kontak</a>
            </nav>

            @include('partials.navbar-actions')
        </div>
    </header>

    <!-- Page Header -->
    <section class="relative bg-slate-900 text-white py-16 px-4 overflow-hidden" style="background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.94)), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80') center/cover;">
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="text-blue-400 font-semibold text-xs uppercase tracking-widest bg-blue-500/10 px-3.5 py-1.5 rounded-full border border-blue-500/20 inline-block mb-4">Tentang Kami</span>
            <h1 class="text-3xl md:text-4xl font-extrabold mb-3 tracking-tight">Profil Perusahaan</h1>
            <p class="text-slate-300 max-w-xl mx-auto text-sm md:text-base leading-relaxed">
                {{ $profile->hero_description }}
            </p>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider block mb-2">Sejarah & Latar Belakang</span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-6 leading-snug">{{ $profile->history_title }}</h2>
                <p class="text-slate-600 text-sm md:text-base leading-relaxed mb-4">
                    {{ $profile->history_paragraph_one }}
                </p>
                <p class="text-slate-600 text-sm md:text-base leading-relaxed mb-6">
                    {{ $profile->history_paragraph_two }}
                </p>
                <div class="grid grid-cols-2 gap-4 border-t border-slate-100 pt-6">
                    <div>
                        <h4 class="text-2xl font-extrabold text-blue-600">{{ $profile->client_count }}</h4>
                        <p class="text-slate-500 text-xs mt-1">Mitra & Klien Aktif</p>
                    </div>
                    <div>
                        <h4 class="text-2xl font-extrabold text-blue-600">{{ $profile->uptime }}</h4>
                        <p class="text-slate-500 text-xs mt-1">Kualitas Uptime Jaringan</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Tim PT Solusi Net Nusantara" class="rounded-xl shadow-md w-full object-cover h-[400px]">
                <div class="absolute -bottom-6 -left-6 bg-slate-900 text-white p-6 rounded-xl shadow-lg hidden sm:block max-w-xs border border-slate-800">
                    <p class="text-xs text-blue-400 font-semibold uppercase tracking-wider mb-1">Prinsip Kami</p>
                    <p class="text-sm font-medium leading-relaxed">{{ $profile->principle }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-16 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider block mb-2">Landasan Kerja</span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Visi & Misi Perusahaan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl border border-slate-100 shadow-sm">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-xl mb-6">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Visi</h3>
                    <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                        {{ $profile->vision }}
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl border border-slate-100 shadow-sm">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-xl mb-6">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Misi</h3>
                    <ul class="space-y-3 text-slate-600 text-sm md:text-base">
                        <li class="flex items-start">
                            <i class="fa-solid fa-check text-blue-500 mt-1 mr-3"></i>
                            <span>{{ $profile->mission_one }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check text-blue-500 mt-1 mr-3"></i>
                            <span>{{ $profile->mission_two }}</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fa-solid fa-check text-blue-500 mt-1 mr-3"></i>
                            <span>{{ $profile->mission_three }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12 px-4 text-sm">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="md:col-span-1">
                <h3 class="text-white font-bold text-base mb-3">PT Solusi Net Nusantara</h3>
                <p class="text-slate-400 text-xs leading-relaxed">Penyedia layanan internet dan solusi jaringan handal yang berfokus pada kualitas dan kepuasan pelanggan.</p>
            </div>
            <div>
                <h3 class="text-white font-bold text-sm mb-3">Menu Cepat</h3>
                <ul class="space-y-2 text-xs">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ url('/profile') }}" class="hover:text-white transition">Profil Perusahaan</a></li>
                    <li><a href="{{ url('/product') }}" class="hover:text-white transition">Produk & Layanan</a></li>
                    <li><a href="{{ url('/gallery') }}" class="hover:text-white transition">Galeri Kegiatan</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-white transition">Kontak Kami</a></li>
                </ul>
            </div>
            <div class="md:col-span-2">
                <div class="grid grid-cols-1 gap-5 text-xs xl:grid-cols-[max-content_minmax(0,1fr)] xl:items-start">
                    <div>
                        <h3 class="text-white font-bold text-sm mb-3">Pusat Bantuan & Lokasi</h3>
                        <div class="space-y-2 text-slate-400">
                            <a href="https://maps.app.goo.gl/bZ96zGRmsfGa7w6h8" class="flex items-start"><i class="fa-solid fa-location-dot mt-0.5 mr-2 text-blue-500"></i> SMK AK Nusa Bangsa, Kota Bogor</a>
                            <a href="https://www.instagram.com/smkaknusabangsa?utm_source=ig_web_button_share_sheet&rpxt=ZDNlZDc0MzIxNw==" class="flex items-start"><i class="fa-solid fa-camera mt-0.5 mr-2 text-blue-500"></i>smkaknusabangsa</a>
                            <a href="https://wa.me/6281586844580" class="flex items-center"><i class="fa-solid fa-phone mr-2 text-blue-500"></i> +62 815-8684-4580</a>
                            <a href="mailto:amandaaurora1555@gmail.com" class="flex items-center"><i class="fa-solid fa-envelope mr-2 text-blue-500"></i> amandaaurora1555@gmail.com</a>
                        </div>
                    </div>
                    @include('partials.footer-location')
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 mt-10 pt-6 border-t border-slate-800 text-center text-xs text-slate-500">
            &copy; 2026 PT Solusi Net Nusantara. All Rights Reserved. Ujian Kompetensi Keahlian (UJIKOM) LSP.
        </div>
    </footer>

</body>
</html>