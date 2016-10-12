@extends('layouts.app')

@section('content')
   <div class="login-page ls-closed">
      <div class="login-box">
         <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
         </div>
         <div class="card">
            <div class="body">
               <form id="sign_in" method="POST" role="form" novalidate="novalidate" action="{{ url('/login') }}">
                  {{ csrf_field() }}
                  <div class="msg">Bienvenue</div>
                  <div class="input-group {{ $errors->has('email') ? 'error' : '' }}">
                     <span class="input-group-addon">
                        <i class="material-icons">person</i>
                     </span>
                     <div class="form-line">
                        <input id="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}" required="" autofocus="" aria-required="true" type="email">
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
                        <input id="password" class="form-control" name="password" placeholder="Password" required="" aria-required="true" type="password">
                        @if ($errors->has('password'))
                           <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-xs-8 p-t-5">
                        <input name="remember" id="rememberme" class="filled-in chk-col-pink" type="checkbox">
                        <label for="remember">Remember Me</label>
                     </div>
                     <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">Login</button>
                     </div>
                  </div>
                  <a href="facebook">FB Login</a>
                  <div class="row m-t-15 m-b--20">
                     <div class="col-xs-6">
                        <a href="{{ url('/register') }}">Register</a>
                     </div>
                     <div class="col-xs-6 align-right">
                        <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
