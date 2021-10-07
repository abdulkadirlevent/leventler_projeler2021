<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\CariResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CariCollection;

class UserCarisController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $caris = $user
            ->caris()
            ->search($search)
            ->latest()
            ->paginate();

        return new CariCollection($caris);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Cari::class);

        $validated = $request->validate([
            'ticari_unvani' => ['required', 'max:255', 'string'],
            'cari_kodu' => ['required', 'max:255', 'string'],
            'adi' => ['required', 'max:255', 'string'],
            'soyadi' => ['required', 'max:255', 'string'],
            'vergi_dairesi' => ['nullable', 'max:255', 'string'],
            'vergi_no' => ['nullable', 'numeric'],
        ]);

        $cari = $user->caris()->create($validated);

        return new CariResource($cari);
    }
}
