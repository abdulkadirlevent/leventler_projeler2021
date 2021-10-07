@php $editing = isset($cari) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="ticari_unvani"
            label="Ticari Unvani"
            value="{{ old('ticari_unvani', ($editing ? $cari->ticari_unvani : '')) }}"
            maxlength="255"
            placeholder="Ticari Unvani"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="cari_kodu"
            label="Cari Kodu"
            value="{{ old('cari_kodu', ($editing ? $cari->cari_kodu : '')) }}"
            maxlength="255"
            placeholder="Cari Kodu"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="adi"
            label="Adi"
            value="{{ old('adi', ($editing ? $cari->adi : '')) }}"
            maxlength="255"
            placeholder="Adi"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="soyadi"
            label="Soyadi"
            value="{{ old('soyadi', ($editing ? $cari->soyadi : '')) }}"
            maxlength="255"
            placeholder="Soyadi"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="vergi_dairesi"
            label="Vergi Dairesi"
            value="{{ old('vergi_dairesi', ($editing ? $cari->vergi_dairesi : '')) }}"
            maxlength="255"
            placeholder="Vergi Dairesi"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="vergi_no"
            label="Vergi No"
            value="{{ old('vergi_no', ($editing ? $cari->vergi_no : '')) }}"
            placeholder="Vergi No"
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $cari->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
