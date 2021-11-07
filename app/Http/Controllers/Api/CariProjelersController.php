<?php

namespace App\Http\Controllers\Api;

use App\Models\Cari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjelerResource;
use App\Http\Resources\ProjelerCollection;

class CariProjelersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Cari $cari)
    {
        $this->authorize('view', $cari);

        $search = $request->get('search', '');

        $projelers = $cari
            ->projelers()
            ->search($search)
            ->latest()
            ->paginate();

        return new ProjelerCollection($projelers);
    }



    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cari $cari)
    {
        $this->authorize('create', Projeler::class);

        $validated = $request->validate([
            'proje_adi' => ['required', 'max:255', 'string'],
            'sozlezme_no' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'baslama_tarihi' => ['required', 'date'],
            'teslim_tarihi' => ['required', 'date'],
            'birim_fiyati' => ['nullable', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $projeler = $cari->projelers()->create($validated);

        return new ProjelerResource($projeler);
    }
}
