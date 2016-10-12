@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="fp-page ls-closed">
   @if (session('status'))
      <div class="alert alert-success">
           {{ session('status') }}
      </div>
   @endif
   <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" role="form" method="POST" novalidate="novalidate" action="{{ url('/password/email') }}">
                   {{ csrf_field() }}
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required="" autofocus="" aria-required="true" type="email">
                            @if ($errors->has('email'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>
                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{ url('/login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
