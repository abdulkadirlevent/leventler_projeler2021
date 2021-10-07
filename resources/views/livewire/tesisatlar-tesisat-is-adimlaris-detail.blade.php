<div>
    <div class="mb-4">
        @can('create', App\Models\TesisatIsAdimlari::class)
        <button class="btn btn-primary" wire:click="newTesisatIsAdimlari">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\TesisatIsAdimlari::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal
        id="tesisatlar-tesisat-is-adimlaris-modal"
        wire:model="showingModal"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="tesisatIsAdimlari.data_key"
                            label="Data Key"
                            wire:model="tesisatIsAdimlari.data_key"
                            max="255"
                            placeholder="Data Key"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="tesisatIsAdimlari.title"
                            label="Title"
                            wire:model="tesisatIsAdimlari.title"
                            maxlength="255"
                            placeholder="Title"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="tesisatIsAdimlari.tahmin_zaman"
                            label="Tahmin Zaman"
                            wire:model="tesisatIsAdimlari.tahmin_zaman"
                            max="255"
                            step="0.01"
                            placeholder="Tahmin Zaman"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="tesisatIsAdimlari.gerceklesen_zaman"
                            label="Gerceklesen Zaman"
                            wire:model="tesisatIsAdimlari.gerceklesen_zaman"
                            max="255"
                            step="0.01"
                            placeholder="Gerceklesen Zaman"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="tesisatIsAdimlari.kayip_zaman"
                            label="Kayip Zaman"
                            wire:model="tesisatIsAdimlari.kayip_zaman"
                            max="255"
                            step="0.01"
                            placeholder="Kayip Zaman"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="tesisatIsAdimlari.aciklama"
                            label="Aciklama"
                            wire:model="tesisatIsAdimlari.aciklama"
                            maxlength="255"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="tesisatIsAdimlari.ordering"
                            label="Ordering"
                            wire:model="tesisatIsAdimlari.ordering"
                            max="255"
                            placeholder="Ordering"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="tesisatIsAdimlari.state"
                            label="State"
                            wire:model="tesisatIsAdimlari.state"
                            maxlength="255"
                            placeholder="State"
                        ></x-inputs.text>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-right">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.data_key')
                    </th>
                    <th class="text-left">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.title')
                    </th>
                    <th class="text-right">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.tahmin_zaman')
                    </th>
                    <th class="text-right">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.gerceklesen_zaman')
                    </th>
                    <th class="text-right">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.kayip_zaman')
                    </th>
                    <th class="text-left">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.aciklama')
                    </th>
                    <th class="text-right">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.ordering')
                    </th>
                    <th class="text-left">
                        @lang('crud.tesisatlar_tesisat_is_adimlaris.inputs.state')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($tesisatIsAdimlaris as $tesisatIsAdimlari)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $tesisatIsAdimlari->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-right">
                        {{ $tesisatIsAdimlari->data_key ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $tesisatIsAdimlari->title ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $tesisatIsAdimlari->tahmin_zaman ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $tesisatIsAdimlari->gerceklesen_zaman ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $tesisatIsAdimlari->kayip_zaman ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $tesisatIsAdimlari->aciklama ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $tesisatIsAdimlari->ordering ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $tesisatIsAdimlari->state ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $tesisatIsAdimlari)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editTesisatIsAdimlari({{ $tesisatIsAdimlari->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">{{ $tesisatIsAdimlaris->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
