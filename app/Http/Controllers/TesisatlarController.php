<?php

namespace App\Http\Controllers;

use App\Models\Projeler;
use App\Models\Tesisatlar;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.tesisatlars.index', compact('tesisatlars', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Tesisatlar::class);

        $projelers = Projeler::pluck('proje_adi', 'id');

        return view('app.tesisatlars.create', compact('projelers'));
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

        return redirect()
            ->route('tesisatlars.edit', $tesisatlar)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tesisatlar $tesisatlar)
    {
        $this->authorize('view', $tesisatlar);

        return view('app.tesisatlars.show', compact('tesisatlar'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tesisatlar $tesisatlar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tesisatlar $tesisatlar)
    {
        $this->authorize('update', $tesisatlar);

        $projelers = Projeler::pluck('proje_adi', 'id');

        return view('app.tesisatlars.edit', compact('tesisatlar', 'projelers'));
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

        return redirect()
            ->route('tesisatlars.edit', $tesisatlar)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('tesisatlars.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
