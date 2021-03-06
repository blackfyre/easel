@extends('canvas::backend.profile.layout')

@section('title')
    <title>{{ Settings::blogTitle() }} | Edit Privacy</title>
@stop

@section('profile-content')
  @parent

  <div class="pmb-block">
      <div class="pmbb-header">
          <h2><i class="zmdi zmdi-shield-security m-r-10"></i> Change Password</h2>
      </div>

      <div class="pmbb-body p-l-30">
          @include('canvas::backend.profile.partials.form.password')
      </div>
  </div>
@stop

@section('unique-js')
    {!! JsValidator::formRequest('Canvas\Http\Requests\PasswordUpdateRequest', '#passwordUpdate') !!}
    @include('canvas::backend.shared.components.show-password', ['inputs' => 'input[name="password"], input[name="new_password"], input[name="new_password_confirmation"]'])

    @if(Session::get('_passwordUpdate'))
        @include('canvas::backend.partials.notify', ['section' => '_passwordUpdate'])
        {{ \Session::forget('_passwordUpdate') }}
    @endif
@stop
