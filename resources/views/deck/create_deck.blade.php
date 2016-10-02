@extends('layouts.app')
@section('css')
   @parent
@endsection
@section('js')
   @parent
   <script src="{{ asset('angularJS/DeckController.js') }}"></script>
@endsection
@section('content')
   <div id="content" ng-controller="DeckController">
      <uib-tabset active="activeJustified" justified="true">
       <uib-tab index="0" heading="Paladin">
          <div class="row">
            <div class="col-md-3" ng-repeat="card in deckpaladin" ng-show="card.type != 'Hero'" >
                 <img src="#{ card.img }#" alt="#{ card.name }#">
                 <h4>#{ card.text }#</h4>
            </div>
          </div>
             <pagination
             ng-model="data.currentPage"
             total-items="paladin.length"
             max-size="maxSize"
             boundary-links="true">
          </pagination>
       </uib-tab>
       <uib-tab index="1" heading="Mage">
          <div class="row">
            <div class="col-md-3" ng-repeat="card in deckmage" ng-show="card.type != 'Hero'" >
                 <img src="#{ card.img }#" alt="#{ card.name }#">
                 <h4>#{ card.name }#</h4>
            </div>
          </div>
          {{-- <pagination
            ng-model="currentPage"
            total-items="todos.length"
            max-size="maxSize"
            boundary-links="true">
          </pagination> --}}
       </uib-tab>
       <uib-tab index="2" heading="Priest">
          <div class="row">
            <div class="col-md-3" ng-repeat="card in deckpriest" ng-show="card.type != 'Hero'" >
                 <img src="#{ card.img }#" alt="#{ card.name }#">
                 <h4>#{ card.name }#</h4>
            </div>
          </div>
          {{-- <pagination
            ng-model="currentPage"
            total-items="todos.length"
            max-size="maxSize"
            boundary-links="true">
          </pagination> --}}
       </uib-tab>
     </uib-tabset>

   </div>
@endsection
