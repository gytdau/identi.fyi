<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	public function user() {
        return $this->belongsTo('App\User');
    }
	
	public function definetitle(){
		
		preg_match("/(https:\/\/|http:\/\/)?(www\.)?(.*)/", $this->link, $matches);
		$this->title=$matches[3];
		
		return $this->title;
		
	}
	
	public function verifyLink($link){
		
		$ContainsHTTP = strpos($link, "http://");
		$ContainsWWW = strpos($link, "www.");
		
		if(!$ContainsWWW){
			
			$link = "www.".$link;
			
		}
		
		if(!$ContainsHTTP){
			
			$link = "http://".$link;
			
		}
		
		$this->link = $link;
		
	}
	
}
