<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function getRepairs() {

      if( \Auth::user()->access_uae AND !\Auth::user()->access_uk )
      {
        return Repair::where('country_id', '=', 2)->get();
      }

      if( \Auth::user()->access_uk AND !\Auth::user()->access_uae )
      {
        return Repair::where('country_id', '=', 1)->get();
      }

      if( \Auth::user()->access_uae AND \Auth::user()->access_uk )
      {
        return Repair::all();
      }

    }

    public static function getAllowedCountries()
    {
      if( \Auth::user()->access_uae AND !\Auth::user()->access_uk )
      {
        return Country::where('id', '=', 2)->get();
      }

      if( \Auth::user()->access_uk AND !\Auth::user()->access_uae )
      {
        return Country::where('id', '=', 1)->get();
      }

      if( \Auth::user()->access_uae AND \Auth::user()->access_uk )
      {
        return Country::all();
      }
    }




}
