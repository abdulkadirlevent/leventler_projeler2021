<?php

namespace App\Http\Controllers\Api;

use App\Models\Tesisatlar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TesisatlarResource;
use App\Http\Resources\TesisatlarCollection;
use App\Http\Requests\TesisatlarStoreRequest;
use App\Http\Requests\TesisatlarUpdateRequest;

class TesisatlarController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Tesisatlar::class);

        $search = $request->get('search', '');

        $tesisatlars = Tesisatlar::search($search)
            ->latest()
            ->paginate();

        return new TesisatlarCollection($tesisatlars);
    }

    /**
     * @param \App\Http\Requests\TesisatlarStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TesisatlarStoreRequest $request)
    {
        $this->authorize('create', Tesisatlar::class);

        $validated = $request->validated();

        $tesisatlar = Tesisatlar::create($validated);

        return new TesisatlarResource($tesisatlar);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tesisatlar $tesisatlar)
    {
        $this->authorize('view', $tesisatlar);

        return new TesisatlarResource($tesisatlar);
    }

    /**
     * @param \App\Http\Requests\TesisatlarUpdateRequest $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function update(
        TesisatlarUpdateRequest $request,
        Tesisatlar $tesisatlar
    ) {
        $this->authorize('update', $tesisatlar);

        $validated = $request->validated();

        $tesisatlar->update($validated);

        return new TesisatlarResource($tesisatlar);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tesisatlar $tesisatlar)
    {
        $this->authorize('delete', $tesisatlar);

        $tesisatlar->delete();

        return response()->noContent();
    }
}
