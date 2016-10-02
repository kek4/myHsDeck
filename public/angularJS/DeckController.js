app.controller('DeckController', function DeckController($scope, $http) {

   // try to paginate with tabs...
   $scope.paladin = [];
   $scope.deckpaladin = [];

   $scope.currentPage = 1;
   $scope.numPerPage = 8;
   $scope.maxSize = 7;
   $scope.data = {};

   getDeck();

   ///////

   function updateFilteredItems() {
    var begin = (($scope.currentPage - 1) * $scope.numPerPage),
       end = begin + $scope.numPerPage;

    $scope.deckpaladin = $scope.paladin.slice(begin, end);
};

   function getDeck() {
      $http.get('/deck/class-list/Paladin/1').then(function(response){
         $scope.paladin = response.data;
         $scope.$watch('currentPage + numPerPage', updateFilteredItems);
      });
   }


   // Get Json of a class card
   $http.get('/deck/class-list/Mage/1').then(function(response){
         $scope.deckmage = response.data;
      });
   $http.get('/deck/class-list/Priest/1').then(function(response){
         $scope.deckpriest = response.data;
      });


});
