<?php

namespace App;

use App\social;
use App\User;

class SocialLink
{
	
    public static function formItem($type, $link){
        $linkType = self::$conversion[$type];
		
        return
            "
            <div class='page-card'>
                <label>
                    " . $linkType["name"] . "
                </label>
                    <input name='social[" . $type . "]' type='text' class='form-control' value='" . $link . "'
                        placeholder='Your " . $linkType["name"] . " link'>
            </div>
            ";
    }
    public static function viewItem($type, $link) {
        $linkType = self::$conversion[$type];
        return
            "
            <div class='page-card'>
                <div class='text-muted'>
                    " . $linkType["name"] . "
                </div>
                <a href='" . $link . "'>
                   " . $link . "
                </a>
            </div>
            ";
    }

    public static function generateForm($id) {
		
		$result="";
		
		$socials = social::where("id", $id)->get();
		$count = 0;
		foreach($socials as $social){
			
			$result.="<div class = 'page-card'><input type = 'text' class = 'form-control' name = 'social[".$count."]' placeholder='Enter Social Media URL' value='".$social['link']."'></div>";
			$count++;
		}
		
		$result.="<div class = 'page-card'><input type = 'text' class = 'form-control' name = 'social[".$count."]' placeholder='Enter Social Media URL'></div>";

        return $result;
    }

	public static function savemedia($id, $media){
		
		social::where("id", $id)->delete();
		
		foreach($media as $m){
			
			if($m!=""){
			
			$soc = new social;
			
			$soc->id=$id;
			$soc->title=self::parsetitle($m);
			$soc->link=strtolower($m);
			
			$soc->save();
			
			}
			
		}
		
	}
	
    public static function generateView($url) {
        $result = "";

		$id = User::where("url", $url)->firstOrFail()['id'];
		
		$medias = social::where("id", $id)->get();
		
		foreach($medias as $media){
			
			$result.="<div class = 'page-card'><div class = 'text-muted'>".$media['title']."</div>";
			$result.="<a href = '".$media['link']."'>".$media['link']."</a></div>";
			
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
