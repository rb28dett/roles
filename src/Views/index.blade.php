@extends('rb28dett::layouts.master')
@section('icon', 'ion-ribbon-b')
@section('title', __('rb28dett_roles::general.role_list'))
@section('subtitle', __('rb28dett_roles::general.roles_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_roles::general.home')</a></li>
        <li><span>@lang('rb28dett_roles::general.role_list')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1">
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('rb28dett_roles::general.role_list')
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('rb28dett_roles::general.name')</th>
                                        <th>@lang('rb28dett_roles::general.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse( $roles as $role )
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td style="color:{{ $role->color }}">{{ $role->name }}</td>
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    @can('update', $role)
                                                        <a href="{{ route('rb28dett::roles.edit', ['id' => $role->id]) }}" class="uk-button uk-button-small uk-button-default">
                                                            @lang('rb28dett_roles::general.edit')
                                                        </a>
                                                    @else
                                                        <button disabled="disabled" class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('rb28dett_roles::general.edit')
                                                        </button>
                                                    @endcan
                                                    @can('update', $role)
                                                        <a href="{{ route('rb28dett::roles.permissions', ['id' => $role->id]) }}" class="uk-button uk-button-small uk-button-default">
                                                            @lang('rb28dett_roles::general.permissions')
                                                        </a>
                                                    @else
                                                        <button disabled="disabled" class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('rb28dett_roles::general.permissions')
                                                        </button>
                                                    @endcan
                                                    @can('delete', $role)
                                                        <a href="{{ route('rb28dett::roles.destroy.confirm', ['ticket' => $role->id]) }}" class="uk-button uk-button-small uk-button-danger">
                                                            @lang('rb28dett_roles::general.delete')
                                                        </a>
                                                    @else
                                                        <button disabled="disabled" class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('rb28dett_roles::general.delete')
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $roles->links('rb28dett::layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
