<?php

namespace App\Http\Livewire;

use App\Models\Cari;
use Livewire\Component;
use App\Models\Projeler;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CariProjelersDetail extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public Cari $cari;
    public Projeler $projeler;
    public $projelerImage;
    public $uploadIteration = 0;
    public $projelerBaslamaTarihi;
    public $projelerTeslimTarihi;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Projeler';

    protected $rules = [
        'projeler.proje_adi' => ['required', 'max:255', 'string'],
        'projeler.sozlezme_no' => ['required', 'max:255', 'string'],
        'projelerImage' => ['nullable', 'image', 'max:1024'],
        'projelerBaslamaTarihi' => ['required', 'date'],
        'projelerTeslimTarihi' => ['required', 'date'],
        'projeler.birim_fiyati' => ['nullable', 'numeric'],
    ];

    public function mount(Cari $cari)
    {
        $this->cari = $cari;
        $this->resetProjelerData();
    }

    public function resetProjelerData()
    {
        $this->projeler = new Projeler();

        $this->projelerImage = null;
        $this->projelerBaslamaTarihi = null;
        $this->projelerTeslimTarihi = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newProjeler()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.cari_projelers.new_title');
        $this->resetProjelerData();

        $this->showModal();
    }

    public function editProjeler(Projeler $projeler)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.cari_projelers.edit_title');
        $this->projeler = $projeler;

        $this->projelerBaslamaTarihi = $this->projeler->baslama_tarihi->format(
            'Y-m-d'
        );
        $this->projelerTeslimTarihi = $this->projeler->teslim_tarihi->format(
            'Y-m-d'
        );

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }

    public function save()
    {
        $this->validate();

        if (!$this->projeler->cari_id) {
            $this->authorize('create', Projeler::class);

            $this->projeler->cari_id = $this->cari->id;
        } else {
            $this->authorize('update', $this->projeler);
        }

        if ($this->projelerImage) {
            $this->projeler->image = $this->projelerImage->store('public');
        }

        $this->projeler->baslama_tarihi = \Carbon\Carbon::parse(
            $this->projelerBaslamaTarihi
        );
        $this->projeler->teslim_tarihi = \Carbon\Carbon::parse(
            $this->projelerTeslimTarihi
        );

        $this->projeler->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Projeler::class);

        collect($this->selected)->each(function (string $id) {
            $projeler = Projeler::findOrFail($id);

            if ($projeler->image) {
                Storage::delete($projeler->image);
            }

            $projeler->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetProjelerData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->cari->projelers as $projeler) {
            array_push($this->selected, $projeler->id);
        }
    }

    public function render()
    {
        return view('livewire.cari-projelers-detail', [
            'projelers' => $this->cari->projelers()->paginate(20),
        ]);
    }
}
