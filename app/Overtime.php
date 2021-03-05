<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
