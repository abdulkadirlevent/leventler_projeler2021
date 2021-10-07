@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('projelers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.projelers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.cari_id')</h5>
                    <span
                        >{{ optional($projeler->cari)->ticari_unvani ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.proje_adi')</h5>
                    <span>{{ $projeler->proje_adi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.sozlezme_no')</h5>
                    <span>{{ $projeler->sozlezme_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $projeler->image ? \Storage::url($projeler->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.baslama_tarihi')</h5>
                    <span>{{ $projeler->baslama_tarihi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.teslim_tarihi')</h5>
                    <span>{{ $projeler->teslim_tarihi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projelers.inputs.birim_fiyati')</h5>
                    <span>{{ $projeler->birim_fiyati ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('projelers.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Projeler::class)
                <a href="{{ route('projelers.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Tesisatlar::class)
        <div class="card mt-1">
            <div class="card-body">
                <h4 class="card-title">Tesisatlars</h4>

                <livewire:projeler-tesisatlars-detail :projeler="$projeler" />
            </div>
        </div>
    @endcan
</div>
@endsection
