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
            'tema_id' => 'required|uuid',
        ]);

        Hiasan::create($request->all());

        return redirect()->route('wpadmin.hiasan.index', ['tema_id' => $tema_id])->with('message', 'Tema berhasil ditambahkan.');
    }

    /* public function show($id) */
    /* { */
    /*     $tema = Tema::findOrFail($id); */
    /*     return inertia('wpadmin/Tema/Show', [ */
    /*         'tema' => $tema, */
    /*     ]); */
    /* } */
    /**/
    /* public function edit($id) */
    /* { */
    /*     $tema = Tema::findOrFail($id); */
    /*     return inertia('wpadmin/Tema/Edit', [ */
    /*         'tema' => $tema, */
    /*     ]); */
    /* } */
    /**/
    /* public function update(Request $request, $id) */
    /* { */
    /*     $request->validate([ */
    /*         'tema' => 'required|string|max:255', */
    /*     ]); */
    /**/
    /*     $tema = Tema::findOrFail($id); */
    /*     $tema->update([ */
    /*         'tema' => $request->tema, */
    /*     ]); */
    /**/
    /*     return redirect()->route('wpadmin.tema.show',['id' => $tema->id])->with('message', 'Tema berhasil diperbarui.'); */
    /* } */
    /**/
    /**/
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
