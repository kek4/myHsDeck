<!DOCTYPE html>
<html lang="fr" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet">
    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
   <header id="bandeau">
      <a href="{{ url('/home') }}" class="header-logo">
         <img src="http://eu.battle.net/hearthstone/static/images/logos/logo-sub.png" alt="Hearthstone: Heroes of Warcraft – site officiel">
      </a>
   </header>
 <div class="row" id="content" ng-controller="DeckController">

    <aside id="rightsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
         <div class="image">
            <img src="../../images/user.png" alt="User" width="48" height="48">
         </div>
         <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
            <div class="email">john.doe@example.com</div>
            <div class="btn-group user-helper-dropdown">
               <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
               <ul class="dropdown-menu pull-right">
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block"><i class="material-icons">person</i>Profile</a></li>
                  <li role="seperator" class="divider"></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block"><i class="material-icons">group</i>Followers</a></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block"><i class="material-icons">shopping_cart</i>Sales</a></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block"><i class="material-icons">favorite</i>Likes</a></li>
                  <li role="seperator" class="divider"></li>
                  <li><a href="javascript:void(0);" class=" waves-effect waves-block"><i class="material-icons">input</i>Sign Out</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- #User Info -->
      <div class="menu">
         <ul class="list">
            <li>
               <a href="" ng-click="save()">
                  {{-- ng-if="deck.totalCards == 30" --}}
                  <span>Save</span>
               </a>
               <a href="" ng-click="clean()">
                  <span>Clean</span>
               </a>
               <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                  <i class="material-icons">trending_down</i>
                  <span>Mes deck</span>
               </a>
               <ul class="ml-menu">
                  <li>
                     <a href="" class=" waves-effect waves-block">
                        <span>Hunter</span>
                     </a>
                  </li>
               <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                  <i class="material-icons">trending_down</i>
                  <span>Créer un deck</span>
               </a>
               <ul class="ml-menu">
                  <li>
                     <a href="{{ url('deck/list/Hunter') }}" class=" waves-effect waves-block">
                        <span>Hunter</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Warrior') }}" class=" waves-effect waves-block">
                        <span>Warrior</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Mage') }}" class=" waves-effect waves-block">
                        <span>Mage</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Paladin') }}" class=" waves-effect waves-block">
                        <span>Paladin</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Rogue') }}" class=" waves-effect waves-block">
                        <span>Rogue</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Priest') }}" class=" waves-effect waves-block">
                        <span>Priest</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Warlock') }}" class=" waves-effect waves-block">
                        <span>Warlock</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Shaman') }}" class=" waves-effect waves-block">
                        <span>Shaman</span>
                     </a>
                  </li>
                  <li>
                     <a href="{{ url('deck/list/Druid') }}" class=" waves-effect waves-block">
                        <span>Druid</span>
                     </a>
                  </li>
               </ul>
               <div class="row">
                  <div ng-repeat="card in deck.deck | orderBy : ['cost','name']">
                     <a href="" ng-click="deleteCard(card)"><img src="../../images/token-gallery/#{card.id}#.png" alt="" />#{card.name}#</a>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </aside>
   <div class="col-md-9">
      @yield('content')
   </div>

</div>
@section('js')
   <!-- Jquery Core Js -->
   <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

   <!-- Bootstrap Core Js -->
   <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

   <!-- Waves Effect Plugin Js -->
   <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

   <!-- Validation Plugin Js -->
   <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
   <!-- Underscore -->
   <script src="{{ asset('bower_components/underscore/underscore-min.js') }}" charset="utf-8"></script>
   <!-- Custom Js -->
   <script src="{{ asset('js/admin.js') }}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular-animate.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-sanitize.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-touch.js"></script>
   <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.1.4.js"></script>
   <script src="{{ asset('angularJS/AppController.js') }}"></script>
   <script src="{{ asset('js/login.js') }}"></script>
@show
</body>
</html>
