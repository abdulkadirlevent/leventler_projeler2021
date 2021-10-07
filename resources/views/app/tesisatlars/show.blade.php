@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tesisatlars.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tesisatlars.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tesisatlars.inputs.tesisat_no')</h5>
                    <span>{{ $tesisatlar->tesisat_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tesisatlars.inputs.baslama_tarihi')</h5>
                    <span>{{ $tesisatlar->baslama_tarihi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tesisatlars.inputs.teslim_tarihi')</h5>
                    <span>{{ $tesisatlar->teslim_tarihi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tesisatlars.inputs.projeler_id')</h5>
                    <span
                        >{{ optional($tesisatlar->projeler)->proje_adi ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tesisatlars.inputs.birim_fiyati')</h5>
                    <span>{{ $tesisatlar->birim_fiyati ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('tesisatlars.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Tesisatlar::class)
                <a
                    href="{{ route('tesisatlars.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\TesisatIsAdimlari::class)
        <div class="card mt-1">
            <div class="card-body">
                <h4 class="card-title">Tesisat Is Adimlaris</h4>

                <livewire:tesisatlar-tesisat-is-adimlaris-detail
                    :tesisatlar="$tesisatlar"
                />
            </div>
        </div>
    @endcan
</div>
@endsection
