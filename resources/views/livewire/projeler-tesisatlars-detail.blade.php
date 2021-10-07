<div>
    <div class="mb-4">
        @can('create', App\Models\Tesisatlar::class)
        <button class="btn btn-primary" wire:click="newTesisatlar">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Tesisatlar::class)
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

    <x-modal id="projeler-tesisatlars-modal" wire:model="showingModal">
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
                        <x-inputs.text
                            name="tesisatlar.tesisat_no"
                            label="Tesisat No"
                            wire:model="tesisatlar.tesisat_no"
                            maxlength="255"
                            placeholder="Tesisat No"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.date
                            name="tesisatlarBaslamaTarihi"
                            label="Baslama Tarihi"
                            wire:model="tesisatlarBaslamaTarihi"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.date
                            name="tesisatlarTeslimTarihi"
                            label="Teslim Tarihi"
                            wire:model="tesisatlarTeslimTarihi"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="tesisatlar.birim_fiyati"
                            label="Birim Fiyati"
                            wire:model="tesisatlar.birim_fiyati"
                            max="255"
                            step="0.01"
                            placeholder="Birim Fiyati"
                        ></x-inputs.number>
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
                    <th class="text-left">
                        @lang('crud.projeler_tesisatlars.inputs.tesisat_no')
                    </th>
                    <th class="text-left">
                        @lang('crud.projeler_tesisatlars.inputs.baslama_tarihi')
                    </th>
                    <th class="text-left">
                        @lang('crud.projeler_tesisatlars.inputs.teslim_tarihi')
                    </th>
                    <th class="text-right">
                        @lang('crud.projeler_tesisatlars.inputs.birim_fiyati')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($tesisatlars as $tesisatlar)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $tesisatlar->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ $tesisatlar->tesisat_no ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $tesisatlar->baslama_tarihi ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $tesisatlar->teslim_tarihi ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $tesisatlar->birim_fiyati ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $tesisatlar)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editTesisatlar({{ $tesisatlar->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan

                            @can('view', $tesisatlar)
                                <a
                                    href="{{ route('tesisatlars.show', $tesisatlar) }}"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-light"
                                    >
                                        <i class="icon ion-md-eye"></i>
                                    </button>
                                </a>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">{{ $tesisatlars->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
