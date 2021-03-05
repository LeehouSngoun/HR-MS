<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $guarded = ["_token"];
    public function positions(){
        return $this->hasMany(Position::class);
    }
}
