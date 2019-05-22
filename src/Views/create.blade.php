@extends('rb28dett::layouts.master')
@section('icon', 'ion-plus-round')
@section('title', __('rb28dett_roles::general.create_role'))
@section('subtitle', __('rb28dett_roles::general.create_role_desc'))
@section('breadcrumb')
	<ul class="uk-breadcrumb">
		<li><a href="{{ route('rb28dett::index') }}">@lang('rb28dett_roles::general.home')</a></li>
		<li><a href="{{ route('rb28dett::roles.index') }}">@lang('rb28dett_roles::general.role_list')</a></li>
		<li><span>@lang('rb28dett_roles::general.create_role')</span></li>
	</ul>
@endsection
@section('content')
	<div class="uk-container uk-container-large">
		<div uk-grid>
			<div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
			<div class="uk-width-1-1@s uk-width-3-5@l uk-width-1-3@xl">
				<div class="uk-card uk-card-default">
					<div class="uk-card-header">
						@lang('rb28dett_roles::general.create_role')
					</div>
					<div class="uk-card-body">
						<form method="POST" action="{{ route('rb28dett::roles.store') }}" class="uk-form-stacked">
							{{ csrf_field() }}
							<fieldset class="uk-fieldset">
								<div class="uk-margin">
									<label class="uk-form-label">
										@lang('rb28dett_roles::general.name') <span class="uk-text-danger">*</span>
									</label>
									<input value="{{ old('name') }}" name="name" class="uk-input" type="text" placeholder="@lang('rb28dett_roles::general.name')">
								</div>
								<div class="uk-margin">
									<label class="uk-form-label">
										@lang('rb28dett_roles::general.color') <span class="uk-text-danger">*</span>
									</label>
									<input value="{{ old('color') }}" name="color" class="uk-input" type="color" placeholder="@lang('rb28dett_roles::general.color')">
								</div>
								<div class="uk-margin">
									<label class="uk-form-label">
										@lang('rb28dett_roles::general.description') <span class="uk-text-danger">*</span>
									</label>
									<div class="uk-form-controls">
										<textarea name="description" class="uk-textarea" rows="5" placeholder="{{ __('rb28dett_roles::general.description') }}">{{ old('description', isset($role) ? $role->description : '') }}</textarea>
									</div>
								</div>
								<div class="uk-margin">
									<a href="{{ route('rb28dett::roles.index') }}" class="uk-align-left uk-button uk-button-default">@lang('rb28dett_roles::general.cancel')</a>
									<button type="submit" class="uk-button uk-button-primary uk-align-right">
										<span class="ion-forward"></span>&nbsp; @lang('rb28dett_roles::general.create')
									</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="uk-width-1-1@s uk-width-1-5@l uk-width-1-3@xl"></div>
		</div>
	</div>
@endsection
