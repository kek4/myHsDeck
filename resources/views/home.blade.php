@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in!
                    <h4>{{Auth::User()->name}}</h4>
                    <h4>{{Auth::User()->email}}</h4>
                    <img src="{{Auth::User()->avatar}}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
