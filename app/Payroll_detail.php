<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll_detail extends Model
{
    public function payroll(){
        return $this->belongsTo(Payroll::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
