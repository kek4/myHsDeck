app.controller('DeckController', function DeckController($scope, $http, $filter) {
   // Get the current class in data-class attribut
   $scope.class = angular.element(document.querySelector('#classController')).attr('data-class');
   // Get full set of a class cards in Json
   $http.get('/deck/class-list/'+$scope.class+'/1').then(function(response){
      $scope.classcards = response.data;
   });
   // Get full set of neutral cards in Json
   $http.get('/deck/neutral-list').then(function(response){
      $scope.neutralcards = response.data;
   });

   // Deck initialisation
   $scope.deck = {"deck":[], "totalCards":0};
   // Put a card in the deck
   $scope.addCard = function(card) {
      if ($scope.deck.totalCards != 30) {
         if ($scope.deck.deck.length < 1) {
            var newCard = {id:card.cardId, number:1, rarity:card.rarity, name:card.name, cost:card.cost};
            $scope.deck.deck.push(newCard);
         }else{
            var currentCard = $filter('filter')($scope.deck.deck, {id:card.cardId})[0];
            // If the current card is not in the deck
            if (angular.isUndefined(currentCard)) {
               var newCard = {id:card.cardId, number:1, rarity:card.rarity, name:card.name, cost:card.cost};
               $scope.deck.deck.push(newCard);
            // Condition for card in a deck (no more than 2 card except legendary only 1)
            }else if ((currentCard.number < 1 && currentCard.rarity == "Legendary") || (currentCard.number < 2 && currentCard.rarity != "Legendary")) {
               $scope.deck.deck.map(function (a) {
                  if (a.id == card.cardId) {
                     a.number++;
                  }
               })
            // Can't add this card anymore in the deck
            }else{
               console.log("carte en trop d'exemplaire");
            }
         }
         $scope.deck.totalCards++;
      }else {
      console.log("Deck complet");
      }
   };
   // Delete a card in the deck
   $scope.deleteCard = function(card) {
      // if there is 2 time same card in the deck, remove one
      if (card.number === 2) {
         $scope.deck.deck.map(function (a) {
            if (a.id == card.id) {
               a.number--;
            }
         })
      // if there is 1 time the card in the deck, remove card
      }else{
         var index = $scope.deck.deck.indexOf(card);
         $scope.deck.deck.splice(index, 1);
      }
      $scope.deck.totalCards--;
   };
   // Check if a card is selectable
   $scope.selectable = function(card) {
      var currentCard = $filter('filter')($scope.deck.deck, {id:card.cardId})[0];
      if (!angular.isUndefined(currentCard)) {
         return ((currentCard.number >= 1 && currentCard.rarity == "Legendary") || (currentCard.number >= 2 && currentCard.rarity != "Legendary"));
      }else {
      return false;
      }
   };
   // Save the deck
   $scope.save = function() {
         $http.post('/deck/save',
         {
         'decklist' : $scope.deck,
         'class' : $scope.class,
         })
         .then(function(response){
            if ($scope.deck.totalCards == 30) {
               $scope.deck.deck = [];
               $scope.deck.totalCards = 0;
            }
         });
   };
   // Clean the current deck-list
   $scope.clean = function() {
               $scope.deck.deck = [];
               $scope.deck.totalCards = 0;
   };
});
