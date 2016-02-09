<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	public function user() {
        return $this->belongsTo('App\User');
    }
	
	public function definetitle(){
		
		preg_match("/(http:\/\/)?(www\.)?(.*)/", $this->link, $matches);
		$this->title=$matches[3];
		
	}
	
}
