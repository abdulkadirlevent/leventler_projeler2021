@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.projelers.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Projeler::class)
                        <a
                            href="{{ route('projelers.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.projelers.inputs.cari_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.projelers.inputs.proje_adi')
                            </th>
                            <th class="text-left">
                                @lang('crud.projelers.inputs.sozlezme_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.projelers.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.projelers.inputs.baslama_tarihi')
                            </th>
                            <th class="text-left">
                                @lang('crud.projelers.inputs.teslim_tarihi')
                            </th>
                            <th class="text-right">
                                @lang('crud.projelers.inputs.birim_fiyati')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projelers as $projeler)
                        <tr>
                            <td>
                                {{ optional($projeler->cari)->ticari_unvani ??
                                '-' }}
                            </td>
                            <td>{{ $projeler->proje_adi ?? '-' }}</td>
                            <td>{{ $projeler->sozlezme_no ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $projeler->image ? \Storage::url($projeler->image) : '' }}"
                                />
                            </td>
                            <td>{{ $projeler->baslama_tarihi ?? '-' }}</td>
                            <td>{{ $projeler->teslim_tarihi ?? '-' }}</td>
                            <td>{{ $projeler->birim_fiyati ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $projeler)
                                    <a
                                        href="{{ route('projelers.edit', $projeler) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $projeler)
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
                                    @endcan @can('delete', $projeler)
                                    <form
                                        action="{{ route('projelers.destroy', $projeler) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">{!! $projelers->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
