<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
   protected $table = 'deck';
   protected $casts = [
   'decklist' => 'array',
   ];
}
