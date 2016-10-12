@extends('layouts.layout')
@section('css')
   @parent
@endsection
@section('js')
   @parent
   <script src="{{ asset('angularJS/DeckController.js') }}"></script>
@endsection
@section('content')
   #{ class }#
   #{ deck.totalCards }#
   <div id="classController" data-class="{{ $class }}">
      <uib-tabset active="active">
       <uib-tab index="0" heading="{{ $class }}">
          <div class="row">
            <div class="col-md-3" ng-repeat="card in classcards" ng-if="card.type != 'Hero'">
                 <a href="" ng-click="addCard(card)"><img src="#{ card.img }#" alt="#{ card.name }#" ng-class="selectable(card) ? 'not-selectable' : ''"></a>
            </div>
          </div>
       </uib-tab>
       <uib-tab index="1" heading="Neutre">
          <div class="row">
            <div class="col-md-3" ng-repeat="card in neutralcards" ng-if="card.type != 'Hero' && !card.hasOwnProperty('playerClass')">
                 <a href="" ng-click="addCard(card)"><img src="#{ card.img }#" alt="#{ card.type }#" ng-class="selectable(card) ? 'not-selectable' : ''"></a>
            </div>
          </div>
       </uib-tab>
     </uib-tabset>
   </div>
@endsection
