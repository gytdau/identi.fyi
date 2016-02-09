<?php

namespace App;

use App\Social;
use App\User;

class SocialLink
{
	
	public static function getFormItem($social, $count, $last=false){
		if(!$last){
			
			return "<div class = 'page-card'><input type = 'text' class = 'form-control' name = 'social[".$count."]' placeholder='Enter Social Media URL' value='".$social['link']."'></div>";
			
		}else{
			
			return "<div class = 'page-card'><input type = 'text' class = 'form-control' name = 'social[".$count."]' placeholder='Enter Social Media URL'></div>";
			
		}
		
	}
	
	public static function getViewItem($media){
		
		return "<div class = 'page-card'><div class = 'text-muted'>".$media['title']."</div>
		<a href = '".$media['link']."'>".$media['link']."</a></div>";
		
	}
	
    public static function generateForm($id) {
		
		$result="";
		$count = 0;
		$socials = User::find($id)->socials;
		
		foreach($socials as $social){
			
			$result.=self::getFormItem($social, $count);
			$count++;
			
		}
		
		$result.=self::getFormItem("", $count, true);
		
        return $result;
    }

	public static function savemedia($id, $media){
		
		User::find($id)->socials()->delete();
		
		foreach($media as $m){
			
			if($m!=""){
			
			$soc = new Social;

			$soc->title=self::parsetitle($m);
			$soc->link=strtolower($m);
			
			User::find($id)->socials()->save($soc);
			
			}
			
		}
		
	}
	
    public static function generateView($url) {
        $result = "";

		$user = User::where("url", $url)->firstOrFail();
		
		$medias = $user->socials;
		
		foreach($medias as $media){
			
			$result.=self::getViewItem($media);
			
		}
		
		return $result;
        
    }
	
	public static function parsetitle($info){
		
		$info = strtolower($info);
		
		/*  To assign the title as being the text between the first two full stops  */
		$index = strpos($info, ".")+1;
		$info = substr($info, $index, strlen($info));
		$index = strpos($info, ".");
		$info = substr($info, 0, $index);
		
		$title=$info;
		$title = ucwords($title);
		
		return $title;
		
	}
	
}
