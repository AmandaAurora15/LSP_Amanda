<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - PT Solusi Net Nusantara</title>
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
    <header class="bg-white shadow-sm">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="font-bold text-slate-900">PT SOLUSI NET NUSANTARA</a>
            <a href="{{ route('product') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700">Kembali ke layanan</a>
        </div>
    </header>

    <main class="mx-auto max-w-5xl px-4 py-12">
        <div class="mb-8">
            <p class="text-xs font-semibold uppercase tracking-wider text-blue-600">Langkah berikutnya</p>
            <h1 class="mt-2 text-3xl font-extrabold text-slate-900">Pembayaran & Alamat Pemasangan</h1>
            <p class="mt-2 text-sm text-slate-600">Pilih metode pembayaran dan masukkan alamat pemasangan layanan Anda.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                <p class="font-semibold">Periksa kembali data yang diisi.</p>
                <ul class="mt-1 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid gap-8 md:grid-cols-[minmax(0,1fr)_minmax(0,1.2fr)]">
            <section class="h-fit rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Layanan Dipilih</p>
                <h2 class="mt-2 text-xl font-bold text-slate-900">{{ $service->nama_layanan }}</h2>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $service->deskripsi }}</p>
                <p class="mt-5 text-2xl font-extrabold text-blue-600">Rp {{ number_format((float) $service->harga, 0, ',', '.') }}</p>
            </section>

            <form action="{{ route('subscriptions.store') }}" method="POST" enctype="multipart/form-data" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label for="payment_method" class="mb-2 block text-sm font-semibold text-slate-700">Metode Pembayaran</label>
                        <select id="payment_method" name="payment_method" required class="w-full rounded-lg border border-slate-300 px-3 py-3 text-sm focus:border-blue-600 focus:outline-none">
                            <option value="">Pilih metode pembayaran</option>
                            @foreach ($paymentMethods as $value => $label)
                                <option value="{{ $value }}" @selected(old('payment_method') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('payment_method')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mx-auto max-w-2xl px-2 py-6" >
                        <p class="mb-5 block text-sm font-bold text-blue-700">Nomor Rekening: 128373764646</p>
                        </div>
                    </div>
                        

                    <div>
                        <label for="installation_address" class="mb-2 block text-sm font-semibold text-slate-700">Alamat Pemasangan</label>
                        <textarea id="installation_address" name="installation_address" rows="4" required maxlength="1000" placeholder="Jalan, nomor rumah, kelurahan, kecamatan, kota" class="w-full rounded-lg border border-slate-300 px-3 py-3 text-sm focus:border-blue-600 focus:outline-none">{{ old('installation_address') }}</textarea>
                        @error('installation_address')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                </div>


                <div id="bukti-container" class="mt-5" @if (old('payment_method') !== 'Transfer Bank') hidden @endif>
                    <label for="bukti" class="mb-2 block text-sm font-semibold text-slate-700">Bukti Pembayaran</label>
                    <input id="bukti" name="bukti" type="file" accept="image/jpeg,image/png,image/webp" class="w-full rounded-lg border border-slate-300 px-3 py-3 text-sm file:mr-3 file:rounded-md file:border-0 file:bg-blue-50 file:px-3 file:py-2 file:text-xs file:font-semibold file:text-blue-700 focus:border-blue-600 focus:outline-none">
                    @error('bukti')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <p class="mt-4 text-xs leading-relaxed text-slate-500">Admin akan menghubungi Anda untuk konfirmasi pembayaran dan jadwal pemasangan.</p>
                <button type="submit" class="mt-6 w-full rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                    Kirim Pengajuan
                </button>
            </form>
        </div>
    </main>
    <script>
        const paymentMethod = document.getElementById('payment_method');
        const paymentProof = document.getElementById('bukti');
        const paymentProofContainer = document.getElementById('bukti-container');

        function updatePaymentProofRequirement() {
            const isBankTransfer = paymentMethod.value === 'Transfer Bank';

            paymentProofContainer.hidden = !isBankTransfer;
            paymentProof.required = isBankTransfer;
            paymentProof.disabled = !isBankTransfer;

            if (!isBankTransfer) {
                paymentProof.value = '';
            }
        }

        paymentMethod.addEventListener('change', updatePaymentProofRequirement);
        updatePaymentProofRequirement();
    </script>
</body>
</html>
