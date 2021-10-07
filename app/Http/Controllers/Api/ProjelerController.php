<?php

namespace App\Http\Controllers\Api;

use App\Models\Projeler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProjelerResource;
use App\Http\Resources\ProjelerCollection;
use App\Http\Requests\ProjelerStoreRequest;
use App\Http\Requests\ProjelerUpdateRequest;

class ProjelerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Projeler::class);

        $search = $request->get('search', '');

        $projelers = Projeler::search($search)
            ->latest()
            ->paginate();

        return new ProjelerCollection($projelers);
    }

    /**
     * @param \App\Http\Requests\ProjelerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjelerStoreRequest $request)
    {
        $this->authorize('create', Projeler::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $projeler = Projeler::create($validated);

        return new ProjelerResource($projeler);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Projeler $projeler)
    {
        $this->authorize('view', $projeler);

        return new ProjelerResource($projeler);
    }

    /**
     * @param \App\Http\Requests\ProjelerUpdateRequest $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function update(ProjelerUpdateRequest $request, Projeler $projeler)
    {
        $this->authorize('update', $projeler);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($projeler->image) {
                Storage::delete($projeler->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $projeler->update($validated);

        return new ProjelerResource($projeler);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Projeler $projeler)
    {
        $this->authorize('delete', $projeler);

        if ($projeler->image) {
            Storage::delete($projeler->image);
        }

        $projeler->delete();

        return response()->noContent();
    }
}
