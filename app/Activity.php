<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable= [
        'title', 'intro', 'duration', 'club_id', 'reg_start', 'reg_end', 'verified_by'
    ];//verified_by 暂定可以 mass assign

    public function participations()
    {
        return this->hasMany('App\Participation');
    }

    public function scopeId($query, $Id)
    {
        return $query->where('id', $Id)->firstOrFail();
    }
}
