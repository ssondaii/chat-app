@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/user/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    @if(session('status'))
        <input type="hidden" id="status_flg" value="{{ session('status') }}">
    @endif
    <div class="card">
        <div class="card-header">
            {{ trans('user.title') }}
        </div>

        <div class="card-body">
            <button type="button"
                    class="btn btn-outline-success"
                    data-toggle="modal"
                    data-target="#modalCreateNewOAuthClient"
                    style="margin-bottom: 10px;">
                {{ trans('global.button.btn_create') }}
            </button>
            <div class="table-responsive" style="padding: 10px">
                <table class=" table table-bordered table-hover datatable datatable-Client">
                    <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('user.fields.column1') }}</th>
                        <th class="col-2">{{ trans('user.fields.column2') }}</th>
                        <th class="col-3">{{ trans('user.fields.column3') }}</th>
                        <th class="col-4">{{ trans('user.fields.column4') }}</th>
                        <th class="col-2" colspan="2">{{ trans('user.fields.column5') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($clients) && count($client)>0)
                        @foreach($clients as $key => $client)
                            <tr class="row" data-entry-id="{{ $client->id }}">
                                <td class="col-1">{{ $client->id ?? '' }}</td>
                                <td class="col-2">{{ $client->name ?? '' }}</td>
                                <td class="col-3">{{ $client->secret ?? '' }}</td>
                                <td class="col-4">{{ $client->redirect ?? '' }}</td>
                                <td class="col-1">
                                    <button id="edit-[{{ $key }}]"
                                            class="btn btn-xs btn-info"
                                            data-id="{{ $client->id }}"
                                            data-name="{{ $client->name }}"
                                            data-url="{{ $client->redirect }}"
                                            data-toggle="modal"
                                            data-target="#modalEditOAuthClient"
                                    >{{ trans('oauthClient.button.btn-edit') }}</button>
                                </td>
                                <td class="col-1">
                                    <button id="delete-[{{ $key }}]"
                                            class="btn btn-xs btn-danger"
                                            data-id="{{ $client->id }}"
                                            data-name="{{ $client->name }}"
                                            data-url="{{ $client->redirect }}"
                                            data-toggle="modal"
                                            data-target="#modalConfirmDelete"
                                    >{{ trans('oauthClient.button.btn-delete') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
{{--        @if(isset($clients) && count($clients) > 0 && $clients instanceof \Illuminate\Pagination\LengthAwarePaginator )--}}
{{--            <div class="pagination-sm">--}}
{{--                {{ $clients->links() }}--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>

{{--    @include('admin/clients/modal._modalCreateClient')--}}
{{--    @include('admin/clients/modal._modalEditClient')--}}
{{--    @include('admin/clients/modal._modalConfirmDeleteClient')--}}
    @include('admin/modal._modalError')
    @include('admin/modal._modalResult')

@endsection
@section('scripts')
    <script src="{{ asset('js/user/index.js') }}"></script>
    <script src="{{ asset('js/user/validation.js') }}"></script>
@endsection
