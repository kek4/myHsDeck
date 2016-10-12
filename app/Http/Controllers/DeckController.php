<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Deck;
use Unirest\Request as UniRequest;
use Auth;

class DeckController extends Controller
{

   public function toList($class){

      return view('deck/create_deck', ['class' => $class]);
   }

      /**
      * Class card to json
      */
   public function listClassJson($class, $mode){

     $cards = UniRequest::get("https://omgvamp-hearthstone-v1.p.mashape.com/cards/classes/".$class."?collectible=".$mode."&locale=frFR",
     array(
          "X-Mashape-Key" => "ENRZKW8RVvmshLVfk5UctcvjCAaXp1kqA6OjsnMTZWy9hleYTd"
        )
      );
      return $cards->body;
   }

   public function listNeutralJson(){

      $cards = UniRequest::get("https://omgvamp-hearthstone-v1.p.mashape.com/cards/factions/Neutral?collectible=1&locale=frFR",
     array(
       "X-Mashape-Key" => "ENRZKW8RVvmshLVfk5UctcvjCAaXp1kqA6OjsnMTZWy9hleYTd"
     )
   );
      return $cards->body;
   }

   public function save(Request $request){
      $deck = new Deck();
      $deck->decklist = $request->decklist;
      $deck->user_id = Auth::user()->id;
      $deck->class = $request->class;
      $deck->save();
 }

}
