<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PublicController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function profile()
    {
        $profile = Profile::query()->firstOrFail();

        return view('profile', compact('profile'));
    }
    public function product()
    {
        $services = Service::with('category')->latest()->get();

        return view('product', compact('services'));
    }
    public function article()
    {       
        return view('article');
    }
    public function detail($id)
    {
        $product = Service::with('category')->findOrFail($id);

        return view('detail', compact('product'));
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        return view('gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'telepon' => ['nullable', 'string', 'max:30'],
            'kebutuhan' => [
                'required',
                'string',
                Rule::in([
                    'Dedicated Internet Access (DIA)',
                    'Broadband SOHO / Perkantoran',
                    'Instalasi & Maintenance Jaringan',
                    'Lainnya / Pertanyaan Umum',
                ]),
            ],
            'subjek' => ['required', 'string', 'max:255'],
            'pesan' => ['required', 'string'],
        ]);

        Contact::create([
            ...$validated,
            'status' => 'Belum Dibaca',
        ]);

        return redirect()
            ->route('contact')
            ->with('success', 'Pesan Anda berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}