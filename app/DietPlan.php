<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['diet_plan'];

      public function dayDite()
    {
        return $this->hasOne('App\DayDite', 'diet_plan_id','id');
    }
}
