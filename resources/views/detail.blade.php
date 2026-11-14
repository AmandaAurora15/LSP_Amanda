<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nama_layanan }} - PT Solusi Net Nusantara</title>
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
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('image/solusinet.png') }}" alt="Logo PT Solusi Net Nusantara" class="h-10 w-10 rounded-lg object-contain">
                <span>
                    <span class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Internet Service Provider</span>
                    <span class="text-sm font-bold tracking-tight text-slate-900 md:text-base">PT SOLUSI NET NUSANTARA</span>
                </span>
            </a>

            <nav class="hidden items-center space-x-8 font-medium text-sm lg:flex">
                <a href="{{ route('home') }}" class="text-slate-600 transition hover:text-blue-600">Beranda</a>
                <a href="{{ route('profile') }}" class="text-slate-600 transition hover:text-blue-600">Profil Perusahaan</a>
                <a href="{{ route('product') }}" class="border-b-2 border-blue-600 pb-1 font-semibold text-blue-600">Produk & Layanan</a>
                <a href="{{ route('gallery') }}" class="text-slate-600 transition hover:text-blue-600">Galeri</a>
                <a href="{{ route('contact') }}" class="text-slate-600 transition hover:text-blue-600">Kontak</a>
            </nav>

            @include('partials.navbar-actions')
        </div>
    </header>

    <main>
        <!-- Page Header / Hero -->
        <section class="relative bg-slate-900 px-4 py-16 text-white overflow-hidden" style="background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.94)), url('https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1200&q=80') center/cover;">
            <div class="mx-auto max-w-7xl relative z-10">
                <a href="{{ route('product') }}" class="mb-6 inline-flex items-center text-xs font-medium text-slate-300 transition hover:text-white">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Produk & Layanan
                </a>
                <div class="mt-2">
                    @if ($product->category)
                        <span class="inline-block rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1.5 text-xs font-semibold uppercase tracking-widest text-blue-400">
                            {{ $product->category->nama_kategori }}
                        </span>
                    @else
                        <span class="inline-block rounded-full border border-blue-500/20 bg-blue-500/10 px-3.5 py-1.5 text-xs font-semibold uppercase tracking-widest text-blue-400">
                            Produk & Layanan
                        </span>
                    @endif
                    <h1 class="mt-4 text-3xl font-extrabold tracking-tight md:text-4xl">{{ $product->nama_layanan }}</h1>
                    <p class="mt-2 text-sm text-slate-300">Detail lengkap paket dan layanan dari PT Solusi Net Nusantara</p>
                </div>
            </div>
        </section>

        <!-- Detail Section -->
        <section class="bg-white px-4 py-12 md:py-16">
            <div class="mx-auto grid max-w-7xl gap-10 lg:grid-cols-2 lg:items-start">
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50 shadow-sm">
                    @if ($product->gambar)
                        <img src="{{ asset('storage/' . ltrim($product->gambar, '/')) }}" alt="{{ $product->nama_layanan }}" class="max-h-[28rem] min-h-64 w-full object-cover">
                    @else
                        <div class="flex min-h-64 items-center justify-center bg-slate-900 text-6xl text-blue-400 md:min-h-[28rem]">
                            <i class="fa-solid fa-network-wired" aria-hidden="true"></i>
                        </div>
                    @endif
                </div>

                <div>
                    <span class="text-xs font-semibold uppercase tracking-wider text-blue-600">Informasi Layanan</span>
                    <h2 class="mt-2 text-2xl font-bold text-slate-900 md:text-3xl">{{ $product->nama_layanan }}</h2>
                    @if ($product->category)
                        <p class="mt-1 text-sm text-slate-500 font-medium">{{ $product->category->nama_kategori }}</p>
                    @endif

                    <div class="mt-6 border-t border-slate-100 pt-6">
                        <h3 class="text-sm font-bold text-slate-900">Deskripsi Layanan</h3>
                        <p class="mt-3 whitespace-pre-line text-sm leading-relaxed text-slate-600">{{ $product->deskripsi }}</p>
                    </div>

                    <div class="mt-6 rounded-xl border border-blue-100 bg-blue-50/50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Tarif / Harga</p>
                        <p class="mt-1 text-2xl font-extrabold text-blue-600">Rp {{ number_format((float) $product->harga, 0, ',', '.') }}</p>
                    </div>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        @auth
                            <a href="{{ route('subscriptions.create', ['service_id' => $product->id]) }}" class="w-full rounded-lg bg-blue-600 px-5 py-3 text-center text-sm font-medium text-white transition hover:bg-blue-700 shadow-sm sm:flex-1">
                                Langganan Sekarang
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-lg bg-blue-600 px-5 py-3 text-center text-sm font-medium text-white transition hover:bg-blue-700 shadow-sm sm:flex-1">
                                Langganan Sekarang
                            </a>
                        @endauth
                        <a href="{{ route('contact') }}" class="rounded-lg border border-slate-300 px-5 py-3 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-50 sm:flex-1">
                            Konsultasikan Kebutuhan
                        </a>
                    </div>
                </div>
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