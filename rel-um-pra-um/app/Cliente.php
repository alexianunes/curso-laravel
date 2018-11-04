<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco(){
    	return $this->hasOne('App\Endereco');
    	// return $this->hasOne('App\Endereco', 'cliente_id', 'id');
    }
}
