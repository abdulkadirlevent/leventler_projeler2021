<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Cari;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserCarisDetail extends Component
{
    use AuthorizesRequests;

    public User $user;
    public Cari $cari;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Cari';

    protected $rules = [
        'cari.ticari_unvani' => ['required', 'max:255', 'string'],
        'cari.cari_kodu' => ['required', 'max:255', 'string'],
        'cari.adi' => ['required', 'max:255', 'string'],
        'cari.soyadi' => ['required', 'max:255', 'string'],
        'cari.vergi_dairesi' => ['nullable', 'max:255', 'string'],
        'cari.vergi_no' => ['nullable', 'numeric'],
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->resetCariData();
    }

    public function resetCariData()
    {
        $this->cari = new Cari();

        $this->dispatchBrowserEvent('refresh');
    }

    public function newCari()
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.user_caris.new_title');
        $this->resetCariData();

        $this->showModal();
    }

    public function editCari(Cari $cari)
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.user_caris.edit_title');
        $this->cari = $cari;

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

        if (!$this->cari->user_id) {
            $this->authorize('create', Cari::class);

            $this->cari->user_id = $this->user->id;
        } else {
            $this->authorize('update', $this->cari);
        }

        $this->cari->save();

        $this->hideModal();
    }

    public function destroySelected()
    {
        $this->authorize('delete-any', Cari::class);

        Cari::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetCariData();
    }

    public function toggleFullSelection()
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->user->caris as $cari) {
            array_push($this->selected, $cari->id);
        }
    }

    public function render()
    {
        return view('livewire.user-caris-detail', [
            'caris' => $this->user->caris()->paginate(20),
        ]);
    }
}
