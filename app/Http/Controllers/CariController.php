<?php

namespace App\Http\Controllers;

use App\Models\Cari;
use App\Models\User;
use Illuminate\Http\Request;
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
            ->paginate(5);

        return view('app.caris.index', compact('caris', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Cari::class);

        $users = User::pluck('name', 'id');

        return view('app.caris.create', compact('users'));
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

        return redirect()
            ->route('caris.edit', $cari)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cari $cari)
    {
        $this->authorize('view', $cari);

        return view('app.caris.show', compact('cari'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cari $cari
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Cari $cari)
    {
        $this->authorize('update', $cari);

        $users = User::pluck('name', 'id');

        return view('app.caris.edit', compact('cari', 'users'));
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

        return redirect()
            ->route('caris.edit', $cari)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('caris.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
