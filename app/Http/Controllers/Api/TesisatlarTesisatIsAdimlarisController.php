<?php

namespace App\Http\Controllers\Api;

use App\Models\Tesisatlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TesisatIsAdimlariResource;
use App\Http\Resources\TesisatIsAdimlariCollection;

class TesisatlarTesisatIsAdimlarisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tesisatlar $tesisatlar)
    {
        $this->authorize('view', $tesisatlar);

        $search = $request->get('search', '');

        $tesisatIsAdimlaris = $tesisatlar
            ->tesisatIsAdimlaris()
            ->search($search)
            ->latest()
            ->paginate();

        return new TesisatIsAdimlariCollection($tesisatIsAdimlaris);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tesisatlar $tesisatlar)
    {
        $this->authorize('create', TesisatIsAdimlari::class);

        $validated = $request->validate([
            'data_key' => ['required', 'numeric'],
            'title' => ['required', 'max:255', 'string'],
            'tahmin_zaman' => ['required', 'numeric'],
            'gerceklesen_zaman' => ['required', 'numeric'],
            'kayip_zaman' => ['required', 'numeric'],
            'aciklama' => ['required', 'max:255', 'string'],
            'ordering' => ['required', 'numeric'],
            'state' => ['required', 'max:255'],
        ]);

        $tesisatIsAdimlari = $tesisatlar
            ->tesisatIsAdimlaris()
            ->create($validated);

        return new TesisatIsAdimlariResource($tesisatIsAdimlari);
    }
}
