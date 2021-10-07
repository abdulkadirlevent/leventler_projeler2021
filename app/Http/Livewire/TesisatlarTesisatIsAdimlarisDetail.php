<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tesisatlar;
use App\Models\TesisatIsAdimlari;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TesisatlarTesisatIsAdimlarisDetail extends Component
{
    use AuthorizesRequests;

    public Tesisatlar $tesisatlar;
    public TesisatIsAdimlari $tesisatIsAdimlari;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New TesisatIsAdimlari';

    protected $rules = [
        'tesisatIsAdimlari.data_key' => ['required', 'numeric'],
        'tesisatIsAdimlari.title' => ['required', 'max:255', 'string'],
        'tesisatIsAdimlari.tahmin_zaman' => ['required', 'numeric'],
        'tesisatIsAdimlari.gerceklesen_zaman' => ['required', 'numeric'],
        'tesisatIsAdimlari.kayip_zaman' => ['required', 'numeric'],
        'tesisatIsAdimlari.aciklama' => ['required', 'max:255', 'string'],
        'tesisatIsAdimlari.ordering' => ['required', 'numeric'],
        'tesisatIsAdimlari.state' => ['required', 'max:255'],
    ];

    public function mount(Tesisatlar $tesisatlar)
    {
        $this->tesisatlar = $tesisatlar;
        $this->resetTesisatIsAdimlariData();
    }

    public function resetTesisatIsAdimlariData()
    {
        $this->tesisatIsAdimlari = new TesisatIsAdimlari();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTesisatIsAdimlari()
    {
        $this->editing = false;
        $this->modalTitle = trans(
            'crud.tesisatlar_tesisat_is_adimlaris.new_title'
        );
        $this->resetTesisatIsAdimlariData();

        $this->showModal();
    }

    public function editTesisatIsAdimlari(TesisatIsAdimlari $tesisatIsAdimlari)
    {
        $this->editing = true;
        $this->modalTitle = trans(
            'crud.tesisatlar_tesisat_is_adimlaris.edit_title'
        );
        $this->tesisatIsAdimlari = $tesisatIsAdimlari;

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

        if (!$this->tesisatIsAdimlari->tesisatlar_id) {
            $this->authorize('create', TesisatIsAdimlari::class);

            $this->tesisatIsAdimlari->tesisatlar_id = $this->tesisatlar->id;
        } else {
            $this->authorize('update', $this->tesisatIsAdimlari);
        }

        $this->tesisatIsAdimlari->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', TesisatIsAdimlari::class);

        TesisatIsAdimlari::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTesisatIsAdimlariData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->tesisatlar->tesisatIsAdimlaris as $tesisatIsAdimlari) {
            array_push($this->selected, $tesisatIsAdimlari->id);
        }
    }

    public function render()
    {
        return view('livewire.tesisatlar-tesisat-is-adimlaris-detail', [
            'tesisatIsAdimlaris' => $this->tesisatlar
                ->tesisatIsAdimlaris()
                ->paginate(20),
        ]);
    }
}
