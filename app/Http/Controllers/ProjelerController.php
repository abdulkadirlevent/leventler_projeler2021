<?php

namespace App\Http\Controllers;

use App\Models\Cari;
use App\Models\Projeler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            ->paginate(5);

        return view('app.projelers.index', compact('projelers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Projeler::class);

        $caris = Cari::pluck('ticari_unvani', 'id');

        return view('app.projelers.create', compact('caris'));
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

        return redirect()
            ->route('projelers.edit', $projeler)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Projeler $projeler)
    {
        $this->authorize('view', $projeler);

        return view('app.projelers.show', compact('projeler'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Projeler $projeler
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Projeler $projeler)
    {
        $this->authorize('update', $projeler);

        $caris = Cari::pluck('ticari_unvani', 'id');

        return view('app.projelers.edit', compact('projeler', 'caris'));
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

        return redirect()
            ->route('projelers.edit', $projeler)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('projelers.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
