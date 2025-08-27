<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wpadmin\Tipe;
use App\Http\Resources\wpadmin\TipeResource;

class TipeController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari', '');
        $query = Tipe::query();
        if($cari){
            $query->where('tipe', 'LIKE', '%'.$cari.'%');
        }
        return inertia('wpadmin/Tipe/Index', [
            'list_tipe' => TipeResource::collection($query->orderByDesc('created_at')->paginate(10)),
            'cari' => $cari,
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

        return redirect()->route('wpadmin.tema.index')->with('message', 'Tema berhasil ditambahkan.');
    }

    public function show($id)
    {
        $tema = Tema::findOrFail($id);
        return inertia('wpadmin/Tema/Show', [
            'tema' => $tema,
        ]);
    }

    public function edit($id)
    {
        $tema = Tema::findOrFail($id);
        return inertia('wpadmin/Tema/Edit', [
            'tema' => $tema,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tema' => 'required|string|max:255',
        ]);

        $tema = Tema::findOrFail($id);
        $tema->update([
            'tema' => $request->tema,
        ]);

        return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Tema berhasil diperbarui.');
    }

    public function aktifkan($id)
    {
        $tema = Tema::findOrFail($id);
        if(Tema::where('status', 'aktif')->count() >= 1){
            return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Masih ada tema yang aktif');
        } else {
            $tema->update([
                'status' => 'aktif',
            ]);
            return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Tema berhasil diaktifkan.');
        }

    }

    public function nonaktifkan($id)
    {
        $tema = Tema::findOrFail($id);
        $tema->update([
            'status' => 'nonaktif',
        ]);
        return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Tema berhasil dinonaktifkan.');
    }

    public function hapus($id)
    {
        $tema = Tema::findOrFail($id);
        if($tema->status == 'aktif'){
            return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Tema yang aktif tidak bisa dihapus.');
        } else {
            $tema->delete();
            return redirect()->route('wpadmin.tema.index')->with('message', 'Tema berhasil dihapus.');
        }
    }
}
