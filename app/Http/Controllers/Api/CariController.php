<?php

namespace App\Http\Controllers\Api;

use App\Models\Cari;
use Illuminate\Http\Request;
use App\Http\Resources\CariResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CariCollection;
use App\Http\Requests\CariStoreRequest;
use App\Http\Requests\CariUpdateRequest;

class CariController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Cari::class);

        $search = $request->get('search', '');

        $caris = Cari::search($search)
            ->latest()
            ->paginate();

        return new CariCollection($caris);
    }

    /**
     * @param \App\Http\Requests\CariStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CariStoreRequest $request)
    {
        $this->authorize('create', Cari::class);

        $validated = $request->validated();

        $cari = Cari::create($validated);

        return new CariResource($cari);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cari $cari)
    {
        $this->authorize('view', $cari);

        return new CariResource($cari);
    }

    /**
     * @param \App\Http\Requests\CariUpdateRequest $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function update(CariUpdateRequest $request, Cari $cari)
    {
        $this->authorize('update', $cari);

        $validated = $request->validated();

        $cari->update($validated);

        return new CariResource($cari);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cari $cari)
    {
        $this->authorize('delete', $cari);

        $cari->delete();

        return response()->noContent();
    }
}
