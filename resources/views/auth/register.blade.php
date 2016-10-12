@extends('layouts.app')

@section('content')
   <div class="signup-page ls-closed">
      <div class="signup-box">
         <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
         </div>
         <div class="card">
            <div class="body">
               <form id="sign_up" role="form" method="POST" novalidate="novalidate" action="{{ url('/register') }}">
                  {{ csrf_field() }}
                  <div class="msg">Register a new membership</div>
                  <div class="input-group {{ $errors->has('name') ? 'error' : '' }}">
                     <span class="input-group-addon">
                        <i class="material-icons">person</i>
                     </span>
                     <div class="form-line">
                        <input id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required="" autofocus="" aria-required="true" type="text">
                        @if ($errors->has('name'))
                           <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="input-group {{ $errors->has('email') ? 'error' : '' }}">
                     <span class="input-group-addon">
                        <i class="material-icons">email</i>
                     </span>
                     <div class="form-line">
                        <input id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required="" aria-required="true" type="email">
                        @if ($errors->has('email'))
                           <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>
                  <div class="input-group{{ $errors->has('password') ? 'error' : '' }}">
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
                  <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>
                  <div class="m-t-25 m-b--5 align-center">
                     <a href="{{ url('/login') }}">You already have a membership?</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
