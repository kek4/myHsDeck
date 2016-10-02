<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Unirest\Request as UniRequest;

class DeckController extends Controller
{

   public function toList(){

      return view('deck/create_deck');
   }

      /**
      * Class card to json
      */
   public function listJson($class, $mode){

     $cards = UniRequest::get("https://omgvamp-hearthstone-v1.p.mashape.com/cards/classes/".$class."?collectible=".$mode."&locale=frFR",
     array(
          "X-Mashape-Key" => "ENRZKW8RVvmshLVfk5UctcvjCAaXp1kqA6OjsnMTZWy9hleYTd"
        )
      );
      return $cards->body;
   }

}
