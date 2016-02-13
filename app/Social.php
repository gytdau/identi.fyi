<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	public function user() {
        return $this->belongsTo('App\User');
    }
	
	public function verifyLink($link){
		
		$ContainsHTTP = stripos($link, "http://");
		$ContainsHTTPS = stripos($link, "https://");
		
		$ContainsWWW = stripos($link, "www.");
		
		if($ContainsHTTP === false && $ContainsHTTPS === false){
			
			$link = "http://".$link;
			
		}
		
		if($ContainsWWW === false){
			
			if($ContainsHTTPS !== false){
				
				$link = substr_replace($link, "www.", 8, 0);
				
			}else{
				
				$link = substr_replace($link, "www.", 7, 0);
				
			}
			
		}
		
		$this->link = $link;
		
	}
	
}
