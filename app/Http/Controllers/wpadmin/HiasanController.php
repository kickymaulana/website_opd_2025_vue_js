<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wpadmin\Tema;
use App\Models\wpadmin\Hiasan;
use App\Models\wpadmin\Tipe;
use App\Http\Resources\wpadmin\HiasanResource;

class HiasanController extends Controller
{
    public function index(Request $request, $tema_id)
    {
        $tema = Tema::findOrFail($tema_id);
        $cari = $request->query('cari', '');
        $query = Hiasan::query()->where('tema_id', $tema_id);
        if($cari){
            $query->where('nama', 'LIKE', '%'.$cari.'%');
        }
        return inertia('wpadmin/Hiasan/Index', [
            'list_hiasan' => HiasanResource::collection($query->orderByDesc('created_at')->paginate(10)),
            'cari' => $cari,
            'tema' => $tema,
        ]);

    }

    public function create($tema_id)
    {
        $tema = Tema::findOrFail($tema_id);
        $tipe = Tipe::all();
        return inertia('wpadmin/Hiasan/Create', [
            'tema' => $tema,
            'tipe' => $tipe,
        ]);
    }

    public function store(Request $request, $tema_id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hiasan' => 'required',
            'urutan' => 'required|numeric',
            'tipe_id' => 'required|uuid',
        ]);

        $request->merge(['tema_id' => $tema_id]);
        $request->merge(['single_page_id' => '00000000-0000-0000-0000-000000000000']);

        Hiasan::create($request->all());

        return redirect()->route('wpadmin.hiasan.index', ['tema_id' => $tema_id])->with('message', 'Tema berhasil ditambahkan.');
    }

    public function edit($tema_id, $id)
    {
        $tema = Tema::findOrFail($tema_id);
        $hiasan = Hiasan::findOrFail($id);
        $tipe = Tipe::all();
        return inertia('wpadmin/Hiasan/Edit', [
            'tema' => $tema,
            'hiasan' => $hiasan,
            'tipe' => $tipe,
        ]);
    }

    public function update(Request $request, $tema_id, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hiasan' => 'required',
            'urutan' => 'required|numeric',
            'tipe_id' => 'required|uuid',
        ]);


        $hiasan = Hiasan::findOrFail($id);
        $hiasan->update($request->all());

        return redirect()->route('wpadmin.hiasan.edit', ['tema_id' => $tema_id, 'id' => $id])->with('message', 'Hiasan berhasil diupdate.');
    }

    /* public function hapus($id) */
    /* { */
    /*     $tema = Tema::findOrFail($id); */
    /*     if($tema->status == 'aktif'){ */
    /*         return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Tema yang aktif tidak bisa dihapus.'); */
    /*     } else { */
    /*         $tema->delete(); */
    /*         return redirect()->route('wpadmin.tema.index')->with('message', 'Tema berhasil dihapus.'); */
    /*     } */
    /* } */
}
