<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Projeler;
use App\Models\Tesisatlar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjelerTesisatlarsDetail extends Component
{
    use AuthorizesRequests;

    public Projeler $projeler;
    public Tesisatlar $tesisatlar;
    public $tesisatlarBaslamaTarihi;
    public $tesisatlarTeslimTarihi;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Tesisatlar';

    protected $rules = [
        'tesisatlar.tesisat_no' => ['required', 'max:255', 'string'],
        'tesisatlarBaslamaTarihi' => ['required', 'date'],
        'tesisatlarTeslimTarihi' => ['required', 'date'],
        'tesisatlar.birim_fiyati' => ['nullable', 'numeric'],
    ];

    public function mount(Projeler $projeler)
    {
        $this->projeler = $projeler;
        $this->resetTesisatlarData();
    }

    public function resetTesisatlarData()
    {
        $this->tesisatlar = new Tesisatlar();

        $this->tesisatlarBaslamaTarihi = null;
        $this->tesisatlarTeslimTarihi = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTesisatlar()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.projeler_tesisatlars.new_title');
        $this->resetTesisatlarData();

        $this->showModal();
    }

    public function editTesisatlar(Tesisatlar $tesisatlar)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.projeler_tesisatlars.edit_title');
        $this->tesisatlar = $tesisatlar;

        $this->tesisatlarBaslamaTarihi = $this->tesisatlar->baslama_tarihi->format(
            'Y-m-d'
        );
        $this->tesisatlarTeslimTarihi = $this->tesisatlar->teslim_tarihi->format(
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

        if (!$this->tesisatlar->projeler_id) {
            $this->authorize('create', Tesisatlar::class);

            $this->tesisatlar->projeler_id = $this->projeler->id;
        } else {
            $this->authorize('update', $this->tesisatlar);
        }

        $this->tesisatlar->baslama_tarihi = \Carbon\Carbon::parse(
            $this->tesisatlarBaslamaTarihi
        );
        $this->tesisatlar->teslim_tarihi = \Carbon\Carbon::parse(
            $this->tesisatlarTeslimTarihi
        );

        $this->tesisatlar->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Tesisatlar::class);

        Tesisatlar::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetTesisatlarData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->projeler->tesisatlars as $tesisatlar) {
            array_push($this->selected, $tesisatlar->id);
        }
    }

    public function render()
    {
        return view('livewire.projeler-tesisatlars-detail', [
            'tesisatlars' => $this->projeler->tesisatlars()->paginate(20),
        ]);
    }
}
