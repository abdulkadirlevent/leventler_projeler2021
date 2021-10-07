<?php

namespace App\Http\Controllers\Api;

use App\Models\Projeler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TesisatlarResource;
use App\Http\Resources\TesisatlarCollection;

class ProjelerTesisatlarsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Projeler $projeler)
    {
        $this->authorize('view', $projeler);

        $search = $request->get('search', '');

        $tesisatlars = $projeler
            ->tesisatlars()
            ->search($search)
            ->latest()
            ->paginate();

        return new TesisatlarCollection($tesisatlars);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Projeler $projeler)
    {
        $this->authorize('create', Tesisatlar::class);

        $validated = $request->validate([
            'tesisat_no' => ['required', 'max:255', 'string'],
            'baslama_tarihi' => ['required', 'date'],
            'teslim_tarihi' => ['required', 'date'],
            'birim_fiyati' => ['nullable', 'numeric'],
        ]);

        $tesisatlar = $projeler->tesisatlars()->create($validated);

        return new TesisatlarResource($tesisatlar);
    }
}
