<?php

namespace App\Http\Controllers\wpadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wpadmin\SinglePage;
use App\Http\Resources\wpadmin\SinglePageResource;

class SinglePageController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari', '');
        $query = SinglePage::query();
        if($cari){
            $query->where('nama', 'LIKE', '%'.$cari.'%');
        }
        return inertia('wpadmin/SinglePage/Index', [
            'list_single_page' => SinglePageResource::collection($query->orderByDesc('created_at')->paginate(10)),
            'cari' => $cari,
        ]);

    }

    public function create()
    {
        return inertia('wpadmin/SinglePage/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        SinglePage::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('wpadmin.singlepage.index')->with('message', 'Single Page berhasil ditambahkan.');
    }

    public function show($id)
    {
        $single_page = SinglePage::findOrFail($id);
        return inertia('wpadmin/SinglePage/Show', [
            'single_page' => $single_page,
        ]);
    }
}
