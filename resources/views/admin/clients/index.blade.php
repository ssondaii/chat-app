@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/OAuthClient/index.css') }}" rel="stylesheet">
@endsection
@section('content')
@if(session('status'))
    <input type="hidden" id="status_flg" value="{{ session('status') }}">
@endif
<div class="card">
    <div class="card-header">
        {{ trans('oauthClient.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <button type="button"
                class="btn btn-outline-success"
                data-toggle="modal"
                data-target="#modalCreateNewOAuthClient"
                style="margin-bottom: 10px;">
            {{ trans('oauthClient.button.create') }}
        </button>
        <div class="table-responsive">
            <table class=" table table-bordered table-hover datatable datatable-Client">
                <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('oauthClient.fields.id') }}</th>
                        <th class="col-2">{{ trans('oauthClient.fields.name') }}</th>
                        <th class="col-3">{{ trans('oauthClient.fields.secret') }}</th>
                        <th class="col-4">{{ trans('oauthClient.fields.url') }}</th>
                        <th class="col-2" colspan="2">{{ trans('oauthClient.fields.action') }}</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($clients) && count($clients) > 0 && $clients instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <div class="pagination-sm">
            {{ $clients->links() }}
        </div>
    @endif
</div>

@include('admin/clients/modal._modalCreateClient')
@include('admin/clients/modal._modalEditClient')
@include('admin/clients/modal._modalConfirmDeleteClient')
@include('admin/clients/modal._modalError')
@include('admin/clients/modal._modalResult')

@endsection
@section('scripts')
    <script src="{{ asset('js/OauthClient/index.js') }}"></script>
    <script src="{{ asset('js/OauthClient/validation.js') }}"></script>
@endsection
