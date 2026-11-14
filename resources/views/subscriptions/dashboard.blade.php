<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PT Solusi Net Nusantara</title>
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
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('image/solusinet.png') }}" alt="Logo PT Solusi Net Nusantara" class="h-10 w-10 rounded-lg object-contain">
                <span>
                    <span class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Internet Service Provider</span>
                    <span class="text-sm font-bold tracking-tight text-slate-900 md:text-base">PT SOLUSI NET NUSANTARA</span>
                </span>
            </a>

            <nav class="hidden items-center space-x-8 text-sm font-medium lg:flex">
                <a href="{{ route('home') }}" class="text-slate-600 transition hover:text-blue-600">Beranda</a>
                <a href="{{ route('profile') }}" class="text-slate-600 transition hover:text-blue-600">Profil Perusahaan</a>
                <a href="{{ route('product') }}" class="text-slate-600 transition hover:text-blue-600">Produk & Layanan</a>
                <a href="{{ route('gallery') }}" class="text-slate-600 transition hover:text-blue-600">Galeri</a>
                <a href="{{ route('contact') }}" class="text-slate-600 transition hover:text-blue-600">Kontak</a>
            </nav>

            @include('partials.navbar-actions')
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-12">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800" role="status">
                {{ session('success') }}
            </div>
        @endif

        <!-- Dashboard Hero Card -->
        <section class="rounded-xl bg-slate-900 px-6 py-10 text-white shadow-sm md:px-10 overflow-hidden relative" style="background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.94)), url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80') center/cover;">
            <div class="relative z-10">
                <span class="text-blue-400 font-semibold text-xs uppercase tracking-widest bg-blue-500/10 px-3.5 py-1.5 rounded-full border border-blue-500/20 inline-block mb-3">Dashboard Pelanggan</span>
                <h1 class="text-3xl font-extrabold tracking-tight">Selamat datang, {{ auth()->user()->name }}!</h1>
                <p class="mt-3 max-w-2xl text-sm md:text-base leading-relaxed text-slate-300">
                    Kelola pengajuan langganan internet Anda dan pantau status layanan PT Solusi Net Nusantara dengan mudah melalui halaman ini.
                </p>
            </div>
        </section>

        <!-- Subscriptions Section -->
        <section class="mt-12">
            <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <span class="text-blue-600 font-semibold text-xs uppercase tracking-wider block mb-1">Status Akun</span>
                    <h2 class="text-2xl font-bold text-slate-900">Langganan Saya</h2>
                </div>
                <a href="{{ route('product') }}" class="text-sm font-semibold text-blue-600 transition hover:text-blue-700 flex items-center">
                    Jelajahi layanan lain <i class="fa-solid fa-arrow-right ml-1.5 text-xs"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($subscriptions as $subscription)
                    <article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm flex flex-col justify-between transition hover:shadow-md hover:border-blue-200">
                        <div>
                            @if ($subscription->service->category)
                                <span class="text-xs font-semibold uppercase tracking-wider text-blue-600 block mb-2">{{ $subscription->service->category->nama_kategori }}</span>
                            @endif
                            <h3 class="text-lg font-bold text-slate-900 mb-2">{{ $subscription->service->nama_layanan }}</h3>
                            <p class="text-sm leading-relaxed text-slate-600 mb-4">{{ $subscription->service->deskripsi }}</p>
                            <p class="font-extrabold text-blue-600 text-base mb-4">Rp {{ number_format((float) $subscription->service->harga, 0, ',', '.') }}</p>
                            @if ($subscription->payment_method)
                                <p class="mb-2 text-sm text-slate-600"><span class="font-semibold">Metode Pembayaran:</span> {{ $subscription->payment_method }}</p>
                            @endif
                            @if ($subscription->installation_address)
                                <p class="mb-4 whitespace-pre-line text-sm text-slate-600"><span class="font-semibold">Alamat Pemasangan:</span> {{ $subscription->installation_address }}</p>
                            @endif
                        </div>
                        <div class="border-t border-slate-100 pt-4 flex items-center justify-between text-sm">
                            <span class="text-slate-500 text-xs font-medium">Status Pengajuan:</span>
                            <span class="font-semibold px-2.5 py-1 rounded-md bg-blue-50 text-blue-700 border border-blue-100 text-xs">{{ $subscription->status }}</span>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full rounded-xl border border-slate-200 bg-white p-12 text-center shadow-sm">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-xl">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                        <p class="text-sm text-slate-600 font-medium">Anda belum memiliki pengajuan langganan aktif.</p>
                        <a href="{{ route('product') }}" class="mt-4 inline-flex rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700 shadow-sm">
                            Lihat Produk & Layanan
                        </a>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

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