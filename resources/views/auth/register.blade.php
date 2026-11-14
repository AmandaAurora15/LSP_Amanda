<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - PT Solusi Net Nusantara</title>
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
<body class="min-h-screen bg-slate-50 text-slate-800">
    <main class="mx-auto flex min-h-screen max-w-md flex-col justify-center px-4 py-12">
        <!-- Logo & Nama PT -->
        <a href="{{ route('home') }}" class="mb-8 flex flex-col items-center justify-center space-y-2 text-center group">
            <img src="{{ asset('image/solusinet.png') }}" alt="Logo PT Solusi Net Nusantara" class="h-12 w-12 rounded-xl object-contain shadow-sm border border-slate-200 bg-white p-1 transition group-hover:border-blue-300">
            <div>
                <span class="block text-[11px] font-bold uppercase tracking-wider text-slate-400">Internet Service Provider</span>
                <span class="text-sm font-bold tracking-tight text-slate-900 group-hover:text-blue-600 transition">PT SOLUSI NET NUSANTARA</span>
            </div>
        </a>

        <div class="rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
            <h1 class="text-2xl font-bold text-slate-900">Buat Akun Baru</h1>
            <p class="mt-2 text-sm text-slate-600 leading-relaxed">Daftar untuk melanjutkan pengajuan langganan layanan internet.</p>

            <form action="{{ route('register.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <div>
                    <label for="name" class="mb-1 block text-xs font-semibold text-slate-700">Nama Lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required maxlength="255" autocomplete="name" placeholder="Masukkan nama lengkap" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-xs focus:border-blue-600 focus:outline-none">
                    @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="mb-1 block text-xs font-semibold text-slate-700">Alamat Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="255" autocomplete="email" placeholder="nama@email.com" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-xs focus:border-blue-600 focus:outline-none">
                    @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="telepon" class="mb-1 block text-xs font-semibold text-slate-700">Nomor Telepon</label>
                    <input id="telepon" name="telepon" type="string" value="{{ old('telepon') }}" required maxlength="255" autocomplete="telepon" placeholder="081586844580" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-xs focus:border-blue-600 focus:outline-none">
                    @error('telepon') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="nik" class="mb-1 block text-xs font-semibold text-slate-700">NIK</label>
                    <input id="nik" name="nik" type="string" value="{{ old('nik') }}" required maxlength="255" autocomplete="nik" placeholder="3311221144556677" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-xs focus:border-blue-600 focus:outline-none">
                    @error('nik') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="password" class="mb-1 block text-xs font-semibold text-slate-700">Kata Sandi</label>
                    <input id="password" name="password" type="password" required minlength="8" autocomplete="new-password" placeholder="Minimal 8 karakter" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-xs focus:border-blue-600 focus:outline-none">
                    @error('password') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="mb-1 block text-xs font-semibold text-slate-700">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password" placeholder="Ulangi kata sandi" class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-xs focus:border-blue-600 focus:outline-none">
                </div>
                <button type="submit" class="w-full rounded-lg bg-blue-600 px-4 py-3 text-xs font-medium text-white shadow-sm transition hover:bg-blue-700">
                    Daftar dan Lanjutkan ke Dashboard
                </button>
            </form>

            <p class="mt-6 text-center text-xs text-slate-600">Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:underline">Masuk sekarang</a></p>
        </div>
    </main>
</body>
</html>