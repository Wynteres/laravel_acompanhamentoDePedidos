@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <div class="row">
      <div class="col-sm-7  col-md-5 col-lg-4 mx-auto card-wrapper">
        <div class="card custom-card card-signin my-5">
          <div class="card-body">
            <div class="mt-2 text-right">
                <img src="{{ asset('images/logo_kroton-login.png') }}" class="img-fluid logo-cliente"> <br>
            </div>

            <hr class="my-4">            

            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-sm-10 offset-sm-1">
                        <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                    <div class="col-sm-10 offset-sm-1">
                        <input id="password" type="password" class="form-control" placeholder="Senha" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="form-group">
                    <div class="col-md-6 offset-md-3 text-center">
                        <button type="submit" class="login-button btn btn-primary">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection