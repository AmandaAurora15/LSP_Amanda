<div class="flex shrink-0 items-center gap-2">
    @auth
        <details class="relative">
            <summary class="flex cursor-pointer list-none items-center gap-2 rounded-md bg-blue-900 px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-blue-800 xl:text-sm">
                <i class="fa-solid fa-circle-user"></i>
                <span class="max-w-[9rem] truncate">{{ auth()->user()->name }}</span>
                <i class="fa-solid fa-chevron-down text-[10px]"></i>
            </summary>
            <div class="absolute right-0 z-50 mt-2 w-48 rounded-md border border-gray-100 bg-white py-2 shadow-lg">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50 hover:text-blue-900">Dashboard</a>
                <div class="my-1 border-t border-gray-100"></div>
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm font-medium text-gray-700 transition hover:bg-gray-50 hover:text-blue-900">Keluar</button>
                </form>
            </div>
        </details>
    @else
        <a href="{{ route('login') }}" class="flex items-center rounded-md bg-amber-500 px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-amber-600 xl:text-sm">
            Langganan Sekarang <i class="fa-solid fa-chevron-right ml-1.5 text-xs"></i>
        </a>
    @endauth
</div>
