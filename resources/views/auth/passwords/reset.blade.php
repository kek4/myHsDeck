@extends('layouts.app')

@section('content')
<div class="login-page ls-closed">

   <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">

                <form id="sign_up" role="form" method="POST" novalidate="novalidate" action="{{ url('/password/reset') }}">
                   {{ csrf_field() }}

                   <input type="hidden" name="token" value="{{ $token }}">
                    <div class="msg">Reset your password</div>
                    <div class="input-group {{ $errors->has('email') ? 'error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email Address" required="" aria-required="true" type="email">
                            @if ($errors->has('email'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group {{ $errors->has('password') ? 'error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password" class="form-control" name="password" minlength="6" placeholder="Password" required="" aria-required="true" type="password">
                            @if ($errors->has('password'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group {{ $errors->has('password_confirmation') ? 'error' : '' }}">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input id="password-confirm" class="form-control" name="password_confirmation" minlength="6" placeholder="Confirm Password" required="" aria-required="true" type="password">
                            @if ($errors->has('password_confirmation'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('password_confirmation') }}</strong>
                                 </span>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Reset Password</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="{{ url('/login') }}">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
