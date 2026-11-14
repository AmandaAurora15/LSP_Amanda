<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk & Layanan - PT Solusi Net Nusantara</title>
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
                <a href="{{ url('/profile') }}" class="text-slate-600 hover:text-blue-600 transition">Profil Perusahaan</a>
                <a href="{{ url('/product') }}" class="text-blue-600 font-semibold border-b-2 border-blue-600 pb-1">Produk & Layanan</a>
                <a href="{{ url('/gallery') }}" class="text-slate-600 hover:text-blue-600 transition">Galeri</a>
                <a href="{{ url('/contact') }}" class="text-slate-600 hover:text-blue-600 transition">Kontak</a>
            </nav>

            @include('partials.navbar-actions')
        </div>
    </header>

    <!-- Page Header -->
    <section class="relative bg-slate-900 text-white py-16 px-4 overflow-hidden" style="background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.94)), url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1200&q=80') center/cover;">
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="text-blue-400 font-semibold text-xs uppercase tracking-widest bg-blue-500/10 px-3.5 py-1.5 rounded-full border border-blue-500/20 inline-block mb-4">Layanan Unggulan</span>
            <h1 class="text-3xl md:text-4xl font-extrabold mb-3 tracking-tight">Produk & Layanan Kami</h1>
            <p class="text-slate-300 max-w-xl mx-auto text-sm md:text-base leading-relaxed">
                Pilihan paket internet cepat dan solusi jaringan handal untuk menunjang kelancaran aktivitas instansi atau bisnis Anda.
            </p>
        </div>
    </section>

    <!-- Daftar Produk -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider block mb-2">Portofolio Layanan</span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900">Solusi Jaringan & Internet Terbaik</h2>
            </div>

            @if (session('error'))
                <div role="alert" class="mb-6 rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div role="status" class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm text-emerald-700">{{ session('success') }}</div>
            @endif
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($services as $service)
                    <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm flex flex-col justify-between transition hover:shadow-md hover:border-blue-200">
                        @if ($service->gambar)
                            <img src="{{ asset('storage/' . ltrim($service->gambar, '/')) }}" alt="{{ $service->nama_layanan }}" class="w-full h-48 object-cover">
                        @else
                            <div class="h-48 bg-slate-900 text-blue-400 flex items-center justify-center text-4xl">
                                <i class="fa-solid fa-network-wired"></i>
                            </div>
                        @endif
                        <div class="p-6 flex flex-col flex-1">
                            @if ($service->category)
                                <span class="text-blue-600 text-xs font-semibold uppercase tracking-wider mb-2">{{ $service->category->nama_kategori }}</span>
                            @endif
                            <h3 class="font-bold text-slate-900 text-lg mb-2">
                                <a href="{{ route('product.detail', $service->id) }}" class="transition hover:text-blue-600">{{ $service->nama_layanan }}</a>
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed mb-4">{{ $service->deskripsi }}</p>
                            <p class="text-blue-600 font-extrabold text-base mb-6">Rp {{ number_format((float) $service->harga, 0, ',', '.') }}</p>
                            
                            <div class="space-y-2 mb-4">
                                <a href="{{ route('product.detail', $service->id) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-xs flex items-center">
                                    Lihat Detail <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                                </a>
                                <a href="{{ url('/contact') }}" class="text-slate-600 hover:text-slate-900 font-semibold text-xs flex items-center pt-3 border-t border-slate-100">
                                    Konsultasikan Kebutuhan <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                                </a>
                            </div>

                            @auth
                                <a href="{{ route('subscriptions.create', ['service_id' => $service->id]) }}" class="mt-auto block w-full rounded-lg bg-blue-600 px-4 py-2.5 text-center text-sm font-medium text-white transition hover:bg-blue-700 shadow-sm">
                                    Langganan
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="mt-auto block rounded-lg bg-blue-600 px-4 py-2.5 text-center text-sm font-medium text-white transition hover:bg-blue-700 shadow-sm">
                                    Langganan
                                </a>
                            @endauth
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-slate-500 text-sm py-12">Belum ada produk atau layanan yang tersedia.</p>
                @endforelse
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