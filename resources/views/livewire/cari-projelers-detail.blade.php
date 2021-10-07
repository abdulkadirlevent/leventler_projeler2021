<div>
    <div class="mb-4">
        @can('create', App\Models\Projeler::class)
        <button class="btn btn-primary" wire:click="newProjeler">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Projeler::class)
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

    <x-modal id="cari-projelers-modal" wire:model="showingModal">
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
                            name="projeler.proje_adi"
                            label="Proje Adi"
                            wire:model="projeler.proje_adi"
                            maxlength="255"
                            placeholder="Proje Adi"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.text
                            name="projeler.sozlezme_no"
                            label="Sozlezme No"
                            wire:model="projeler.sozlezme_no"
                            maxlength="255"
                            placeholder="Sozlezme No"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <div
                            image-url="{{ $editing && $projeler->image ? \Storage::url($projeler->image) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="projelerImage"
                                label="Image"
                            ></x-inputs.partials.label
                            ><br />

                            <!-- Show the image -->
                            <template x-if="imageUrl">
                                <img
                                    :src="imageUrl"
                                    class="
                                        object-cover
                                        rounded
                                        border border-gray-200
                                    "
                                    style="width: 100px; height: 100px;"
                                />
                            </template>

                            <!-- Show the gray box when image is not available -->
                            <template x-if="!imageUrl">
                                <div
                                    class="
                                        border
                                        rounded
                                        border-gray-200
                                        bg-gray-100
                                    "
                                    style="width: 100px; height: 100px;"
                                ></div>
                            </template>

                            <div class="mt-2">
                                <input
                                    type="file"
                                    name="projelerImage"
                                    id="projelerImage{{ $uploadIteration }}"
                                    wire:model="projelerImage"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('projelerImage')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.date
                            name="projelerBaslamaTarihi"
                            label="Baslama Tarihi"
                            wire:model="projelerBaslamaTarihi"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.date
                            name="projelerTeslimTarihi"
                            label="Teslim Tarihi"
                            wire:model="projelerTeslimTarihi"
                            max="255"
                        ></x-inputs.date>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="projeler.birim_fiyati"
                            label="Birim Fiyati"
                            wire:model="projeler.birim_fiyati"
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
                        @lang('crud.cari_projelers.inputs.proje_adi')
                    </th>
                    <th class="text-left">
                        @lang('crud.cari_projelers.inputs.sozlezme_no')
                    </th>
                    <th class="text-left">
                        @lang('crud.cari_projelers.inputs.image')
                    </th>
                    <th class="text-left">
                        @lang('crud.cari_projelers.inputs.baslama_tarihi')
                    </th>
                    <th class="text-left">
                        @lang('crud.cari_projelers.inputs.teslim_tarihi')
                    </th>
                    <th class="text-right">
                        @lang('crud.cari_projelers.inputs.birim_fiyati')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($projelers as $projeler)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $projeler->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $projeler->proje_adi ?? '-' }}</td>
                    <td class="text-left">
                        {{ $projeler->sozlezme_no ?? '-' }}
                    </td>
                    <td class="text-left">
                        <x-partials.thumbnail
                            src="{{ $projeler->image ? \Storage::url($projeler->image) : '' }}"
                        />
                    </td>
                    <td class="text-left">
                        {{ $projeler->baslama_tarihi ?? '-' }}
                    </td>
                    <td class="text-left">
                        {{ $projeler->teslim_tarihi ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $projeler->birim_fiyati ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $projeler)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editProjeler({{ $projeler->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan

                            @can('view', $projeler)
                                <a
                                    href="{{ route('projelers.show', $projeler) }}"
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
                    <td colspan="7">{{ $projelers->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
