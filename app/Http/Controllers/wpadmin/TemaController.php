<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wpadmin\Tema;
use App\Http\Resources\wpadmin\TemaResource;

class TemaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari', '');
        $query = Tema::query();
        if($cari){
            $query->where('tema', 'LIKE', '%'.$cari.'%');
        }
        $test = TemaResource::collection($query->orderByDesc('created_at')->paginate(10));
        return $test;
        return inertia('wpadmin/Tema/Index', [
            'list_tema' => TemaResource::collection($query->orderByDesc('created_at')->paginate(10)),
        ]);

    }

    public function create()
    {
        return inertia('wpadmin/Tema/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
        ]);

        Tema::create([
            'tema' => $request->tema,
        ]);

        return redirect()->route('wpadmin.tema.index')->with('success', 'Tema berhasil ditambahkan.');
    }
}
