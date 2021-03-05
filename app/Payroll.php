<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    public function payroll_details(){
        return $this->hasMany(Payroll_detail::class);
    }
}
