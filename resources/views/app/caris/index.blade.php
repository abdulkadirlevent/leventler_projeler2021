@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.caris.index_title')</h4>
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
                        @can('create', App\Models\Cari::class)
                        <a
                            href="{{ route('caris.create') }}"
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
                                @lang('crud.caris.inputs.ticari_unvani')
                            </th>
                            <th class="text-left">
                                @lang('crud.caris.inputs.cari_kodu')
                            </th>
                            <th class="text-left">
                                @lang('crud.caris.inputs.adi')
                            </th>
                            <th class="text-left">
                                @lang('crud.caris.inputs.soyadi')
                            </th>
                            <th class="text-left">
                                @lang('crud.caris.inputs.vergi_dairesi')
                            </th>
                            <th class="text-right">
                                @lang('crud.caris.inputs.vergi_no')
                            </th>
                            <th class="text-left">
                                @lang('crud.caris.inputs.user_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($caris as $cari)
                        <tr>
                            <td>{{ $cari->ticari_unvani ?? '-' }}</td>
                            <td>{{ $cari->cari_kodu ?? '-' }}</td>
                            <td>{{ $cari->adi ?? '-' }}</td>
                            <td>{{ $cari->soyadi ?? '-' }}</td>
                            <td>{{ $cari->vergi_dairesi ?? '-' }}</td>
                            <td>{{ $cari->vergi_no ?? '-' }}</td>
                            <td>{{ optional($cari->user)->name ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $cari)
                                    <a href="{{ route('caris.edit', $cari) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $cari)
                                    <a href="{{ route('caris.show', $cari) }}">
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $cari)
                                    <form
                                        action="{{ route('caris.destroy', $cari) }}"
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
                            <td colspan="8">{!! $caris->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
