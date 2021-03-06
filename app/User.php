<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    protected $casts = [
        'socialMedia' => 'array',
    ];

    function generateCode()
    {
        $this->code = str_random(4);
    }

    function generateUrl()
    {
        $this->url = str_replace(" ", "-", strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $this->name)));
    }

    function generatePasscode()
    {
        $this->passcode = str_random(20);
        // TODO: Check if str_random() is secure enough
    }

    public function socials() {
        return $this->hasMany('App\Social');
    }
}
