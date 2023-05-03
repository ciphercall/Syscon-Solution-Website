<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    //protected $fillable = ['com_name','dev_target'];

    public function setDevTargetAttribute($value2)
    {
        $this->attributes['dev_target'] = json_encode($value2);
    }

    public function getDevTargetAttribute($value2)
    {
        return $this->attributes['dev_target'] = json_decode($value2);
    }

    public function setScheduleAttribute($value2)
    {
        $this->attributes['schedule'] = json_encode($value2);
    }

    public function getScheduleAttribute($value2)
    {
        return $this->attributes['schedule'] = json_decode($value2);
    }
}
