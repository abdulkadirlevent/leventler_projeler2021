@php $editing = isset($projeler) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="cari_id" label="Cari" required>
            @php $selected = old('cari_id', ($editing ? $projeler->cari_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Cari</option>
            @foreach($caris as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="proje_adi"
            label="Proje Adi"
            value="{{ old('proje_adi', ($editing ? $projeler->proje_adi : '')) }}"
            maxlength="255"
            placeholder="Proje Adi"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="sozlezme_no"
            label="Sozlezme No"
            value="{{ old('sozlezme_no', ($editing ? $projeler->sozlezme_no : '')) }}"
            maxlength="255"
            placeholder="Sozlezme No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $projeler->image ? \Storage::url($projeler->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="baslama_tarihi"
            label="Baslama Tarihi"
            value="{{ old('baslama_tarihi', ($editing ? optional($projeler->baslama_tarihi)->format('Y-m-d') : '')) }}"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="teslim_tarihi"
            label="Teslim Tarihi"
            value="{{ old('teslim_tarihi', ($editing ? optional($projeler->teslim_tarihi)->format('Y-m-d') : '')) }}"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="birim_fiyati"
            label="Birim Fiyati"
            value="{{ old('birim_fiyati', ($editing ? $projeler->birim_fiyati : '')) }}"
            step="0.01"
            placeholder="Birim Fiyati"
        ></x-inputs.number>
    </x-inputs.group>
</div>
