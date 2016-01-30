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

    function generateCode() {
        $this->code = str_random(4);
    }
    function generateUrl() {
        $this->url = str_replace(" ", "-", strtolower(preg_replace("/[^A-Za-z0-9 ]/", '', $this->name)));
    }
}
