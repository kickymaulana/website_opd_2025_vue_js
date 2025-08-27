<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Models\wpadmin\Tema;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {

        // Ambil tema aktif
        $temaAktif = Tema::where('status', 'aktif')->first();

        // Jika tidak ada tema aktif, ambil tema pertama atau null
        if (!$temaAktif) {
            $temaAktif = Tema::first();
        }


        return [
            ...parent::share($request),
            'flash' => [
                'message' => fn () => $request->session()->get('message')
            ],
            'tema_aktif' => $temaAktif ? [
                'id' => $temaAktif->id,
                'nama' => $temaAktif->tema,
                'status' => $temaAktif->status,
                // tambahkan field lain yang diperlukan
            ] : null,
        ];
    }
}
