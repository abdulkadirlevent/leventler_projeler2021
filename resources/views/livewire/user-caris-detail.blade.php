<div>
    <div class="mb-4">
        @can('create', App\Models\Cari::class)
        <button class="btn btn-primary" wire:click="newCari">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Cari::class)
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

    <x-modal id="user-caris-modal" wire:model="showingModal">
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
                            name="cari.ticari_unvani"
                            label="Ticari Unvani"
                            wire:model="cari.ticari_unvani"
                            maxlength="255"
                            placeholder="Ticari Unvani"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="cari.cari_kodu"
                            label="Cari Kodu"
                            wire:model="cari.cari_kodu"
                            maxlength="255"
                            placeholder="Cari Kodu"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="cari.adi"
                            label="Adi"
                            wire:model="cari.adi"
                            maxlength="255"
                            placeholder="Adi"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="cari.soyadi"
                            label="Soyadi"
                            wire:model="cari.soyadi"
                            maxlength="255"
                            placeholder="Soyadi"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="cari.vergi_dairesi"
                            label="Vergi Dairesi"
                            wire:model="cari.vergi_dairesi"
                            maxlength="255"
                            placeholder="Vergi Dairesi"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="cari.vergi_no"
                            label="Vergi No"
                            wire:model="cari.vergi_no"
                            max="255"
                            placeholder="Vergi No"
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
                        @lang('crud.user_caris.inputs.ticari_unvani')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_caris.inputs.cari_kodu')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_caris.inputs.adi')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_caris.inputs.soyadi')
                    </th>
                    <th class="text-left">
                        @lang('crud.user_caris.inputs.vergi_dairesi')
                    </th>
                    <th class="text-right">
                        @lang('crud.user_caris.inputs.vergi_no')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($caris as $cari)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $cari->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $cari->ticari_unvani ?? '-' }}</td>
                    <td class="text-left">{{ $cari->cari_kodu ?? '-' }}</td>
                    <td class="text-left">{{ $cari->adi ?? '-' }}</td>
                    <td class="text-left">{{ $cari->soyadi ?? '-' }}</td>
                    <td class="text-left">{{ $cari->vergi_dairesi ?? '-' }}</td>
                    <td class="text-right">{{ $cari->vergi_no ?? '-' }}</td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $cari)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editCari({{ $cari->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan

                            @can('view', $cari)
                                <a href="{{ route('caris.show', $cari) }}">
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
                    <td colspan="7">{{ $caris->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
