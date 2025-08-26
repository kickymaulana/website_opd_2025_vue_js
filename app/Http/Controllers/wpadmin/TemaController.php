<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wpadmin\Tema;

class TemaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari', '');
        $query = Tema::query();
        if($cari){
            $query->where('tema', 'LIKE', '%'.$cari.'%');
        }
        return inertia('wpadmin/Tema/Index', [
            'list_tema' => $query->orderByDesc('created_at')->get(),
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
