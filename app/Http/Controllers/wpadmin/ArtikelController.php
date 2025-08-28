<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wpadmin\Artikel;
use App\Http\Resources\wpadmin\ArtikelResource;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari', '');
        $query = Artikel::query();
        if($cari){
            $query->where('judul', 'LIKE', '%'.$cari.'%');
        }
        return inertia('wpadmin/Artikel/Index', [
            'list_artikel' => ArtikelResource::collection($query->orderByDesc('created_at')->paginate(10)),
            'cari' => $cari,
        ]);

    }
}
