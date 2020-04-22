<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        'id' => 'required',//4.22追加
        
    );
    
    public function histories()
    {
        return $this->hasMany('App\ProfileHistory');
    }
}
