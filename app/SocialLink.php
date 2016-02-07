<?php

namespace App;


class SocialLink
{
    public static $conversion = [
        1 => ["name" => "Twitter", "form-name" => "twitter"],
        2 => ["name" => "Facebook", "form-name" => "facebook"]
    ];

    public static function formItem($type, $link){
        $linkType = self::$conversion[$type];
        return
            "
            <div class='page-card'>
                <label>
                    " . $linkType["name"] . "
                </label>
                    <input name='" . $linkType["form-name"] . "' type='text' class='form-control' value='" . $link . "'
                        placeholder='Your " . $linkType["name"] . " link (or leave it blank)'>
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

    public static function generateForm($links) {
        $result = "";

        // Generate a formItem for each link possible
        foreach(self::$conversion as $linkId => $linkType) {
            if(array_key_exists($linkId, $links)) {
                // If the user has a link for this type already, show the input with the value already
                $result .= self::formItem($linkId, $links[$linkId]);
            } else {
                // If the user doesn't, then let the input have a blank value
                $result .= self::formItem($linkId, "");
            }
        }

        return $result;
    }

    public static function generateView($links) {
        $result = "";

        // Generate a viewItem for each link the user has
        foreach($links as $linkId => $linkContent) {
            $result .= self::viewItem($linkId, $linkContent);
        }

        return $result;
    }
}
