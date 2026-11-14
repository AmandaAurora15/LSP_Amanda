<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - PT Solusi Net Nusantara</title>
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
            <!-- Logo & Nama PT -->
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
                <a href="{{ url('/profile') }}" class="text-slate-600 hover:text-blue-600 transition">Profil Perusahaan</a>
                <a href="{{ url('/product') }}" class="text-slate-600 hover:text-blue-600 transition">Produk & Layanan</a>
                <a href="{{ url('/gallery') }}" class="text-slate-600 hover:text-blue-600 transition">Galeri</a>
                <a href="{{ url('/contact') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">Kontak</a>
            </nav>

            @include('partials.navbar-actions')
        </div>
    </header>

    <!-- Page Header / Hero -->
    <section class="relative bg-slate-900 text-white py-16 px-4 overflow-hidden" style="background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.94)), url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1200&q=80') center/cover;">
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="text-blue-400 font-semibold text-xs uppercase tracking-widest bg-blue-500/10 px-3.5 py-1.5 rounded-full border border-blue-500/20 inline-block mb-4">Layanan Pelanggan</span>
            <h1 class="text-3xl md:text-4xl font-extrabold mb-3 tracking-tight">Hubungi Kami</h1>
            <p class="text-slate-300 max-w-xl mx-auto text-sm md:text-base leading-relaxed">
                Kami siap membantu kebutuhan internet dan solusi jaringan Anda. Silakan sampaikan pesan melalui formulir atau hubungi kontak di bawah ini.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                
                <!-- Info Kontak (1/3 Width) -->
                <div class="space-y-6">
                    <div>
                        <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider block mb-2">Pusat Bantuan</span>
                        <h2 class="text-2xl font-bold text-slate-900 mb-3">Mari Terhubung</h2>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            Tim teknis dan layanan pelanggan kami siap memberikan konsultasi serta informasi paket internet yang sesuai untuk lokasi Anda.
                        </p>
                    </div>

                    <!-- Card Informasi Kontak -->
                    <div class="bg-slate-50 p-6 rounded-xl border border-slate-200 shadow-sm space-y-4 text-sm">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-slate-900 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-slate-900 text-sm">Alamat Kantor</h4>
                                <p class="text-slate-600 text-xs mt-1 leading-relaxed">
                                    SMK AK Nusa Bangsa, Jl. KH. Sholeh Iskandar No. 4, Kec. Tanah Sareal, Kota Bogor, Jawa Barat 16166
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-slate-900 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-slate-900 text-sm">Telepon & WhatsApp</h4>
                                <p class="text-slate-600 text-xs mt-1">+62 812-3456-7890</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-slate-900 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-slate-900 text-sm">Email</h4>
                                <p class="text-slate-600 text-xs mt-1">info@solusinetnusantara.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-slate-900 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-slate-900 text-sm">Jam Operasional</h4>
                                <p class="text-slate-600 text-xs mt-1">Senin - Jumat: 08:00 - 17:00 WIB<br>Support Teknis: 24/7 Nonstop</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Kontak (2/3 Width) -->
                <div class="lg:col-span-2 bg-slate-50 p-8 rounded-xl border border-slate-200 shadow-sm">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">Kirim Pesan atau Konsultasi</h3>
                    @if (session('success'))
                        <div role="status" class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-700">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="nama" class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                                <input id="nama" name="nama" type="text" value="{{ old('nama') }}" required maxlength="255" placeholder="Masukkan nama Anda" class="w-full bg-white border border-slate-300 rounded-lg py-2.5 px-4 text-xs focus:outline-none focus:border-blue-600">
                                @error('nama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-semibold text-slate-700 mb-1">Alamat Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="255" placeholder="nama@email.com" class="w-full bg-white border border-slate-300 rounded-lg py-2.5 px-4 text-xs focus:outline-none focus:border-blue-600">
                                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="telepon" class="block text-xs font-semibold text-slate-700 mb-1">Nomor Telepon / WA</label>
                                <input id="telepon" name="telepon" type="tel" value="{{ old('telepon') }}" maxlength="30" placeholder="08xxxxxxxxxx" class="w-full bg-white border border-slate-300 rounded-lg py-2.5 px-4 text-xs focus:outline-none focus:border-blue-600">
                                @error('telepon') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="kebutuhan" class="block text-xs font-semibold text-slate-700 mb-1">Kebutuhan Layanan</label>
                                <select id="kebutuhan" name="kebutuhan" required class="w-full bg-white border border-slate-300 rounded-lg py-2.5 px-4 text-xs focus:outline-none focus:border-blue-600 text-slate-700">
                                    <option value="">Pilih Jenis Layanan</option>
                                    <option value="Dedicated Internet Access (DIA)" @selected(old('kebutuhan') === 'Dedicated Internet Access (DIA)')>Dedicated Internet Access (DIA)</option>
                                    <option value="Broadband SOHO / Perkantoran" @selected(old('kebutuhan') === 'Broadband SOHO / Perkantoran')>Broadband SOHO / Perkantoran</option>
                                    <option value="Instalasi &amp; Maintenance Jaringan" @selected(old('kebutuhan') === 'Instalasi & Maintenance Jaringan')>Instalasi &amp; Maintenance Jaringan</option>
                                    <option value="Lainnya / Pertanyaan Umum" @selected(old('kebutuhan') === 'Lainnya / Pertanyaan Umum')>Lainnya / Pertanyaan Umum</option>
                                </select>
                                @error('kebutuhan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="subjek" class="block text-xs font-semibold text-slate-700 mb-1">Subjek Pesan</label>
                            <input id="subjek" name="subjek" type="text" value="{{ old('subjek') }}" required maxlength="255" placeholder="Ringkasan kebutuhan Anda" class="w-full bg-white border border-slate-300 rounded-lg py-2.5 px-4 text-xs focus:outline-none focus:border-blue-600">
                            @error('subjek') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="pesan" class="block text-xs font-semibold text-slate-700 mb-1">Isi Pesan</label>
                            <textarea id="pesan" name="pesan" rows="4" required placeholder="Tuliskan detail pertanyaan atau lokasi pemasangan jaringan Anda..." class="w-full bg-white border border-slate-300 rounded-lg py-2.5 px-4 text-xs focus:outline-none focus:border-blue-600">{{ old('pesan') }}</textarea>
                            @error('pesan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs px-6 py-3 rounded-lg shadow-sm transition">
                            Kirim Pesan <i class="fa-solid fa-paper-plane ml-1.5"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Google Maps Section -->
    <section class="py-12 bg-slate-100 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider block mb-1">Lokasi Presisi</span>
                <h2 class="text-2xl font-bold text-slate-900">Peta Kantor Kami</h2>
            </div>
            <!-- Embed Map SMK AK Nusa Bangsa Kota Bogor -->
            <div class="rounded-xl overflow-hidden shadow-sm border border-slate-200 h-[400px]">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7088924037597!2d106.77977467499317!3d-6.558362693434771!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c445697df0c3%3A0xb695ee5400d5a3fb!2sSMK%20AK%20Nusa%20Bangsa!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
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