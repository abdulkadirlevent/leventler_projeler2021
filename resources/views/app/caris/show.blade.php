@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('caris.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.caris.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.ticari_unvani')</h5>
                    <span>{{ $cari->ticari_unvani ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.cari_kodu')</h5>
                    <span>{{ $cari->cari_kodu ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.adi')</h5>
                    <span>{{ $cari->adi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.soyadi')</h5>
                    <span>{{ $cari->soyadi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.vergi_dairesi')</h5>
                    <span>{{ $cari->vergi_dairesi ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.vergi_no')</h5>
                    <span>{{ $cari->vergi_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caris.inputs.user_id')</h5>
                    <span>{{ optional($cari->user)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('caris.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Cari::class)
                <a href="{{ route('caris.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    @can('view-any', App\Models\Projeler::class)
        <div class="card mt-1">
            <div class="card-body">
                <h4 class="card-title">Projelers</h4>

                <livewire:cari-projelers-detail :cari="$cari" />
            </div>
        </div>
    @endcan

</div>
@endsection
