<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
   public function cliente(){
   		return $this->belongsTo('App\Cliente');
   		// return $this->belongsTo('App\Cliente', 'cliente_id', 'id');
   }
}
