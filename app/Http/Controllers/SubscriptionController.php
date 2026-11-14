<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SubscriptionController extends Controller
{
    public function dashboard()
    {
        $subscriptions = Auth::user()
            ->subscriptions()
            ->with('service.category')
            ->latest()
            ->get();

        return view('subscriptions.dashboard', compact('subscriptions'));
    }

    public function create(Request $request)
    {
        $serviceId = $request->query('service_id');

        if (! is_string($serviceId) || ! ctype_digit($serviceId) || (int) $serviceId < 1) {
            return redirect()->route('product');
        }

        $service = Service::query()->findOrFail((int) $serviceId);

        return view('subscriptions.payment', [
            'service' => $service,
            'paymentMethods' => Subscription::PAYMENT_METHODS,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => ['required', 'integer', Rule::exists('services', 'id')],
            'payment_method' => ['required', Rule::in(array_keys(Subscription::PAYMENT_METHODS))],
            'installation_address' => ['required', 'string', 'max:1000'],
            'bukti' => [
                'nullable',
                'required_if:payment_method,Transfer Bank',
                'prohibited_unless:payment_method,Transfer Bank',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $alreadySubscribed = Subscription::query()
            ->where('user_id', Auth::id())
            ->where('service_id', $validated['service_id'])
            ->whereIn('status', ['Pending', 'Disetujui'])
            ->exists();

        if ($alreadySubscribed) {
            return back()->with('error', 'Anda sudah memiliki pengajuan aktif untuk layanan ini.');
        }

        $proofPath = null;

        if ($request->hasFile('bukti')) {
            $proofPath = $request->file('bukti')->store('subscriptions', 'local');

            if (! is_string($proofPath)) {
                return back()
                    ->withInput()
                    ->withErrors(['bukti' => 'Bukti pembayaran gagal disimpan. Silakan coba lagi.']);
            }
        }

        Subscription::create([
            'user_id' => Auth::id(),
            'service_id' => $validated['service_id'],
            'status' => 'Pending',
            'payment_method' => $validated['payment_method'],
            'installation_address' => $validated['installation_address'],
            'bukti' => $proofPath,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Pengajuan langganan berhasil dikirim. Admin akan segera memprosesnya.');
    }
}
