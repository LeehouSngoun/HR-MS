<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function position(){
        return $this->belongsTo(Position::class);
    }
    // public function getPositionNameAttribute()
    // {
    //     return $this->position->position;
    // }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function salaries(){
        return $this->hasMany(Salary::class);
    }

    public function overtimes(){
        return $this->hasMany(Overtime::class);
    }

    public function payroll_detail_eachs(){
        return $this->hasMany(Payroll_detail_each::class);
    }

    public function payroll_details(){
        return $this->hasMany(Payroll_detail::class);
    }
}
