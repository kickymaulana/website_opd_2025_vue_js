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
        return inertia('wpadmin/Tipe/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string|max:255',
        ]);

        Tipe::create([
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('wpadmin.tipe.index')->with('message', 'Tipe berhasil ditambahkan.');
    }

    public function show($id)
    {
        $tipe = Tipe::findOrFail($id);
        return inertia('wpadmin/Tipe/Show', [
            'tipe' => $tipe,
        ]);
    }

    public function edit($id)
    {
        $tipe = Tipe::findOrFail($id);
        return inertia('wpadmin/Tipe/Edit', [
            'tipe' => $tipe,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|string|max:255',
        ]);

        $tipe = Tipe::findOrFail($id);
        $tipe->update([
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('wpadmin.tipe.show',['id' => $tipe->id])->with('message', 'Tipe berhasil diperbarui.');
    }


    public function delete($id)
    {
        $tipe = Tipe::findOrFail($id);
        $tipe->delete();
        return redirect()->route('wpadmin.tipe.index')->with('message', 'Tipe berhasil dihapus.');
    }
}
