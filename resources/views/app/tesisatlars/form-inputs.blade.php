@php $editing = isset($tesisatlar) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tesisat_no"
            label="Tesisat No"
            value="{{ old('tesisat_no', ($editing ? $tesisatlar->tesisat_no : '')) }}"
            maxlength="255"
            placeholder="Tesisat No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="baslama_tarihi"
            label="Baslama Tarihi"
            value="{{ old('baslama_tarihi', ($editing ? optional($tesisatlar->baslama_tarihi)->format('Y-m-d') : '')) }}"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="teslim_tarihi"
            label="Teslim Tarihi"
            value="{{ old('teslim_tarihi', ($editing ? optional($tesisatlar->teslim_tarihi)->format('Y-m-d') : '')) }}"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="projeler_id" label="Projeler" required>
            @php $selected = old('projeler_id', ($editing ? $tesisatlar->projeler_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Projeler</option>
            @foreach($projelers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="birim_fiyati"
            label="Birim Fiyati"
            value="{{ old('birim_fiyati', ($editing ? $tesisatlar->birim_fiyati : '')) }}"
            step="0.01"
            placeholder="Birim Fiyati"
        ></x-inputs.number>
    </x-inputs.group>
</div>
